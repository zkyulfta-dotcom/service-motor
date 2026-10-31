<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarObat;
use Illuminate\Http\Request;

class DaftarObatController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => DaftarObat::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:daftar_obat,kode_obat',
            'nama_obat' => 'required|string|max:100',
            'stok_obat' => 'required|integer',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $obat = DaftarObat::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil disimpan',
            'data' => $obat
        ], 201);
    }
}