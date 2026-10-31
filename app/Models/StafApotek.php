<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StafApotek extends Model
{
    use HasFactory;

    protected $table = 'staf_apotek';
    
    // TEMPELKAN KODE INI DI SINI:
    protected $fillable = [
        'id_staff', 
        'nama', 
        'alamat', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'no_hp'
    ];
}