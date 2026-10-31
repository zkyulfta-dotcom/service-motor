<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database (opsional)
    protected $table = 'produk'; 

    // Menentukan primary key jika bukan 'id'
    protected $primaryKey = 'id_produk'; 

    // Mengatur kolom yang tidak boleh diisi (alternatif selain fillable)
    protected $guarded = ['id_produk']; 
}