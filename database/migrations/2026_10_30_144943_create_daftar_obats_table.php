<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('daftar_obat', function (Blueprint $table) {
        $table->string('kode_obat', 20)->primary();
        $table->string('nama_obat', 100);
        $table->integer('stok_obat');
        $table->date('tanggal_kadaluarsa');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_obats');
    }
};
