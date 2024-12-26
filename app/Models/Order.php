<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_pesan',
        'total_belanja',
        'pengiriman',
        'pembayaran',
        'status_pesanan'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
