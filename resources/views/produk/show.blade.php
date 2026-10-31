<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <!-- Menambahkan Bootstrap CSS agar serasi dengan form tambah -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h2>Daftar Produk Toko</h2>

        <!-- Tombol menuju halaman form tambah produk -->
        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">+ Tambah Produk Baru</a>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Kategori ID</th>
                </tr>
            </thead>
            <tbody>
                {{-- Melakukan perulangan data produk yang dikirim dari controller --}}
                @foreach ($dataProduk as $item)
                    <tr>
                        {{-- Membuat nomor urut otomatis --}}
                        <td>{{ $loop->iteration }}</td>
                        
                        {{-- Menampilkan kolom dari database --}}
                        <td>{{ $item->nama_produk }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->deskripsi_produk ?? $item->deskripsi }}</td>
                        <td>{{ $item->kategori_id ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>