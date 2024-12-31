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

        // Fetch data and group by date
        $reports = OrderDetail::with(['busana', 'order'])
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->get()
            ->groupBy(function ($item) {
                return $item->order->created_at->format('Y-m-d');
            });

        // Aggregate the grouped data
        $aggregatedReports = $reports->map(function ($dailyReports) {
            $totalSubtotal = $dailyReports->sum('subtotal');
            return [
                'date' => $dailyReports->first()->order->created_at->format('d/m/Y'),
                'busana_names' => $dailyReports->map(fn($report) => $report->busana->nama_busana)->unique()->implode('<br>'),
                'quantities' => $dailyReports->groupBy('busana_id')->map(fn($items) => $items->sum('jumlah'))->implode('<br>'),
                'prices' => $dailyReports->groupBy('busana_id')->map(fn($items) => 'Rp. ' . number_format($items->first()->harga, 0, ',', '.'))->implode('<br>'),
                'subtotals' => 'Rp. ' . number_format($totalSubtotal, 0, ',', '.'),
            ];
        });

        return view('reports.index', compact('aggregatedReports', 'bulan', 'tahun', 'no'));
    }

    public function exportPDF(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        // Fetch laporan berdasarkan bulan dan tahun
        $reports = Report::whereYear('created_at', $tahun)
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
