<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Wali;

class RelasiSeeder extends Seeder
{
    public function run()
    {
        $mahasiswa = Mahasiswa::create([
            'nama' => 'Arya Adhitya',
            'nim' => '123456',
        ]);

        $wali1 = Wali::create([
            'nama' => 'Pak Herdi',
            'id_mahasiswa' => $mahasiswa->id
        ]);
         $wali2 = Wali::create([
            'nama' => 'Pak Maman',
            'id_mahasiswa' => $mahasiswa->id
        ]);

        $wali1->mahasiswas()->createMany([
        ['nama' => 'Arya Adhitya', 'nim' => '112211'],
        ['nama' => 'Muhammad Fawas Albiansyah', 'nim' => '321443'],
    ]);
        $wali2->mahasiswas()->createMany([
         ['nama' => 'Nur Aisah', 'nim' => '76654'],
        ['nama' => 'Lintang Halim', 'nim' => '10274'],
    ]);

    }
}
