<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Tampilkan halaman keranjang
    public function index()
    {
        $cart = Session::get('cart', []);
        $shippingOptions = [
            'Standard' => 0,
            'Express' => 10000,
            'Pickup' => 0,
        ];

        $grandTotal = $this->calculateTotal($cart);

        return view('cart', compact('cart', 'shippingOptions', 'grandTotal'));
    }

    // Tambah item ke keranjang
    public function addToCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $productId = $request->id;
        $productName = $request->name;
        $productPrice = $request->price;
        $productImage = $request->image;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'image' => $productImage,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return response()->json(['status' => 'success', 'message' => 'Produk berhasil ditambahkan ke keranjang']);
    }

    // Update jumlah item di keranjang
        public function updateCart(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'cart.*.name' => 'required|string',
            'cart.*.price' => 'required|numeric',
            'cart.*.quantity' => 'required|integer|min:1',
        ]);

        // Simpan data keranjang ke session
        session(['cart' => $validated['cart']]);

        return redirect()->back()->with('success', 'Keranjang diperbarui!');
    }

    // Hapus item dari keranjang
    public function removeFromCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $productId = $request->id;

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);

            return response()->json(['status' => 'success', 'message' => 'Produk berhasil dihapus dari keranjang']);
        }

        return response()->json(['status' => 'error', 'message' => 'Produk tidak ditemukan di keranjang']);
    }

    // Hitung total harga
    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function checkout()
{
    return view('checkout'); // Pastikan Anda memiliki file checkout.blade.php di folder resources/views
}

}
