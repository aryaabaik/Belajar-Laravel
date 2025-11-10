<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodak extends Model
{
    protected $fillable = ['nama_prodak', 'stok', 'harga'];
    protected $visible  = ['nama_prodak', 'stok', 'harga'];

    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'detail_transaksi', 'id_prodak', 'id_transaksi')
            ->withPivot('jumlah', 'sub_total')
            ->withTimestamps();
    }
}
