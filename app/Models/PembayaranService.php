<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranService extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_services';

    protected $fillable = [
        'id_servis_pelanggan',
        'jumlah_biaya_servis',
        'jenis_pembayaran',
    ];

    // Relasi ke ServicePelanggan
    public function servicePelanggan()
    {
        return $this->belongsTo(ServicePelanggan::class, 'id_servis_pelanggan', 'id_servis_pelanggan');
    }
}