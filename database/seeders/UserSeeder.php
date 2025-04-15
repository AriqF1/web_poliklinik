<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Dr. John Doe',
            'alamat' => 'Jl. Sehat No. 1, Jakarta',
            'no_hp' => '081234567890',
            'role' => 'dokter',
            'email' => 'dr.john@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Menambahkan data dummy untuk pasien
        User::create([
            'nama' => 'Jane Smith',
            'alamat' => 'Jl. Kesehatan No. 5, Bandung',
            'no_hp' => '082345678901',
            'role' => 'pasien',
            'email' => 'jane.smith@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Menambahkan data dummy untuk pasien
        User::create([
            'nama' => 'Michael Johnson',
            'alamat' => 'Jl. Medika No. 8, Surabaya',
            'no_hp' => '083456789012',
            'role' => 'pasien',
            'email' => 'michael.johnson@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Menambahkan data dummy untuk dokter
        User::create([
            'nama' => 'Dr. Sarah Lee',
            'alamat' => 'Jl. Dokter No. 10, Yogyakarta',
            'no_hp' => '084567890123',
            'role' => 'dokter',
            'email' => 'dr.sarah@example.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
