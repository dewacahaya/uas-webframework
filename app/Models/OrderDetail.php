<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'busana_id', 'jumlah', 'harga', 'subtotal'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function busana()
    {
        return $this->belongsTo(Busana::class, 'busana_id');
    }
}
