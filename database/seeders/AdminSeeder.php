<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'WahyuR',
            'email' => 'wahyu@admin.com',
            'password' => bcrypt('wahyu'), // Password spesifik
        ]);
    }
}
