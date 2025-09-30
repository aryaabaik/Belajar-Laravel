<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class KendaraanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $kendaraan = [
            ['Merk' => 'Yamaha', 'Jenis_Kendaraan' => 'Aerox  155', 'Harga' => 8000000, 'Garansi' => '2 Tahun', 'Stok' => 10 ],
            ['Merk' => 'Yamaha', 'Jenis_Kendaraan' => 'XSR 155', 'Harga' => 10000000, 'Garansi' => '1 Tahun', 'Stok' => 9 ],
            ['Merk' => 'Yamaha', 'Jenis_Kendaraan' => 'Mio', 'Harga' => 7000000, 'Garansi' => '9 Tahun', 'Stok' => 4 ],
            ['Merk' => 'Toyota', 'Jenis_Kendaraan' => 'Avanza', 'Harga' => 32000000, 'Garansi' => '5 Tahun', 'Stok' => 5 ],
            ['Merk' => 'Daihatsu', 'Jenis_Kendaraan' => 'Ayla', 'Harga' => 123000000, 'Garansi' => '3 Tahun', 'Stok' => 2 ],
            ['Merk' => 'Honda', 'Jenis_Kendaraan' => 'Scoopy', 'Harga' => 30000000, 'Garansi' => '10 Tahun', 'Stok' => 15 ]
        ];
        DB::table('kendaraan')->insert($kendaraan);
    }
}
