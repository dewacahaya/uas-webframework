@extends('layouts.custmaster')

@section('content')
    <div class="container mt-5">

        <!-- Hero Section -->
        <div class="row align-items-center">
            <div class="col-12">
                <div class="position-relative">
                    <img src="{{ asset('images/tari-kecak-home.webp') }}" alt="Kostum Terbaru" class="img-fluid rounded"
                        style="width: 100%; height: auto;">
                    <div class="position-absolute" style="top: 30%; right: 5%; color: white; text-align: right;">
                        <h1 class="fw-bold" style="font-size: 3rem;">Kostum Terbaru</h1>
                        <a href="#" class="btn btn-dark text-white px-4 py-2 mt-3">Lihat</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rekomendasi Section -->
        <div class="mt-5">
            <h2 class="fw-bold mb-4">Rekomendasi</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded"
                            alt="Tari Topeng Bali">
                        <div class="card-body">
                            <h5 class="card-title">Full Set Tari Topeng Bali</h5>
                            <p class="card-text text-muted">Deskripsi Produk</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded"
                            alt="Tari Panji Semirang">
                        <div class="card-body">
                            <h5 class="card-title">Full Set Tari Panji Semirang</h5>
                            <p class="card-text text-muted">Deskripsi Produk</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded"
                            alt="Tari Legong">
                        <div class="card-body">
                            <h5 class="card-title">Full Set Tari Legong</h5>
                            <p class="card-text text-muted">Deskripsi Produk</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded"
                            alt="Gelungan Margapati">
                        <div class="card-body">
                            <h5 class="card-title">Gelungan Margapati</h5>
                            <p class="card-text text-muted">Deskripsi Produk</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded"
                            alt="Gelungan Cendrawasih">
                        <div class="card-body">
                            <h5 class="card-title">Gelungan Cendrawasih</h5>
                            <p class="card-text text-muted">Deskripsi Produk</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded"
                            alt="Badong Tari">
                        <div class="card-body">
                            <h5 class="card-title">Badong Tari</h5>
                            <p class="card-text text-muted">Deskripsi Produk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="fw-bold mb-4">Rekomendasi</h2>
        <div class="row">
            <!-- Kolom Gambar Utama -->
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded"
                        alt="Full Set Kostum Tari Kijang" style="height: 100%; object-fit: cover;">
                    <div class="card-body" style="font-size: 1.25rem;">
                        <h5 class="card-title fw-bold" style="font-size: 1.5rem;">Full Set Kostum Tari Kijang</h5>
                        <p class="card-text text-muted" style="font-size: 1.1rem;">Deskripsi Produk</p>
                    </div>
                </div>
            </div>
            <!-- Kolom Dua Gambar Lebih Kecil -->
            <div class="col-md-6">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded"
                                alt="Kipas Tari">
                            <div class="card-body">
                                <h5 class="card-title">Kipas Tari</h5>
                                <p class="card-text text-muted">Deskripsi Produk</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded"
                                alt="Stagen Prada/Sabuk Prada Lilit">
                            <div class="card-body">
                                <h5 class="card-title">Stagen Prada/Sabuk Prada Lilit</h5>
                                <p class="card-text text-muted">Deskripsi Produk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
