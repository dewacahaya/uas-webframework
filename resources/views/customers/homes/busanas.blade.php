@extends('layouts.custmaster')

@section('content')
    <div class="container mt-5">
        <!-- Kolom Pencarian -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="input-group">
                    <form class="w-100 d-flex" method="GET" action="{{ route('customer.busanas') }}" role="search">
                        <input class="form-control me-2 border-3" type="search" name="search" placeholder="Cari Busana"
                            aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-dark px-5">Cari</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Grid Produk -->
        <div class="row">
            @foreach ($busanas as $ab)
                <div class="col-md-4 mb-4">

                    <div class="card">
                        <a href="{{ route('customer.busana.detail', $ab->id) }}" class="text-decoration-none text-dark">
                            <img src="{{ Storage::url($ab->gambar) }}"
                                class="card-img-top rounded border-3 border-bottom shadow-sm" alt="{{ $ab->nama_busana }}"
                                style="height: 230px; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ab->nama_busana }}</h5>
                                <p class="card-text text-muted">Rp. {{ number_format($ab->harga, 0, ',', '.') }}</p>
                                <form action="{{ route('customer.cart.add') }}" method="POST" class="mt-2">
                                    @csrf
                                    <input type="hidden" name="busana_id" value="{{ $ab->id }}">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $busanas->links() }}
        </div>
    </div>
@endsection
