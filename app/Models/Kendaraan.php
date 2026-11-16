<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraans';
    protected $primaryKey = 'no_plat_kendaraan';
    public $incrementing = false; // Karena primary key berupa string (No Plat)
    protected $keyType = 'string';

    protected $fillable = [
        'no_plat_kendaraan',
        'jenis_kendaraan',
        'no_stnk',
        'tahun_pembuatan',
        'nama_pemilik',
        'warna_kendaraan',
    ];

    // Tambahkan relasi ke ServicePelanggan berdasarkan no_plat_kendaraan
    public function servicePelanggans()
    {
        return $this->hasMany(ServicePelanggan::class, 'no_plat_kendaraan', 'no_plat_kendaraan');
    }
}