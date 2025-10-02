<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // secara otomatis model ini
    protected $table = 'posts';
    
    protected $fillable = ['tittle', 'content', 'stok'];

    public $visible = ['id', 'tittle', 'content'];

    public $timestamps = true ;
    
}



