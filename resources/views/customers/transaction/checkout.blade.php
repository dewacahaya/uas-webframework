@extends('layouts.custmaster')

@section('content')
    <div class="container">
        <h2 class="text-center fw-bold my-4">Checkout</h2>

        <!-- Step Navigation -->
        <div class="d-flex justify-content-center mb-5">
            <div class="text-center mx-3 text-muted">
                <span>1</span>
                <p>Keranjang Belanja</p>
            </div>
            <div class="text-center mx-3  text-success fw-bold">
                <span class="fw-bold">2</span>
                <p class="text-decoration-underline">Detail Checkout</p>
            </div>
            <div class="text-center mx-3 text-muted">
                <span class="fw-bold">3</span>
                <p>Pesanan Selesai</p>
            </div>
        </div>
        <div class="row">
            <!-- Form Data Pemesanan -->
            <div class="col-md-6">
                <!-- Card Data Pemesan -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="fw-bold">Data Pemesan</h5>
                    </div>
                    <div class="card-body">
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
                    </div>
                </div>

                <!-- Card Pilihan Pembayaran -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="fw-bold">Pilihan Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" value="COD"
                                id="cod" checked>
                            <label class="form-check-label" for="cod">COD</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment_method" value="Bank"
                                id="bank">
                            <label class="form-check-label" for="bank">Bank</label>
                        </div>
                        <input type="hidden" name="shipping_fee" id="shipping_fee" value="{{ $shippingFee }}">
                        <input type="hidden" name="shipping_method" id="shipping_method" value="{{ $shippingOption }}">
                    </div>

                </div>
                <div class="card-footer mt-4">
                    <button type="submit" class="btn btn-dark w-100">Pesan</button>
                </div>
                </form>
            </div>


            <!-- Ringkasan Pesanan -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header fs-4 fw-bold">
                        Ringkasan Pesanan
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @forelse ($cart as $item)
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}"
                                            class="img-thumbnail" style="width: 100px; height: 120px; object-fit: cover;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold text-capitalize ">{{ $item['name'] }}</h6>
                                        <p class="mb-0">
                                            {{ $item['quantity'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div>
                                        <span class="fw-semibold">Rp
                                            {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item text-center">Keranjang Anda kosong.</li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between py-3">
                            <span>Opsi Pengiriman</span>
                            <span class="fw-bold">{{ ucfirst($shippingOption) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Biaya Antar</span>
                            <span class="fw-bold">
                                {{ $shippingFee > 0 ? 'Rp ' . number_format($shippingFee, 0, ',', '.') : 'Gratis' }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between fs-5 fw-bold mt-4">
                            <span>Total</span>
                            <span>Rp {{ number_format($grandTotal + $shippingFee, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}"
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}"
            });
        </script>
    @endif
@endpush
