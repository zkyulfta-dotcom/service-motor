<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Memanggil model Produk

class ProductController extends Controller
{
    // Menampilkan daftar produk dari Database
    public function index()
    {
        // Menggunakan "Produk" (pakai k) sesuai dengan nama model yang di-use di atas
        $dataProduk = Produk::all(); 

        // Kirim data ke view
        return view('produk.show', compact('dataProduk'));
    }

    // Menampilkan detail produk berdasarkan ID
    public function show($id)
    {
        return "Produk dengan ID: " . $id;
    }

    // Halaman tambah produk
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan data produk baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_produk' => 'required|max:150',
            'harga' => 'required|numeric',
        ]);

        // Menyimpan data ke database menggunakan Model Produk
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok ?? 0,
            'deskripsi_produk' => $request->deskripsi_produk,
        ]);

        // Mengembalikan ke halaman list produk setelah berhasil disimpan
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Halaman edit produk
    public function edit($id)
    {
        // Cari data produk berdasarkan ID
        $product = Produk::findOrFail($id);
        
        // Tampilkan view edit dan kirim data produknya
        return view('products.edit', compact('product'));
    }

    // Mengubah produk ke database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|max:150',
            'harga' => 'required|numeric',
        ]);

        // Cari produk lalu update datanya
        $product = Produk::findOrFail($id);
        $product->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok ?? 0,
            'deskripsi_produk' => $request->deskripsi_produk,
        ]);

        // Redirect kembali ke halaman list produk
        return redirect()->route('products.index')->with('success', 'Produk berhasil diubah!');
    }

    // Menghapus produk
    public function destroy($id)
    {
        // Cari produk berdasarkan ID lalu hapus dari database
        $produk = Produk::findOrFail($id);
        $produk->delete();

        // Redirect kembali ke halaman list dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

    // Pengujian to_route
    public function testToRoute()
    {
        return to_route('products.index');
    }
}