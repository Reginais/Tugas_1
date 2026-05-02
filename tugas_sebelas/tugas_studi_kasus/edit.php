<?php include 'koneksi.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM buku WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Buku</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body style="background-color: #f4f7f6;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4 border-0 shadow-sm">
                        <h3 class="fw-bold mb-4">Edit Buku</h3>
                        <form action="proses_edit.php" method="POST">
                            <input type="hidden" name="id_lama" value="<?= $data['ID']; ?>">
                            <div class="mb-3">
                                <label class="form-label">ID Buku</label>
                                <input type="number" name="id_buku" class="form-control" value="<?= $data['ID']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" name="judul" class="form-control" value="<?= $data['Judul']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" name="penulis" class="form-control" value="<?= $data['Penulis']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Terbit</label>
                                <input type="number" name="tahun" class="form-control" value="<?= $data['Tahun_Terbit']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" name="harga" step="1" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control" required>                        
                            </div>
                            <button type="submit" class="btn btn-dark w-100 p-2">Simpan</button>                           
                            <a href="index.php" class="btn btn-light border w-100 mt-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>