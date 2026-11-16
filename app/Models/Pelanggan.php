<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'alamat_pelanggan',
        'pekerjaan',
    ];

    // Tambahkan relasi ke ServicePelanggan
    public function servicePelanggans()
    {
        return $this->hasMany(ServicePelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
}