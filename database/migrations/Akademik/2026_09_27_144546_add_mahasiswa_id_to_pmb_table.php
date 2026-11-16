<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pmb', function (Blueprint $table) {
            $table->foreignId('mahasiswa_id')
                  ->nullable()
                  ->constrained('mahasiswas')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pmb', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
            $table->dropColumn('mahasiswa_id');
        });
    }
};