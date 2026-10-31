<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan namespace DB ini

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Smart TV Samsung 24 inch',
                'harga' => 1500000,
                'deskripsi' => 'Ini adalah sebuah deskripsi dummy',
                'kategori_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Laptop Lenovo Thinkpad',
                'harga' => 5000000,
                'deskripsi' => 'Ini adalah deskripsi laptop',
                'kategori_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Smart Watch',
                'harga' => 300000,
                'deskripsi' => 'Ini adalah deskripsi smartwatch',
                'kategori_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}