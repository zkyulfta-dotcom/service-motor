<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_servis_pelanggan'); // Relasi ke service_pelanggans
            $table->decimal('jumlah_biaya_servis', 12, 2);
            $table->enum('jenis_pembayaran', ['Cash / Tunai', 'Non Tunai']); // Pilihan radio button
            $table->timestamps();

            $table->foreign('id_servis_pelanggan')
                  ->references('id_servis_pelanggan')
                  ->on('service_pelanggans')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_services');
    }
};