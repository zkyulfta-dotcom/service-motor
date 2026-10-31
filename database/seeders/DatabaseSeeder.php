<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menjalankan ProductSeeder yang sudah Anda buat
        $this->call([
            ProductSeeder::class,
        ]);

        // (Opsional) Jika Anda juga ingin membuat user bawaan Laravel, 
        // Anda bisa uncomment baris di bawah ini:
        
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}