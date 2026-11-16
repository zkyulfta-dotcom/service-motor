<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_pelanggans', function (Blueprint $table) {
            $table->id('id_servis_pelanggan'); // Primary Key
            
            // Kolom Foreign Key (menyesuaikan tipe data referensinya)
            $table->string('no_plat_kendaraan'); 
            $table->unsignedBigInteger('id_pelanggan'); 
            
            $table->text('keluhan_kendaraan');
            $table->date('tanggal_servis');
            $table->timestamps();

            // Mendefinisikan Relasi / Foreign Key Constraints
            $table->foreign('no_plat_kendaraan')
                  ->references('no_plat_kendaraan')
                  ->on('kendaraans')
                  ->onDelete('cascade');

            $table->foreign('id_pelanggan')
                  ->references('id_pelanggan')
                  ->on('pelanggans')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_pelanggans');
    }
};