@extends('layouts.custmaster')

@section('content')
<div class="container mt-5">

    <!-- Kolom Pencarian -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Busana..." aria-label="Cari Busana">
                <button class="btn btn-outline-secondary" type="button">Cari</button>
            </div>
        </div>
    </div>

    <!-- Grid Produk -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/tari-topeng-bali.jpg') }}" class="card-img-top rounded" alt="Full Set Tari Topeng Bali">
                <div class="card-body text-center">
                    <h5 class="card-title">Full Set Tari Topeng Bali</h5>
                    <p class="card-text text-muted">Deskripsi Produk</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/tari-panji-semirang.jpg') }}" class="card-img-top rounded" alt="Full Set Tari Panji Semirang">
                <div class="card-body text-center">
                    <h5 class="card-title">Full Set Tari Panji Semirang</h5>
                    <p class="card-text text-muted">Deskripsi Produk</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/tari-legong.jpg') }}" class="card-img-top rounded" alt="Full Set Tari Legong">
                <div class="card-body text-center">
                    <h5 class="card-title">Full Set Tari Legong</h5>
                    <p class="card-text text-muted">Deskripsi Produk</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/gelungan-margapati.jpg') }}" class="card-img-top rounded" alt="Gelungan Margapati">
                <div class="card-body text-center">
                    <h5 class="card-title">Gelungan Margapati</h5>
                    <p class="card-text text-muted">Deskripsi Produk</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/gelungan-cendrawasih.jpg') }}" class="card-img-top rounded" alt="Gelungan Cendrawasih">
                <div class="card-body text-center">
                    <h5 class="card-title">Gelungan Cendrawasih</h5>
                    <p class="card-text text-muted">Deskripsi Produk</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/badong-tari.jpg') }}" class="card-img-top rounded" alt="Badong Tari">
                <div class="card-body text-center">
                    <h5 class="card-title">Badong Tari</h5>
                    <p class="card-text text-muted">Deskripsi Produk</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">&lt;</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <li class="page-item"><a class="page-link" href="#">9</a></li>
                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">&gt;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>

@endsection