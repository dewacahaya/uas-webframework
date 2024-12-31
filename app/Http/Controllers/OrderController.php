<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Fetch orders with related customer and order details
        $orders = Order::with(['customer', 'orderDetails.busana'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $no = 1;

        return view('orders.index', compact('orders', 'no'));
    }

    public function showOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('customers.orders', compact('orders'));
    }

    public function createOrder()
    {
        $cart = session()->get('cart');

        if (!$cart || count($cart) == 0) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        $total = array_sum(array_column($cart, 'price'));
        $order = Order::create([
            'user_id' => Auth::id(),
            'tanggal_pesan' => now(),
            'total_belanja' => $total,
            'pengiriman' => 'Standard',
            'pembayaran' => 'Pending',
            'status_pesanan' => 'Menunggu Pembayaran',
        ]);

        foreach ($cart as $id => $details) {
            OrderDetail::create([
                'order_id' => $order->id,
                'busana_id' => $id,
                'jumlah' => $details['quantity'],
                'subtotal' => $details['quantity'] * $details['price'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('customer.orders')->with('success', 'Pesanan berhasil dibuat!');
    }
}
