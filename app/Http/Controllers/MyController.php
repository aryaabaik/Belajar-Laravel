<?php
namespace App\Http\Controllers;

class MyController extends Controller
{
    public function hello()
    {
        $nama = "Arya";
        $umur = 16;

        return view('hello', compact('nama', 'umur'));
    }

    public function siswa(){
        $data = [
            ['nama' => 'Arya', 'kelas' => 'XI RPL 3'],
            ['nama' => 'Dadan', 'kelas' => 'XI RPL 3'],
            ['nama' => 'Abdan', 'kelas' => 'XI RPL 3'],
        ];

        return view('siswa', compact('data'));
    }
}

