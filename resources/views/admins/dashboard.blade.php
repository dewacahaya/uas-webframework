<!-- views/dashboard.blade.php -->
@extends('layouts.admaster')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Dashboard</h1>
        <div class="container my-4">
            <div class="row g-4">
                <!-- Admin Card -->
                <div class="col-md-3">
                    <div class="card shadow-sm text-white text-center" style="background-color: #16A2B7;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-person-circle fs-1 mb-2"></i> <!-- Ikon besar -->
                            <h4 class="mb-0">Admin</h4>
                            <h1 class="fw-bold">1</h1>
                        </div>
                    </div>
                </div>

                <!-- Busanas Card -->
                <div class="col-md-3">
                    <div class="card shadow-sm text-white text-center" style="background-color: #25A644;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-tags fs-1 mb-2"></i>
                            <h4 class="mb-0">Busanas</h4>
                            <h1 class="fw-bold">1</h1>
                        </div>
                    </div>
                </div>

                <!-- Sales Card -->
                <div class="col-md-3">
                    <div class="card shadow-sm text-white text-center" style="background-color: #FABF04;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-receipt fs-1 mb-2"></i>
                            <h4 class="mb-0">Sales</h4>
                            <h1 class="fw-bold">1</h1>
                        </div>
                    </div>
                </div>

                <!-- Sold Stock Card -->
                <div class="col-md-3">
                    <div class="card shadow-sm text-white text-center" style="background-color: #DB3443;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-bag-check fs-1 mb-2"></i>
                            <h4 class="mb-0">Sold Stock</h4>
                            <h1 class="fw-bold">1</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Available Stock</h5>
                        <table class="table border-primary ">
                            <tr>
                                <td>Kipas Tari</td>
                                <td class="text-danger text-center fw-bold">Stok Habis</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="">Omzet Penjualan</h4>
                        <h1 class="p-4 fw-semibold">Rp. 10.000.000</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Sukses!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @elseif (session('failed'))
                Swal.fire({
                    title: 'Gagal!',
                    text: "{{ session('failed') }}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
@endpush
