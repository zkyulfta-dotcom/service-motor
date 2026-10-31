<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

    <h1>Data Mahasiswa</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
        </tr>

        @forelse($mahasiswas as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->prodi }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Belum ada data mahasiswa</td>
            </tr>
        @endforelse
    </table>

</body>
</html>