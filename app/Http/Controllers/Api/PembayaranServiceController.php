<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PembayaranService;
use Illuminate\Http\Request;

class PembayaranServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = PembayaranService::with('servicePelanggan')->get();
        return response()->json($pembayarans, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required|exists:service_pelanggans,id_servis_pelanggan',
            'jumlah_biaya_servis' => 'required|numeric',
            'jenis_pembayaran' => 'required|in:Cash / Tunai,Non Tunai',
        ]);

        $pembayaran = PembayaranService::create($validated);

        return response()->json([
            'message' => 'Pembayaran service berhasil disimpan',
            'data' => $pembayaran
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pembayaran = PembayaranService::with('servicePelanggan')->findOrFail($id);
        return response()->json($pembayaran, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembayaran = PembayaranService::findOrFail($id);
        $pembayaran->update($request->all());

        return response()->json([
            'message' => 'Pembayaran service berhasil diperbarui',
            'data' => $pembayaran
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PembayaranService::destroy($id);
        return response()->json([
            'message' => 'Pembayaran service berhasil dihapus'
        ], 200);
    }
}