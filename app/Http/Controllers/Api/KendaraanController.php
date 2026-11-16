<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return response()->json($kendaraans, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat_kendaraan' => 'required|string|unique:kendaraans',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik' => 'required|string',
            'warna_kendaraan' => 'required|string',
        ]);

        $kendaraan = Kendaraan::create($validated);

        return response()->json([
            'message' => 'Data kendaraan berhasil disimpan',
            'data' => $kendaraan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return response()->json($kendaraan, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update($request->all());

        return response()->json([
            'message' => 'Data kendaraan berhasil diperbarui',
            'data' => $kendaraan
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kendaraan::destroy($id);
        return response()->json([
            'message' => 'Data kendaraan berhasil dihapus'
        ], 200);
    }
}