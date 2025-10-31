<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = ['nama', 'alamat', 'no_hp'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'pelanggan_id');
    }
}
