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
}
