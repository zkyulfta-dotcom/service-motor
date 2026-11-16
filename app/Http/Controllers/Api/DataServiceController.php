<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use App\Models\ServicePelanggan;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index()
    {
        $dataServices = DataService::with('servicePelanggan.pelanggan')->get();
        return response()->json($dataServices, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required|exists:service_pelanggans,id_servis_pelanggan',
            'estimasi_service' => 'required|string',
            'nama_mekanik' => 'required|string',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService = DataService::create($validated);

        return response()->json([
            'message' => 'Data service berhasil disimpan',
            'data' => $dataService
        ], 201);
    }

    public function show(string $id)
    {
        $dataService = DataService::with('servicePelanggan')->findOrFail($id);
        return response()->json($dataService, 200);
    }

    public function update(Request $request, string $id)
    {
        $dataService = DataService::findOrFail($id);
        $dataService->update($request->all());

        return response()->json([
            'message' => 'Data service berhasil diperbarui',
            'data' => $dataService
        ], 200);
    }

    public function destroy(string $id)
    {
        DataService::destroy($id);
        return response()->json([
            'message' => 'Data service berhasil dihapus'
        ], 200);
    }

    // Endpoint khusus untuk menampilkan keluhan otomatis berdasarkan ID Servis Pelanggan
    public function getDetailService($id_servis_pelanggan)
    {
        $service = ServicePelanggan::with('pelanggan')->findOrFail($id_servis_pelanggan);
        return response()->json([
            'id_servis_pelanggan' => $service->id_servis_pelanggan,
            'keluhan_kendaraan' => $service->keluhan_kendaraan,
        ], 200);
    }
}