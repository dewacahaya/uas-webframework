@extends('layouts.custmaster')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">Checkout</h2>
        <div class="row">
            <!-- Form Data Pemesanan -->
            <div class="col-md-6">
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $customer->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ $customer->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            value="{{ $customer->no_telp }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" id="address" class="form-control" rows="3" required>{{ $customer->alamat }}</textarea>
                    </div>

                    <!-- Pilihan Pembayaran -->
                    <h5 class="mt-4">Pilihan Pembayaran</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="COD" id="cod"
                            checked>
                        <label class="form-check-label" for="cod">COD</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="E-Wallet"
                            id="ewallet">
                        <label class="form-check-label" for="ewallet">E-Wallet</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="Bank" id="bank">
                        <label class="form-check-label" for="bank">Bank</label>
                    </div>

                    <input type="hidden" name="shipping_fee" id="shipping_fee" value="{{ $shippingFee }}">
                    <input type="hidden" name="shipping_method" id="shipping_method" value="{{ $shippingOption }}">
                    <h5 class="mt-4">Total Biaya: Rp <span
                            id="total-cost">{{ number_format($grandTotal + $shippingFee, 0, ',', '.') }}</span></h5>
                    <button type="submit" class="btn btn-dark mt-4 w-100">Pesan</button>
                </form>
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Ringkasan Pesanan
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($cart as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item['name'] }}</strong> <br>
                                    {{ $item['quantity'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </div>
                                <div>
                                    Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-center">Keranjang Anda kosong.</li>
                        @endforelse
                    </ul>
                    <div class="card-footer">
                        <h5>Opsi Pengiriman: {{ ucfirst($shippingOption) }}</h5>
                        <h5>Biaya Antar:
                            {{ $shippingFee > 0 ? 'Rp ' . number_format($shippingFee, 0, ',', '.') : 'Gratis' }}</h5>
                        <h5>Total: Rp <span
                                id="final-total">{{ number_format($grandTotal + $shippingFee, 0, ',', '.') }}</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
