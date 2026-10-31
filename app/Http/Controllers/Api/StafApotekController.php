<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StafApotek;
use Illuminate\Http\Request;

class StafApotekController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => StafApotek::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_staff' => 'required|unique:staf_apotek,id_staff',
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'no_hp' => 'nullable|string|max:15',
        ]);

        $staf = StafApotek::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil disimpan',
            'data' => $staf
        ], 201);
    }
}