<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
class Dosen extends Model
{
    protected $fillable = ['nama', 'nipd'];
    protected $visible  = ['nama', 'nipd'];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'id_dosen');
    }
}
