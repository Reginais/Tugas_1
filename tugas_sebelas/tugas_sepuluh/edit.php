<?php
include 'koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM lagu WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Lagu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Edit Lagu</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="proses_edit.php">
                            <input type="hidden" name="id_lama" value="<?= $row['ID']; ?>">
                            <div class="mb-3">
                                <label class="form-label fw-bold">ID Lagu</label>
                                <input type="number" name="id" class="form-control"
                                    value="<?= $row['ID']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Lagu</label>
                                <input type="text" name="judul" class="form-control"
                                value="<?= htmlspecialchars($row['Judul']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Artis</label>
                                <input type="text" name="artis" class="form-control"
                                value="<?= htmlspecialchars($row['Artis']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Genre</label>
                                <input type="text" name="genre" class="form-control"
                                value="<?= htmlspecialchars($row['Genre']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tahun Rilis</label>
                                <input type="number" name="tahun_rilis" class="form-control"
                                value="<?= $row['Tahun_Rilis']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Durasi</label>
                                <input type="number" name="durasi" class="form-control"
                                step="0.01" value="<?= $row['Durasi']; ?>" required>
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
    </body>
</html>