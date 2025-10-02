<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    // secara otomatis model ini 
    //table yang digunakan adalah table 'kendaraans'

    //table yang digunakan untuk model ini adalah table 'kendaraan'
    protected $table = 'Kendaraan';

    //apa aja yang boleh di isi
    public $fillable = ['tittle', 'content'];

    //apa aja yang boleh diperlihatkan
    public $visible = ['tittle', 'content'];

    //megisi tanggal kapan dibuat dan kapan di update secara otomatis
    public $timestamps = true ;
    
}
