<?php
include 'koneksi.php';

$id_lama = $_POST['id_lama']; 
$id_baru = $_POST['id_buku']; 
$judul   = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun   = $_POST['tahun'];
$harga   = $_POST['harga'];
$stok    = $_POST['stok'];

$stmt = $conn->prepare("UPDATE buku SET ID=?, Judul=?, Penulis=?, Tahun_Terbit=?, Harga=?, stok=? WHERE ID=?");
$stmt->bind_param("isssdii", $id_baru, $judul, $penulis, $tahun, $harga, $stok, $id_lama);

if ($stmt->execute()) {
    echo "<script>alert('Data Berhasil Diperbarui!'); window.location='index.php';</script>";
} else {
    echo "Gagal: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>