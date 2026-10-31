<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    // Menampilkan semua data (Opsional jika ingin membuat halaman tabel data)
    public function index()
    {
        $pendaftarans = Pendaftaran::all();
        return view('pendaftaran.index', compact('pendaftarans'));
    }

    // Menampilkan form pendaftaran
    public function create()
    {
        return view('pendaftaran.create');
    }

    // Menyimpan data pendaftaran ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'hobi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'nama_ayah' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
        ]);

        $data = $request->except('foto');

        // Handle upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/foto'), $filename);
            $data['foto'] = $filename;
        }

        Pendaftaran::create($data);

        return redirect()->back()->with('success', 'Pendaftaran berhasil disimpan!');
    }

    // Menampilkan form edit berdasarkan ID
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('pendaftaran.edit', compact('pendaftaran'));
    }

    // Mengupdate data pendaftaran di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'hobi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'nama_ayah' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $data = $request->except('foto');

        // Handle upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada di folder
            if ($pendaftaran->foto && file_exists(public_path('uploads/foto/' . $pendaftaran->foto))) {
                unlink(public_path('uploads/foto/' . $pendaftaran->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/foto'), $filename);
            $data['foto'] = $filename;
        }

        $pendaftaran->update($data);

        return redirect()->back()->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    // Menghapus data pendaftaran dari database
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Hapus file foto dari folder jika ada
        if ($pendaftaran->foto && file_exists(public_path('uploads/foto/' . $pendaftaran->foto))) {
            unlink(public_path('uploads/foto/' . $pendaftaran->foto));
        }

        $pendaftaran->delete();

        return redirect()->back()->with('success', 'Data pendaftaran berhasil dihapus!');
    }
}