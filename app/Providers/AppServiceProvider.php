<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom([
            database_path('migrations/01_Blog_dan_Produk'),
            database_path('migrations/02_Akademik'),
            database_path('migrations/03_Pendaftaran'),
            database_path('migrations/04_Apotek'),
        ]);
    }
}
