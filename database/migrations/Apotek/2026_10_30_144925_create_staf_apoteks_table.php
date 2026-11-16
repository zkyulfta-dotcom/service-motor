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
    Schema::create('staf_apotek', function (Blueprint $table) {
        $table->string('id_staff', 20)->primary();
        $table->string('nama', 100);
        $table->text('alamat')->nullable();
        $table->string('tempat_lahir', 50)->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->string('no_hp', 15)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staf_apoteks');
    }
};
