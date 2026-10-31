<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4>Edit Data Pendaftaran</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ $pendaftaran->nama }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ $pendaftaran->email }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" value="{{ $pendaftaran->no_hp }}" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>