@extends('layouts.admaster')

@section('content')
    <div class="px-5">
        <div>
            <h2 class="fw-bold">Add Busana</h2>
        </div>

        <div class="card mt-3 shadow-sm">
            <div class="card-body">
                <h4 class="fw-bold mb-4">Form Add Busana</h4>
                <form action="{{ route('busana.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_busana" class="form-label">Nama Busana</label>
                        <input type="text" name="nama_busana" id="nama_busana" class="form-control"
                            placeholder="Masukkan Nama Busana">
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control"
                            placeholder="Masukkan Harga Busana">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" placeholder="Masukkan Deskripsi Busana"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('busana.index') }}" class="btn btn-danger me-2">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
