<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'no_telp', 'alamat'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
