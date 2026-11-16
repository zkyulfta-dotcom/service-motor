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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk'); // Custom Primary Key
            $table->string('nama_produk', 150); // Kolom nama dengan panjang maksimal 150 karakter
            $table->integer('harga'); // Kolom harga
            $table->integer('stok')->default(0); // Tambahan kolom stok produk
            $table->string('kategori', 100)->nullable(); // Tambahan kolom kategori
            $table->text('deskripsi_produk')->nullable(); // Kolom deskripsi
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk'); // Diperbaiki agar sesuai dengan nama tabel di atas
    }
};