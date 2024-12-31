@extends('layouts.admaster')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1 class="mb-4">Report Page</h1>
                <form method="GET" action="{{ route('reports.index') }}" class="row g-3 mb-4">
                    <div class="col-auto">
                        <select class="form-control" name="bulan" id="bulan">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $i == $bulan ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($i)->format('F') }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-auto">
                        <select name="tahun" id="tahun" class="form-select">
                            @for ($i = date('Y') - 5; $i <= date('Y'); $i++)
                                <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                        <a href="{{ route('reports.download.pdf', ['bulan' => $bulan, 'tahun' => $tahun]) }}"
                            class="btn btn-success">
                            Cetak PDF
                        </a>
                    </div>
                </form>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped mt-1">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Busana</th>
                                <th>Jumlah Terjual</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($aggregatedReports as $index => $report)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $report['date'] }}</td>
                                    <td>{!! $report['busana_names'] !!}</td>
                                    <td>{!! $report['quantities'] !!}</td>
                                    <td>{!! $report['prices'] !!}</td>
                                    <td>{{ $report['subtotals'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
