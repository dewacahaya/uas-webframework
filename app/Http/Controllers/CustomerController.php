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

    public function busanas()
    {
        return view('customers.homes.busanas');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('customers.cart', compact('cart'));
    }

    public function addToCart(Request $request, $busana_id)
    {
        $busana = Busana::findOrFail($busana_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$busana_id])) {
            $cart[$busana_id]['quantity']++;
        } else {
            $cart[$busana_id] = [
                "name" => $busana->nama_busana,
                "quantity" => 1,
                "price" => $busana->harga,
                "image" => $busana->gambar,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function removeFromCart($busana_id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$busana_id])) {
            unset($cart[$busana_id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
