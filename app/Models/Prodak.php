<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodak extends Model
{
    protected $fillable = ['nama_produk', 'harga', 'stok'];

    public function transaksis()    
    {
        return $this->belongsToMany(Transaksi::class, 'transaksi_prodak', 'prodak_id', 'transaksi_id')->withPivot('jumlah', 'subtotal');
}
}