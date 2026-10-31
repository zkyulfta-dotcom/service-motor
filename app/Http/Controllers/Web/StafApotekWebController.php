<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\StafApotek;
use Illuminate\Http\Request;

class StafApotekWebController extends Controller
{
    // Menampilkan halaman daftar staf apotek
    public function index()
    {
        $stafs = StafApotek::all();
        return view('staf.index', compact('stafs'));
    }

    // Menyimpan data staf baru dari form web
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

        StafApotek::create($request->all());

        return redirect()->back()->with('success', 'Data staf apotek berhasil ditambahkan!');
    }
}