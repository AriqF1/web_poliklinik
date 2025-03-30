<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_obat' => 'Paracetamol', 'kemasan' => 'Strip 10 Tablet', 'harga' => 8000],
            ['nama_obat' => 'Amoxicillin', 'kemasan' => 'Botol 100 ml', 'harga' => 15000],
            ['nama_obat' => 'Ibuprofen', 'kemasan' => 'Box 20 Tablet', 'harga' => 25000],
            ['nama_obat' => 'Cetirizine', 'kemasan' => 'Sachet 5gr', 'harga' => 5000],
            ['nama_obat' => 'Metformin', 'kemasan' => 'Strip 10 Tablet', 'harga' => 12000],
            ['nama_obat' => 'Omeprazole', 'kemasan' => 'Box 14 Kapsul', 'harga' => 18000],
            ['nama_obat' => 'Loperamide', 'kemasan' => 'Strip 6 Tablet', 'harga' => 6000],
            ['nama_obat' => 'Salbutamol', 'kemasan' => 'Inhaler 100 mcg', 'harga' => 45000],
            ['nama_obat' => 'Mefenamic Acid', 'kemasan' => 'Strip 10 Tablet', 'harga' => 10000],
            ['nama_obat' => 'Ciprofloxacin', 'kemasan' => 'Botol 200 ml', 'harga' => 20000],
        ];

        foreach ($data as $obat) {
            Obat::create($obat);
        }
    }
}
