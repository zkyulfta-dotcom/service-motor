<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Pelanggan::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|unique:pelanggan,pelanggan_id',
            'pelanggan_nama' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
        ]);

        $pelanggan = Pelanggan::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil disimpan',
            'data' => $pelanggan
        ], 201);
    }
}
