<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json(Pelanggan::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'alamat_pelanggan' => 'required|string',
            'pekerjaan' => 'required|string',
        ]);

        $pelanggan = Pelanggan::create($validated);
        return response()->json(['message' => 'Data pelanggan berhasil disimpan', 'data' => $pelanggan], 201);
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return response()->json($pelanggan, 200);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
        return response()->json(['message' => 'Data pelanggan berhasil diperbarui', 'data' => $pelanggan], 200);
    }

    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return response()->json(['message' => 'Data pelanggan berhasil dihapus'], 200);
    }
}