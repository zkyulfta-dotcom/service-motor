<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->string('no_plat_kendaraan')->primary(); // Menjadikan No Plat sebagai Primary Key
            $table->enum('jenis_kendaraan', ['Matic', 'Manual Transmisi']); // Model radio button
            $table->string('no_stnk');
            $table->year('tahun_pembuatan');
            $table->string('nama_pemilik');
            $table->string('warna_kendaraan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
