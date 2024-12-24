@extends('layouts.admaster')
@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">Report Page</h2>
        <form method="GET" action="{{ route('reports.index') }}" class="d-flex justify-content-end align-items-center mb-2">
            <div class="form-group me-2">

                <select name="bulan" id="bulan" class="form-select">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::createFromDate(null, $i)->translatedFormat('F') }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="form-group me-2">

                <select name="tahun" id="tahun" class="form-select">
                    @for ($i = date('Y') - 5; $i <= date('Y'); $i++)
                        <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </form>
        <div class="card">
            <div class="card-body">


                <table class="table table-bordered table-striped mt-1">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Terjual</th>
                            <th>Harga Satuan</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $index => $report)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $report->busana->nama }}</td>
                                <td>{{ $report->total_pesanan }}</td>
                                <td>Rp. {{ number_format($report->busana->harga, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($report->total_penjualan, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
