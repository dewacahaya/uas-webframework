@extends('layouts.custmaster')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-5">Pesanan Saya</h2>
    <div class="table-responsive">
        <table class="table text-center shadow p-3 mb-5 bg-body rounded" style="border-spacing: 0; border: 1px solid #bababa;">
            <thead>
                <tr class="bg-light">
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr style="height: 60px;">
                    <td>1</td>
                    <td>10/12/2024</td>
                    <td>Diproses</td>
                    <td>Busana Pengantin</td>
                    <td>2.000.000</td>
                    <td>1</td>
                    <td>2.000.000</td>
                </tr>
                <tr style="height: 60px;">
                    <td>1</td>
                    <td>10/12/2024</td>
                    <td>Diproses</td>
                    <td>Busana Pengantin</td>
                    <td>2.000.000</td>
                    <td>1</td>
                    <td>2.000.000</td>
                </tr>
                <tr style="height: 60px;">
                    <td>1</td>
                    <td>10/12/2024</td>
                    <td>Diproses</td>
                    <td>Busana Pengantin</td>
                    <td>2.000.000</td>
                    <td>1</td>
                    <td>2.000.000</td>
                </tr>

                <!-- Button -->
                <tr style="height: 90px;">
                    <td colspan="7" class="text-end align-middle">
                        <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-3">Kembali ke Halaman Utama</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
