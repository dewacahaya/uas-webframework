<!DOCTYPE html>
<html>

<head>
    <title>Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Report - {{ \Carbon\Carbon::createFromDate(null, $bulan)->translatedFormat('F') }} {{ $tahun }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Terjual</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $index => $report)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $report->busana->nama_busana }}</td>
                    <td>{{ $report->total_pesanan }}</td>
                    <td>Rp. {{ number_format($report->busana->harga, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($report->total_penjualan, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
