@extends('layouts.admaster')
@section('content')
    @extends('layouts.admaster')
@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">Orders Page</h2>
        <div class="px-5">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex flex-column justify-content-end align-items-end mb-3">
                        <form class="d-flex fs-6" method="GET" action="{{ route('busana.index') }}" role="search">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                aria-label="Search" value="{{ request('search') }}">
                        </form>
                    </div>


                    <table class="table table-bordered table-striped mt-1">
                        <thead>
                            <tr class="text-center">
                                <th>Gambar</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Barang</th>
                                <th>Detail</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                    <hr>
                    {{-- {{ $orders->links() }} --}}
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

@endsection
