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
                        <a href="{{ route('customer.busanas') }}" class="btn btn-dark text-white px-4 py-2 mt-3">Lihat</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rekomendasi Section -->
        <div class="mt-5">
            <h2 class="fw-bold mb-4">Rekomendasi</h2>
            <div class="row">
                @foreach ($recommendations as $rb)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ Storage::url($rb->gambar) }}"
                                class="card-img-top rounded border-3 border-bottom shadow-sm" alt="{{ $rb->nama_busana }}"
                                style="height: 230px; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $rb->nama_busana }}</h5>
                                <p class="card-text text-muted">{{ $rb->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- REKOMENDASI KHUSUS --}}
    <div class="container mt-5">
        <h2 class="fw-bold mb-4">Rekomendasi</h2>
        <div class="row">
            <!-- Kolom Gambar Utama -->
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <img src="{{ Storage::url($specialMain->gambar) }}" class="card-img-top rounded"
                        alt="{{ $specialMain->nama_busana }}" style="height: 100%; object-fit: cover;">
                    <div class="card-body" style="font-size: 1.25rem;">
                        <h5 class="card-title fw-bold" style="font-size: 1.5rem;">{{ $specialMain->nama_busana }}</h5>
                        <p class="card-text text-muted" style="font-size: 1.1rem;">{{ $specialMain->deskripsi }}</p>
                    </div>
                </div>
            </div>
            <!-- Kolom Dua Gambar Lebih Kecil -->
            <div class="col-md-6">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <img src="{{ Storage::url($special1->gambar) }}"
                                class="card-img-top rounded border-3 border-bottom shadow-sm"
                                alt="{{ $special1->nama_busana }}" style="height: 260px; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $special1->nama_busana }}</h5>
                                <p class="card-text text-muted">{{ $special1->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <img src="{{ Storage::url($special2->gambar) }}"
                                class="card-img-top rounded border-3 border-bottom shadow-sm"
                                alt="{{ $special2->nama_busana }}" style="height: 260px; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $special2->nama_busana }}</h5>
                                <p class="card-text text-muted">{{ $special2->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
