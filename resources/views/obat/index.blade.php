<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat Apotek</title>
    <!-- Menggunakan Bootstrap 5 untuk tampilan antarmuka -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <h2 class="mb-4">Manajemen Daftar Obat Apotek</h2>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form Tambah Obat -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">Tambah Obat Baru</div>
            <div class="card-body">
                <form action="/obat-web" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Obat</label>
                        <input type="text" name="kode_obat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok Obat</label>
                        <input type="number" name="stok_obat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Kadaluarsa / Expired</label>
                        <input type="date" name="tanggal_kadaluarsa" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Data Obat</button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Obat -->
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">Tabel Data Obat</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Stok</th>
                            <th>Tanggal Kadaluarsa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obats as $o)
                        <tr>
                            <td>{{ $o->kode_obat }}</td>
                            <td>{{ $o->nama_obat }}</td>
                            <td>{{ $o->stok_obat }}</td>
                            <td>{{ $o->tanggal_kadaluarsa }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>