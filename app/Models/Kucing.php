<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kucing extends Model
{
    protected $fillable = [
        'nama',
        'warna',
        'umur',
        'suara',
    ];
}
