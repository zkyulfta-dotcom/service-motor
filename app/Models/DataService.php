<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataService extends Model
{
    use HasFactory;

    protected $table = 'data_services';

    protected $fillable = [
        'id_servis_pelanggan',
        'estimasi_service',
        'nama_mekanik',
        'sparepart_pengganti',
    ];

    // Relasi ke ServicePelanggan
    public function servicePelanggan()
    {
        return $this->belongsTo(ServicePelanggan::class, 'id_servis_pelanggan', 'id_servis_pelanggan');
    }
}