<?php include 'koneksi.php';?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tambah Buku</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background-color: #f4f7f6; }
            .card { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
            .btn-primary { background-color: #000000; border: none; }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h3 class="fw-bold text-center mb-4">Input Data Buku</h3>
                        <form action="proses_tambah.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">ID Buku</label>
                                <input type="number" name="id_buku" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" name="penulis" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Terbit</label>
                                <input type="number" name="tahun" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Harga</label>
                                <input type="number" name="harga" step="1" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark p-2">Simpan</button>
                                <a href="index.php" class="btn btn-light border">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>