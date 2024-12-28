<?php

namespace App\Http\Controllers;

use App\Models\Busana;
use App\Models\Customer;
use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    // LANDING PAGE
    public function showHomePage()
    {
        $busanas = Busana::all();
        return view('home', compact('busanas'));
    }
    // END LANDING PAGE

    // RECOMMENDATION PAGE
    public function showRecommendationPage()
    {
        $recommendations = Busana::where('stok', '>', 0)->take(10)->get();

        $special1 = Busana::where('stok', '>', 0)->find(5);
        $special2 = Busana::where('stok', '>', 0)->find(9);
        $specialMain = Busana::where('stok', '>', 0)->find(6);
        return view('customers.homes.rekomen', compact('recommendations', 'special1', 'special2', 'specialMain'));
    }
    // END RECOMMENDATION PAGE


    // REGISTER / LOGIN FUNCTION
    public function register(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:customers,email",
            "password" => "required|string|confirmed",
            "no_telp" => "required|numeric|max:999999999999999",
            "alamat" => "required|string|max:255",
        ]);

        // Encrypt password sebelum disimpan
        $validatedData['password'] = Hash::make($request->password);

        try {
            // Membuat customer baru
            Customer::create($validatedData);
        } catch (\Exception $e) {
            Log::error('Failed to create customer: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to register. Please try again.']);
        }

        // Mengarahkan ke halaman login atau halaman lain setelah berhasil registrasi
        return redirect()->route("customer.home")->with('registered', 'Registrasi berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::guard('customers')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('')->with('success', 'Login Berhasil');
        }

        return back()->withErrors([
            'email' => 'Email atau Password salah.',
        ])->with('failed', 'Email atau Password salah');
    }


    public function logout(Request $request)
    {
        Auth::guard('customers')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout Berhasil');
    }
    // END REGISTER / LOGIN FUNCTION

    // ALL BUSANAS PAGE
    public function showAllBusanas(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data busana dengan pencarian dan stok lebih dari 1
        $busanas = Busana::when($search, function ($query, $search) {
            return $query->where('nama_busana', 'like', "%{$search}%")
                ->orWhere('harga', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        })->where('stok', '>', 0)->paginate(10);

        return view('customers.homes.busanas', compact('busanas', 'search'));
    }
    // END ALL BUSANAS PAGE

    public function showCart()
    {
        $cart = session()->get('cart', []);
        $grandTotal = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $shippingOption = session()->get('shipping_option', 'standard');

        return view('customers.transaction.cart', compact('cart', 'grandTotal', 'shippingOption'));
    }

    public function addToCart(Request $request)
    {
        $busanaId = $request->input('busana_id');
        $busana = Busana::find($busanaId);

        if (!$busana) {
            return redirect()->route('customer.busanas')->with('failed', 'Busana tidak ditemukan.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$busanaId])) {
            $cart[$busanaId]['quantity']++;
        } else {
            $cart[$busanaId] = [
                "name" => $busana->nama_busana,
                "quantity" => 1,
                "price" => $busana->harga,
                "image" => $busana->gambar
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('customer.cart')->with('success', 'Busana berhasil ditambahkan ke keranjang.');
    }

    public function updateCart(Request $request)
    {
        $busanaId = $request->input('busana_id');
        $quantity = $request->input('quantity');
        $shippingOption = $request->input('shipping_option', 'standard');

        $cart = session()->get('cart', []);

        if (isset($cart[$busanaId])) {
            $cart[$busanaId]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        session()->put('shipping_option', $shippingOption);

        return response()->json(['status' => 'success', 'message' => 'Keranjang berhasil diperbarui.']);
    }

    public function removeFromCart(Request $request)
    {
        $busanaId = $request->input('busana_id');

        $cart = session()->get('cart', []);

        if (isset($cart[$busanaId])) {
            unset($cart[$busanaId]);
            session()->put('cart', $cart);
            return redirect()->route('customer.cart')->with('success', 'Busana berhasil dihapus dari keranjang.');
        }

        return redirect()->route('customer.cart')->with('failed', 'Busana tidak ditemukan di keranjang.');
    }
}
