<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Report;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Intervention\Image\Facades\Image;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));
        $no = 1;

        // Ambil data dari tabel reports
        $aggregatedReports = Report::with('busana')
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->get()
            ->map(function ($report) {
                return [
                    'date' => now()->format('d/m/Y'), // Tambahkan kolom jika ingin tanggal
                    'busana_name' => $report->busana->nama_busana,
                    'quantities' => $report->total_pesanan,
                    'prices' => 'Rp. ' . number_format($report->total_penjualan, 0, ',', '.'),
                    'subtotals' => 'Rp. ' . number_format($report->total_penjualan, 0, ',', '.'),
                ];
            });

        return view('reports.index', compact('aggregatedReports', 'bulan', 'tahun', 'no'));
    }


    public function exportPDF(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        // Fetch laporan berdasarkan bulan dan tahun
        $reports = Report::with('busana')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->get();

        // Data untuk PDF
        $data = [
            'reports' => $reports,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        // Generate PDF
        $pdf = Pdf::loadView('reports.pdf', $data);
        return $pdf->download('laporan_' . $bulan . '_' . $tahun . '.pdf');
    }
}
