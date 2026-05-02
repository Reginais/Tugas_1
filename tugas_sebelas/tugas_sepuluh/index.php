<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Login! Login! Login!"));
    exit;
}
?>

<?php include 'proses_index.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aplikasi Musik</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            body { background-color: #f8f9fa; }
            .table-container { 
            background: white; 
            border-radius: 12px; 
            padding: 25px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            }
            .badge-genre { background-color: #004ef7; color: white; }
            .btn-action { width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center; }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <?php if (isset($_SESSION['pesan'])): ?>
                <div class="alert alert-<?= $_SESSION['tipe_pesan']; ?> alert-dismissible fade show shadow-sm border-0">
                    <i class="fas fa-info-circle me-2"></i> <?= $_SESSION['pesan']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['pesan'], $_SESSION['tipe_pesan']); ?>
            <?php endif; ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold mb-0">
                <i class="fas fa-music me-2"></i>TemuLagu
            </h2>
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted small">
                    <i class="fas fa-user me-1"></i> halo, <?= htmlspecialchars($_SESSION['nama']) ?> di sini
                </span>
                <a href="tambah_lagu.php" class="btn btn-primary px-4 shadow-sm">
                    <i class="fas fa-plus"></i> Tambah Lagu
                </a>
                <a href="logout.php" class="btn btn-outline-danger shadow-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <form method="GET" class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label small fw-bold">Judul Lagu</label>
                        <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($search_judul) ?>">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label small fw-bold">Artis</label>
                        <input type="text" name="artis" class="form-control" value="<?= htmlspecialchars($search_artis) ?>">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-dark w-100">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Judul Lagu</th>
                            <th>Artis</th>
                            <th>Genre</th>
                            <th>Tahun Rilis</th>
                            <th>Durasi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="fw-bold text-muted"><?= $row['ID'] ?></td>
                            <td class="text-start ps-4 fw-bold"><?= htmlspecialchars($row['Judul']) ?></td>
                            <td class="text-start ps-4"><?= htmlspecialchars($row['Artis']) ?></td>
                            <td>
                                <span class="badge badge-genre rounded-pill px-3">
                                    <?= htmlspecialchars($row['Genre']) ?>
                                </span>
                            </td>
                            <td><?= $row['Tahun_Rilis'] ?></td>
                            <td class="text-nowrap">
                                <?php 
                                    $val = (string)$row['Durasi'];
                                    if (strpos($val, '.') !== false) {
                                        $parts = explode('.', $val);
                                        $menit = $parts[0];
                                        $detik = str_pad($parts[1], 2, "0", STR_PAD_RIGHT);
                                        echo $menit . "." . $detik;
                                    } else {
                                        echo $val . ":00";
                                    }
                                ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="edit.php?id=<?= $row['ID'] ?>" class="btn btn-sm btn-outline-warning btn-action">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="hapus.php?id=<?= $row['ID'] ?>" class="btn btn-sm btn-outline-danger btn-action" onclick="return confirm('Yakin ingin hapus lagu ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">Lagu tidak ditemukan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>