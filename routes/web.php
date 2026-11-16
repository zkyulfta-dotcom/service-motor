<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PmbController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\PendaftaranController;

// TAMBAHAN CONTROLLER APOTEK & PELANGGAN
use App\Http\Controllers\Web\PelangganWebController;
use App\Http\Controllers\Web\StafApotekWebController;
use App\Http\Controllers\Web\DaftarObatWebController;

Route::pattern('id', '[0-9]+');

// 1. Halaman Utama & Dasar
Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

// Rute untuk pengujian to_route
Route::get('/test-route', [ProductController::class, 'testToRoute']);


// ==================================================
// 2. Rute Products (Termasuk Rute Baru untuk Tutorial Read)
// ==================================================

Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::put('/products/{id}', [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->name('products.destroy');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('products.show');


// ==================================================
// 3. Route Category
// ==================================================

Route::get('/category/{category}', function ($category) {
    return "Kategori yang dipilih: " . $category;
})->whereIn('category', ['movie', 'song', 'painting']);


// ==================================================
// 4. Group dengan Controller
// ==================================================

Route::controller(ProductController::class)->group(function () {
    Route::get('/products/test-group-1', 'index');
});


// ==================================================
// 5. Group dengan Middleware Auth
// ==================================================

Route::middleware(['auth'])->group(function () {
    Route::get('/user/change-password', function () {
        return "Halaman ganti password (hanya bisa diakses jika sudah login)";
    });

    Route::get('/user/profile', function () {
        return "Halaman profil user (hanya bisa diakses jika sudah login)";
    });
});


// ==================================================
// 6. Route Halaman Login
// ==================================================

Route::get('/login', function () {
    return "Ini adalah halaman login (Silakan login terlebih dahulu)";
})->name('login');


// ==================================================
// 7. Group dengan Prefix Admin
// ==================================================

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "Ini adalah halaman daftar user khusus admin (/admin/users)";
    });
});


// ==================================================
// 8. Halaman About
// ==================================================

Route::get('/about', function () {
    return view('about');
})->name('about');


// ==================================================
// 9. Rute Posts
// ==================================================

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts.index');


// ==================================================
// 10. SI KAMPUS TERINTEGRASI
// ==================================================

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
    ->name('mahasiswa.index');

Route::get('/pmb', [PmbController::class, 'index'])
    ->name('pmb.index');

Route::get('/akademik', [AkademikController::class, 'index'])
    ->name('akademik.index');

Route::get('/keuangan', [KeuanganController::class, 'index'])
    ->name('keuangan.index');

Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])
    ->name('perpustakaan.index');


// ==================================================
// 11. Rute Pendaftaran (Lengkap CRUD)
// ==================================================

Route::get('/pendaftaran', [PendaftaranController::class, 'index'])
    ->name('pendaftaran.index');

Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])
    ->name('pendaftaran.create');

Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
    ->name('pendaftaran.store');

Route::get('/pendaftaran/{id}/edit', [PendaftaranController::class, 'edit'])
    ->name('pendaftaran.edit');

Route::put('/pendaftaran/{id}', [PendaftaranController::class, 'update'])
    ->name('pendaftaran.update');

Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])
    ->name('pendaftaran.destroy');


// ==================================================
// 12. TAMBAHAN RUTE WEB APOTEK (Pelanggan, Staf, & Obat)
// ==================================================

// Rute Pelanggan Web
Route::get('/pelanggan-web', [PelangganWebController::class, 'index'])->name('pelanggan.web.index');
Route::post('/pelanggan-web', [PelangganWebController::class, 'store'])->name('pelanggan.web.store');
Route::get('/pelanggan-web/{id}/edit', [PelangganWebController::class, 'edit'])->name('pelanggan.web.edit');
Route::put('/pelanggan-web/{id}', [PelangganWebController::class, 'update'])->name('pelanggan.web.update');
Route::delete('/pelanggan-web/{id}', [PelangganWebController::class, 'destroy'])->name('pelanggan.web.destroy');

// Rute Staf Apotek Web
Route::get('/staf-web', [StafApotekWebController::class, 'index'])->name('staf.web.index');
Route::post('/staf-web', [StafApotekWebController::class, 'store'])->name('staf.web.store');
Route::get('/staf-web/{id}/edit', [StafApotekWebController::class, 'edit'])->name('staf.web.edit');
Route::put('/staf-web/{id}', [StafApotekWebController::class, 'update'])->name('staf.web.update');
Route::delete('/staf-web/{id}', [StafApotekWebController::class, 'destroy'])->name('staf.web.destroy');

// Rute Daftar Obat Web
Route::get('/obat-web', [DaftarObatWebController::class, 'index'])->name('obat.web.index');
Route::post('/obat-web', [DaftarObatWebController::class, 'store'])->name('obat.web.store');
Route::get('/obat-web/{id}/edit', [DaftarObatWebController::class, 'edit'])->name('obat.web.edit');
Route::put('/obat-web/{id}', [DaftarObatWebController::class, 'update'])->name('obat.web.update');
Route::delete('/obat-web/{id}', [DaftarObatWebController::class, 'destroy'])->name('obat.web.destroy');


// ==================================================
// 13. TAMBAHAN RUTE APLIKASI SERVICE MOTOR
// ==================================================

Route::get('/service-motor', function () {
    return view('service_motor');
})->name('service.motor');