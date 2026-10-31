<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="wrapper">
        <div class="container">
            <div class="main-content">
                <h3 class="mt-4">List Product</h3>
                
                <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th> <!-- Kolom Baru -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $p)
                        <tr>
                            <td>{{ $p->id_produk }}</td>
                            <td>{{ $p->nama_produk }}</td>
                            <td>{{ $p->harga }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>{{ $p->deskripsi_produk }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('products.edit', $p->id_produk) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Tombol Hapus (Menggunakan Form dengan Method DELETE) -->
                                <form action="{{ route('products.destroy', $p->id_produk) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    Empty
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>