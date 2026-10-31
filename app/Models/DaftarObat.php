<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarObat extends Model
{
    use HasFactory;

    protected $table = 'daftar_obat';
    
    // TEMPELKAN KODE INI DI SINI:
    protected $fillable = [
        'kode_obat', 
        'nama_obat', 
        'stok_obat', 
        'tanggal_kadaluarsa'
    ];
}