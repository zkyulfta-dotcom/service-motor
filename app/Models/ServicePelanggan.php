<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePelanggan extends Model
{
    use HasFactory;

    protected $table = 'service_pelanggans';
    protected $primaryKey = 'id_servis_pelanggan';

    protected $fillable = [
        'no_plat_kendaraan',
        'id_pelanggan',
        'keluhan_kendaraan',
        'tanggal_servis',
    ];

    // Relasi ke Pelanggan (Many to One)
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    // Relasi ke Kendaraan (Many to One)
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'no_plat_kendaraan', 'no_plat_kendaraan');
    }
}
