<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busana extends Model
{
    use HasFactory;

    protected $fillable = ['nama_busana', 'harga', 'deskripsi', 'stok', 'gambar'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'busana_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'busana_id');
    }
}
