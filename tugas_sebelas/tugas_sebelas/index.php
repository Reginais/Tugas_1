<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mohon login terlebih dahulu"));
    exit;
}
include 'koneksi.php';

$keyword = "";
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM buku WHERE Judul LIKE ? OR Penulis LIKE ?");
    $search_param = "%$keyword%";
    $stmt->bind_param("ss", $search_param, $search_param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM buku");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Perpustakaan Online</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            :root {
            --primary-color: #6366f1; 
            --secondary-color: #4f46e5;
            --bg-body: #f8fafc;
            }
            body { background-color: var(--bg-body); font-family: 'Inter', 'Segoe UI', sans-serif; }
            .container { margin-top: 40px; margin-bottom: 40px; }
            .card { border: none; border-radius: 20px; box-shadow: 0 10px 25px rgba(99, 102, 241, 0.1); overflow: hidden; }
            .card-header-custom { background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; padding: 2rem; border: none; }
            .search-container { position: relative; max-width: 400px; }
            .search-container input { border-radius: 10px; border: 1px solid #e2e8f0; padding-left: 40px; }
            .search-container i { position: absolute; left: 15px; top: 12px; color: #94a3b8; }
            .table thead { background-color: #f1f5f9; color: #475569; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em; }
            .table-hover tbody tr:hover { background-color: #f8faff; transition: 0.3s; }
            .badge-id { background-color: #e0e7ff; color: #4338ca; font-weight: 600; }
            .btn-logout { border-radius: 10px; font-weight: 500; transition: 0.3s; }
            .btn-logout:hover { background-color: #fee2e2; color: #dc2626; }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="card">
                <div class="card-header-custom d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="fw-bold mb-0"> Perpustakaan Online</h2>
                        <p class="fw-bold text-white">Halo, <?= htmlspecialchars($_SESSION['nama']); ?></p>
                    </div>
                    <a href="logout.php" class="btn btn-light btn-logout text-danger shadow-sm">Logout</a>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <form action="" method="GET" class="search-container">
                                <i class="fas fa-search"></i>
                                <input type="text" name="search" class="form-control form-control-lg" 
                                    placeholder="Cari Judul Buku atau Penulis" value="<?= htmlspecialchars($keyword); ?>">
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th class="py-3 px-3">ID</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th class="text-center">Tahun</th>
                                    <th>Harga</th>
                                    <th class="text-center">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td class="px-3"><span class="text-dark"><?= $row['ID']; ?></span></td>
                                        <td>
                                            <div class="text-dark"><?= htmlspecialchars($row['Judul']); ?></div>
                                        </td>
                                        <td class="text-dark"><?= htmlspecialchars($row['Penulis']); ?></td>
                                        <td class="text-center"><?= $row['Tahun_Terbit']; ?></td>
                                        <td class="text-dark">Rp <?= number_format($row['Harga'], 0, ',', '.'); ?></td>
                                        <td class="text-center">
                                            <?php 
                                                $stokClass = $row['stok'] < 5 ? 'bg-danger' : 'bg-dark';
                                                $stokText = $row['stok'] < 5 ? 'Stok Tipis' : 'Tersedia';
                                            ?>
                                            <span class="badge <?= $stokClass ?> rounded-pill px-3">
                                                <?= $row['stok']; ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            <i class="fas fa-search mb-3 d-block fa-2x"></i>
                                            Buku "<strong><?= htmlspecialchars($keyword) ?></strong>" tidak ditemukan
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>