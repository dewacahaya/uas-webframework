@extends('layouts.admaster')
@section('content')
    <div class="container-fluid" style="margin-top: 80px">
        <h2 class="mb-4">Data Busana</h2>
        <div class="px-5">
            @if (session('created'))
                <div class="alert alert-success" role="alert">
                    {{ session('created') }}
                </div>
            @endif
            @if (session('updated'))
                <div class="alert alert-warning" role="alert">
                    {{ session('updated') }}
                </div>
            @endif
            @if (session('deleted'))
                <div class="alert alert-danger" role="alert">
                    {{ session('deleted') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between py-3">
                        <h3 class="">Halaman Data Busana</h3>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mb-3">
                        <a href="{{ route('busana.create') }}" class="btn btn-primary me-2">Tambah Busana</a>
                        <form class="d-flex" method="GET" action="{{ route('busana.index') }}" role="search">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                aria-label="Search" value="{{ request('search') }}">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div>


                    <table class="table table-bordered table-striped mt-1">
                        <thead>
                            <tr class="text-center">
                                <th>Gambar</th>

                                <th>Nama Busana</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>

                                <th>Harga Jual</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($busana as $i => $d)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $d->kode }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->harga }}</td>
                                    <td>{{ $d->harga }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('busana.edit', $d->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('busana.show', $d->id) }}" class="btn btn-sm btn-info">Detail</a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="hapusData(`btndelete{{ $d->id }}`)">Hapus</button>
                                        <form action="{{ route('busana.destroy', $d->id) }}" method="POST"
                                            style="display: none">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="btndelete{{ $d->id }}"></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                    <hr>
                    {{ $busana->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
