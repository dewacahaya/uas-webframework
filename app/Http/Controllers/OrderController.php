<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\search;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Fetch orders with related customer and order details
        $orders = Order::with(['customer', 'orderDetails.busana'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('customer', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })->orWhereHas('orderDetails.busana', function ($query) use ($search) {
                    $query->where('nama_busana', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $no = 1;

        return view('orders.index', compact('orders', 'no', 'search'));
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

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status_pesanan' => 'required|in:Pending,Diproses,Selesai,Dibatalkan',
        ]);

        $order = Order::findOrFail($id);
        $order->status_pesanan = $validated['status_pesanan'];
        $order->save();

        return redirect()->route('orders.index', compact('order'))->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus.');
    }
}
