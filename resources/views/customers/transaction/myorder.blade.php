@extends('layouts.custmaster')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-5">Pesanan Saya</h2>
        @if ($orders->isEmpty())
            <p class="text-center">Anda belum memiliki pesanan.</p>
            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-3">Kembali ke Halaman Utama</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table text-center shadow p-3 mb-5 bg-body rounded"
                    style="border-spacing: 0; border: 1px solid #bababa;">
                    <thead>
                        <tr class="bg-light">
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Nama Busana</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @foreach ($order->orderDetails as $detail)
                                <tr style="height: 60px;">
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $order->status_pesanan }}</td>
                                    <td>{{ $detail->busana->nama_busana }}</td>
                                    <td>{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                    <td>{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        @endforeach

                        <!-- Button -->
                        <tr style="height: 90px;">
                            <td colspan="7" class="text-end align-middle">
                                <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-3">Kembali ke Halaman
                                    Utama</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
