@extends('layouts.custmaster')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1 class="fw-bold my-4">Selesai!</h1>
        </div>
        <!-- Step Navigation -->
        <div class="d-flex justify-content-center mb-5">
            <div class="text-center mx-3 text-muted">
                <span>1</span>
                <p>Keranjang Belanja</p>
            </div>
            <div class="text-center mx-3 text-muted">
                <span class="fw-bold">2</span>
                <p class="">Detail Checkout</p>
            </div>
            <div class="text-center mx-3 text-success fw-bold">
                <span class="fw-bold">3</span>
                <p class="text-decoration-underline">Pesanan Selesai</p>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="card p-4 w-75">
                <div class="card-body text-center">
                    <!-- Terimakasih -->
                    <p class="card-text fs-3">Terimakasih! 🎉</p>

                    <!-- Pesanan Anda Telah Diterima -->
                    <h2 class="card-title fw-bold mb-4">Pesanan Anda Telah Diterima</h2>

                    <div class="order-items mb-2">
                        <h4 class="text-center">Detail Pesanan:</h4>
                        <div class="d-flex justify-content-center flex-wrap">
                            @foreach ($order->orderDetails as $detail)
                                <div class="text-center mx-2 mb-3">
                                    <!-- Gambar Busana -->
                                    <div class="card" style="width: 10rem; border: none;">
                                        <img src="{{ Storage::url($detail->busana->gambar) }}"
                                            class="card-img-top rounded border border-2 border-secondary shadow"
                                            alt="{{ $detail->busana->nama_busana }}"
                                            style="width: 100%; height: 12rem; object-fit: cover;">
                                    </div>
                                    <!-- Nama Busana -->
                                    <p class="mt-2 text-center text-capitalize">
                                        <strong>{{ $detail->busana->nama_busana }}</strong>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tanggal -->
                    <p class="mb-2"><strong>Tanggal:</strong>
                        {{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('M d, Y') }}</p>

                    <!-- Total -->
                    <p class="mb-2"><strong>Total:</strong> Rp. {{ number_format($order->total_belanja, 0, ',', '.') }}
                    </p>

                    <!-- Pilihan Pembayaran -->
                    <p class="mb-4"><strong>Pilihan Pembayaran:</strong> {{ $order->pembayaran }}</p>

                    <!-- Tombol -->
                    <a href="{{ route('customer.orders') }}" class="btn btn-dark rounded-pill px-4 py-2">Lihat Pesanan</a>
                </div>
            </div>
        </div>

    </div>
@endsection
