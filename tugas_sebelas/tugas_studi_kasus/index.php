<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mohon login terlebih dahulu"));
    exit;
}
?>
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aplikasi Pengelolaan Buku</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
         <style>
            body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
            .container { margin-top: 50px; }
            .card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
            .table thead { background-color: #2d3436; color: white; }
            .btn-success { background-color: #1a1c1c; border: none; border-radius: 8px; }
            .badge-id { background-color: #dfe6e9; color: #2d3436; }
        </style>
    </head>
    
    <body>
        <div class="container">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark"> Pengelolaan Buku</h2>
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-muted">Halo, <strong><?= htmlspecialchars($_SESSION['nama']); ?></strong></span>
                        <a href="tambah.php" class="btn btn-dark px-4">Tambah Buku</a>
                        <a href="logout.php" class="btn btn-outline-danger px-4">Logout</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th class="text-center">Tahun Terbit</th>
                                <th>Harga</th>
                                <th class="text-center">Stok</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            $result = $conn->query("SELECT * FROM buku");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><span class="badge badge-id"><?= $row['ID']; ?></span></td>
                            <td class="fw-bold"><?= htmlspecialchars($row['Judul']); ?></td>
                            <td><?= htmlspecialchars($row['Penulis']); ?></td>
                            <td class="text-center"><?= $row['Tahun_Terbit']; ?></td>
                            <td class="text-dark fw-blod">Rp <?= number_format($row['Harga'], 0, ',', '.'); ?></td>
                            <td class="text-center">
                                <span class="badge <?= $row['stok'] < 5 ? 'bg-danger' : 'bg-dark'; ?>">
                                    <?= $row['stok']; ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="edit.php?id=<?= $row['ID']; ?>" class="btn btn-sm btn-outline-dark fw-bold">Edit</a>
                                    <a href="hapus.php?id=<?= $row['ID']; ?>" class="btn btn-sm btn-outline-dark fw-bold" onclick="return confirm('Hapus buku ini?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            }
                            }  else {
                                echo "<tr><td colspan='7' class='text-center'>Data belum tersedia</td></tr>";
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>