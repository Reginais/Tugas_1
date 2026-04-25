<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_lama = (int)$_POST['id_lama']; 
    $id_baru = (int)$_POST['id'];      
    $judul   = $_POST['judul'];
    $artis   = $_POST['artis'];
    $genre   = $_POST['genre'];
    $tahun   = (int)$_POST['tahun_rilis'];
    $durasi  = (float)$_POST['durasi'];

    if (empty($judul) || empty($artis)) {
        echo "<script>alert('Judul dan Artis harus diisi!'); window.history.back();</script>";
        exit;
    }

    $sql = "UPDATE lagu SET 
            ID = ?, 
            Judul = ?, 
            Artis = ?, 
            Genre = ?, 
            Tahun_Rilis = ?, 
            Durasi = ? 
            WHERE ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssidi", $id_baru, $judul, $artis, $genre, $tahun, $durasi, $id_lama);

    if ($stmt->execute()) {
        echo "<script>
                alert('Data lagu berhasil diperbarui!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui data lagu: " . $stmt->error . "');
                window.history.back();
              </script>";
    }

    $stmt->close();
    $conn->close();

} else {
    header("Location: index.php");
    exit;
}
?>