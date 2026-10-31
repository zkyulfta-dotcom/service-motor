<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Staf Apotek</title>
    <!-- Menggunakan Bootstrap 5 untuk tampilan antarmuka -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <h2 class="mb-4">Manajemen Data Staf Apotek</h2>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form Tambah Staf -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">Tambah Staf Apotek Baru</div>
            <div class="card-body">
                <form action="/staf-web" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">ID Staff</label>
                        <input type="text" name="id_staff" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Data Staf</button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Staf -->
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">Daftar Staf Apotek</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Staff</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>No HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stafs as $s)
                        <tr>
                            <td>{{ $s->id_staff }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->alamat }}</td>
                            <td>{{ $s->tempat_lahir }}, {{ $s->tanggal_lahir }}</td>
                            <td>{{ $s->no_hp }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>