<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\StafApotekController;
use App\Http\Controllers\Api\DaftarObatController;
// Tambahan Controller Service Motor
use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\ServicePelangganController;
use App\Http\Controllers\Api\DataServiceController;
use App\Http\Controllers\Api\PembayaranServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// --- ROUTE PELANGGAN ---
Route::get('/pelanggan', [PelangganController::class, 'index']);          // Menampilkan semua data
Route::post('/pelanggan', [PelangganController::class, 'store']);         // Menambah data baru
Route::get('/pelanggan/{id}', [PelangganController::class, 'show']);      // Menampilkan detail data berdasarkan ID
Route::put('/pelanggan/{id}', [PelangganController::class, 'update']);    // Mengubah data
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']); // Menghapus data


// --- ROUTE STAF APOTEK ---
Route::get('/staf', [StafApotekController::class, 'index']);          // Menampilkan semua data staf
Route::post('/staf', [StafApotekController::class, 'store']);         // Menambah data staf baru
Route::get('/staf/{id}', [StafApotekController::class, 'show']);      // Menampilkan detail data staf
Route::put('/staf/{id}', [StafApotekController::class, 'update']);    // Mengubah data staf
Route::delete('/staf/{id}', [StafApotekController::class, 'destroy']); // Menghapus data staf


// --- ROUTE DAFTAR OBAT ---
Route::get('/obat', [DaftarObatController::class, 'index']);          // Menampilkan semua data obat
Route::post('/obat', [DaftarObatController::class, 'store']);         // Menambah data obat baru
Route::get('/obat/{id}', [DaftarObatController::class, 'show']);      // Menampilkan detail data obat
Route::put('/obat/{id}', [DaftarObatController::class, 'update']);    // Mengubah data obat
Route::delete('/obat/{id}', [DaftarObatController::class, 'destroy']); // Menghapus data obat


// ==========================================
// --- ROUTE APLIKASI SERVICE MOTOR ---
// ==========================================

Route::apiResource('kendaraan', KendaraanController::class);
Route::apiResource('service-pelanggan', ServicePelangganController::class);
Route::apiResource('data-service', DataServiceController::class);
Route::apiResource('pembayaran-service', PembayaranServiceController::class);

// Endpoint khusus untuk memanggil keluhan otomatis berdasarkan ID Servis Pelanggan
Route::get('service-pelanggan-detail/{id}', [DataServiceController::class, 'getDetailService']);