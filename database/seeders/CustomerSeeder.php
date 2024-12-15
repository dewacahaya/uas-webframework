<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Customer::create([
            'name' => 'John Doe 2',
            'email' => 'john124@example.com',
            'password' => bcrypt('password123'),
            'no_telp' => '08123456789',
            'alamat' => 'Jl. Contoh No. 1'
        ]);
    }
}
