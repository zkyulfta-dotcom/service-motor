<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    
    // TEMPELKAN KODE INI DI SINI:
    protected $fillable = [
        'pelanggan_id', 
        'pelanggan_nama', 
        'alamat', 
        'no_hp'
    ];
}