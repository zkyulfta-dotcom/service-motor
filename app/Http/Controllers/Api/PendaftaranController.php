<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // GET: Lihat semua data (JSON)
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Pendaftaran::all()
        ], 200);
    }

    // POST: Tambah data (JSON)
    public function store(Request $request)
    {
        $pendaftaran = Pendaftaran::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
            'data' => $pendaftaran
        ], 201);
    }

    // PUT: Update data (JSON)
    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::find($id);
        if (!$pendaftaran) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $pendaftaran->update($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diperbarui',
            'data' => $pendaftaran
        ], 200);
    }

    // DELETE: Hapus data (JSON)
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        if (!$pendaftaran) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $pendaftaran->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}