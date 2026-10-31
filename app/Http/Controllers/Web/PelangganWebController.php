<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganWebController extends Controller
{
    // Menampilkan halaman daftar pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    // Menyimpan data dari form web
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|unique:pelanggan,pelanggan_id',
            'pelanggan_nama' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
        ]);

        Pelanggan::create($request->all());

        return redirect()->back()->with('success', 'Data pelanggan berhasil ditambahkan!');
    }
}