<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_servis_pelanggan'); // Relasi ke service_pelanggans
            $table->string('estimasi_service');
            $table->string('nama_mekanik');
            $table->text('sparepart_pengganti')->nullable();
            $table->timestamps();

            $table->foreign('id_servis_pelanggan')
                  ->references('id_servis_pelanggan')
                  ->on('service_pelanggans')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_services');
    }
};