@extends('layouts.admaster')
@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">Data Busana</h2>
        <div class="px-5">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex flex-column justify-content-end align-items-end mb-3">
                        <a href="{{ route('busana.create') }}" class="btn btn-primary mb-3">Tambah
                            Busana</a>
                        <form class="d-flex fs-6" method="GET" action="{{ route('busana.index') }}" role="search">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                aria-label="Search" value="{{ request('search') }}">
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
                                <tr style="height: 120px">
                                    <td class="text-center">
                                        @if ($d->gambar)
                                            <a href="{{ Storage::url($d->gambar) }}" target="_blank">
                                                <img class="img-fluid mx-auto my-auto d-block"
                                                    style="background-size: cover; width: 80px"
                                                    src="{{ Storage::url($d->gambar) }}" alt="{{ $d->name }}"
                                                    style="max-width: 70px;">
                                            </a>
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $d->nama_busana }}</td>
                                    <td>{{ $d->deskripsi }}</td>
                                    <td>{{ $d->stok }}</td>
                                    <td>{{ $d->harga }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('busana.edit', $d->id) }}" class="btn btn-sm btn-warning"><i
                                                class="bi bi-pencil-fill"></i></a>

                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="hapusData(`btndelete{{ $d->id }}`)"><i
                                                class="bi bi-trash-fill text-dark"></i></button>
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

@push('js')
    <script>
        function hapusData(id) {
            Swal.fire({
                title: "Yakin hapus data ini?",
                text: "Data yang dihapus tidak bisa dipulihkan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).click();
                }
            });
        }

        @if (session('created'))
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            // Tampilkan toast dengan pesan dari session
            Toast.fire({
                icon: "success",
                title: "{{ session('created') }}"
            });
        @endif
    </script>
@endpush
