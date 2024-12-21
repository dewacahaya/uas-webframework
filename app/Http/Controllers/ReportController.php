<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Ambil bulan dan tahun dari request, default ke bulan dan tahun saat ini
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        // Perbarui laporan dari data order
        Report::updateFromOrders($bulan, $tahun);

        // Ambil data laporan
        $reports = Report::with('busana')->where('bulan', $bulan)->where('tahun', $tahun)->get();

        // Kirim data ke view
        return view('reports.index', compact('reports', 'bulan', 'tahun'));
    }
}
