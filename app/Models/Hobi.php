<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $fillable = ['nama_hobi'];

    public function mahasiswaa()
    {
        return $this->belongToMany(Mahasiswa::class, 'mahasiswa_hobi', 'id_hobi', 'id_mahasiswa');
    }
}
