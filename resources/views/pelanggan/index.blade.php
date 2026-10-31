<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Apotek</title>
    <!-- Menggunakan Bootstrap 5 agar tampilannya rapi secara instan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Manajemen Data Pelanggan (Web View)</h2>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form Tambah Pelanggan -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">Tambah Pelanggan Baru</div>
            <div class="card-body">
                <form action="/web/pelanggan" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">ID Pelanggan</label>
                        <input type="text" name="pelanggan_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" name="pelanggan_nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Pelanggan -->
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">Daftar Pelanggan</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelanggans as $p)
                        <tr>
                            <td>{{ $p->pelanggan_id }}</td>
                            <td>{{ $p->pelanggan_nama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_hp }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>