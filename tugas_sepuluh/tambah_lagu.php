<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tambah Lagu Baru</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>

    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0">
                                <i class="fas fa-music me-2"></i> Tambah Lagu
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <?php if (isset($_SESSION['pesan'])): ?>
                                <div class="alert alert-<?= $_SESSION['tipe_pesan']; ?> alert-dismissible fade show">
                                    <?= $_SESSION['pesan']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                <?php unset($_SESSION['pesan'], $_SESSION['tipe_pesan']); ?>
                            <?php endif; ?>
                        <form method="post" action="proses_tambah_lagu.php">
                            <div class="mb-3">
                                <label class="form-label fw-bold">ID Lagu</label>
                                <input type="number" name="id" class="form-control" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Lagu</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Artis</label>
                                <input type="text" name="artis" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Genre</label>
                                <input type="text" name="genre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tahun Rilis</label>
                                <input type="number" name="tahun_rilis" class="form-control" min="1900" max="2099" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Durasi</label>
                                <input type="number" name="durasi" class="form-control" step="0.01" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="index.php" class="btn btn-secondary me-2">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>