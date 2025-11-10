<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'prodak_id',
        'jumlah',
        'subtotal',
    ];

    // Relasi: DetailTransaksi milik satu transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    // Relasi: DetailTransaksi punya satu produk
    public function prodak()
    {
        return $this->belongsTo(Prodak::class);
    }
}
