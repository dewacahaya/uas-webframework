<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []); // Ambil data cart dari session
        $shippingOptions = [
            'Standard' => 0,
            'Express' => 10000,
            'Pickup' => 0
        ];

        $shippingFee = 0;
        $totalPrice = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0) + $shippingFee;

        return view('checkout', compact('cart', 'shippingOptions', 'shippingFee', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cart = Session::get('cart', []);
        $totalPrice = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'order_items' => json_encode($cart),
            'shipping_fee' => $request->shipping_fee,
            'total_price' => $totalPrice + $request->shipping_fee,
        ]);

        Session::forget('cart'); // Kosongkan cart setelah order selesai

        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('checkout-success');
    }

    public function checkout()
    {
        // Ambil data keranjang dari session
        $cart = session('cart', []); // Ambil data keranjang dari session (default: kosong)

        // Hitung total harga
        $totalPrice = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Kirim data ke view
        return view('checkout', compact('cart', 'totalPrice'));
    }

}
