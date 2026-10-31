<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\DaftarObat;
use Illuminate\Http\Request;

class DaftarObatWebController extends Controller
{
    // Menampilkan halaman daftar obat
    public function index()
    {
        $obats = DaftarObat::all();
        return view('obat.index', compact('obats'));
    }

    // Menyimpan data obat baru dari form web
    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:daftar_obat,kode_obat',
            'nama_obat' => 'required|string|max:100',
            'stok_obat' => 'required|integer',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        DaftarObat::create($request->all());

        return redirect()->back()->with('success', 'Data obat berhasil ditambahkan!');
    }
}