@extends('layouts.custmaster')

@section('content')

<div class="text-center mt-5" style="padding: 0; margin: 0;">

    <h1 class="font-weight-bold pt-3" style="font-size: 60px">Sri Ratih Collection</h1>
    

    <p class="text-muted py-4" style="font-size: 1.2rem;">Pusat Busana Adat Bali</p>
    

    <a href="#produk" class="btn btn-dark text-white fw-bold py-2" style="width: 250px;">Lihat produk</a>


    <div class="mt-5">
        <img src="{{ asset('images/tari-kecak-home.webp') }}" alt="Tari Kecak" 
             style="width: calc(70% - 200px); border-radius: 15px; margin: 0 auto; display: block;">
        <div class="py-3" style="text-align: left; font-size: 1.8rem; font-weight: bold; color: black; margin-left: calc(15% + 100px); margin-top: 20px;">
            Preview Busana
        </div>
    </div>

    <!-- Section Preview Busana -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded" alt="Tari Topeng Bali">
                    <div class="card-body" style="text-align: left; padding-left: 10px;">
                        <h5 class="card-title" style="font-size: 1.2rem;">Full Set Tari Topeng Bali</h5>
                        <p class="card-text text-muted" style="font-size: 0.9rem;">Deskripsi Produk</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded" alt="Tari Panji Semirang">
                    <div class="card-body" style="text-align: left; padding-left: 10px;">
                        <h5 class="card-title" style="font-size: 1.2rem;">Full Set Tari Panji Semirang</h5>
                        <p class="card-text text-muted" style="font-size: 0.9rem;">Deskripsi Produk</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/tari-kecak-home.webp') }}" class="card-img-top rounded" alt="Tari Legong">
                    <div class="card-body" style="text-align: left; padding-left: 10px;">
                        <h5 class="card-title" style="font-size: 1.2rem;">Full Set Tari Legong</h5>
                        <p class="card-text text-muted" style="font-size: 0.9rem;">Deskripsi Produk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

@endsection
