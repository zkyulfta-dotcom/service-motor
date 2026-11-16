<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServicePelanggan;
use Illuminate\Http\Request;

class ServicePelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServicePelanggan::with(['pelanggan', 'kendaraan'])->get();
        return response()->json($services, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat_kendaraan' => 'required|exists:kendaraans,no_plat_kendaraan',
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $service = ServicePelanggan::create($validated);

        return response()->json([
            'message' => 'Daftar service berhasil disimpan',
            'data' => $service->load('pelanggan', 'kendaraan')
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = ServicePelanggan::with(['pelanggan', 'kendaraan'])->findOrFail($id);
        return response()->json($service, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = ServicePelanggan::findOrFail($id);
        $service->update($request->all());

        return response()->json([
            'message' => 'Daftar service berhasil diperbarui',
            'data' => $service
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ServicePelanggan::destroy($id);
        return response()->json([
            'message' => 'Daftar service berhasil dihapus'
        ], 200);
    }
}