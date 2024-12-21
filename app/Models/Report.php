<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['busana_id', 'bulan', 'tahun', 'total_pesanan', 'total_penjualan'];

    public function busana()
    {
        return $this->belongsTo(Busana::class, 'busana_id');
    }

    public static function updateFromOrders($bulan, $tahun)
    {
        // Ambil data order sesuai bulan dan tahun
        $orderDetails = OrderDetail::whereHas('order', function ($query) use ($bulan, $tahun) {
            $query->whereMonth('tanggal_pesan', $bulan)
                ->whereYear('tanggal_pesan', $tahun);
        })->get();

        $groupedDetails = $orderDetails->groupBy('busana_id');

        foreach ($groupedDetails as $busanaId => $details) {
            $totalPesanan = $details->sum('jumlah');
            $totalPenjualan = $details->sum(fn($detail) => $detail->jumlah * $detail->harga);

            $report = self::updateOrCreate(
                ['busana_id' => $busanaId, 'bulan' => $bulan, 'tahun' => $tahun],
                ['total_pesanan' => $totalPesanan, 'total_penjualan' => $totalPenjualan]
            );
        }
    }
}
