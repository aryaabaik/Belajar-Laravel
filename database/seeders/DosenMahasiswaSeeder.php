<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class DosenMahasiswaSeeder extends Seeder
{
    public function run()
    {
    $dosen1 = Dosen::create([
        'nama' => 'Dr. Andi Nugraha',
        'nipd' => '1232',
    ]);

    $dosen2 = Dosen::create([
        'nama' => 'Prof. Siti Rahmawati',
        'nipd' => '4321',
    ]);
    //Tambahkan Masing Masing Dosen Siswa 
    $dosen1->mahasiswas()->createMany([
        ['nama' => 'Arya Adhitya', 'nim' => '112211'],
        ['nama' => 'Muhammad Fawas Albiansyah', 'nim' => '321443'],
    ]);

    $dosen2->mahasiswas()->createMany([
        ['nama' => 'Nur Aisah', 'nim' => '76654'],
        ['nama' => 'Lintang Halim', 'nim' => '10274'],
    ]);
    }

}
