<?php 
include 'koneksi.php';

$id      = $_POST['id_buku'];
$judul   = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun   = $_POST['tahun'];
$stok    = $_POST['stok'];
$harga   = $_POST['harga'];

$stmt = $conn->prepare("INSERT INTO buku (ID, Judul, Penulis, Tahun_Terbit, Harga, stok) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssdi", $id, $judul, $penulis, $tahun, $harga, $stok);

if ($stmt->execute()) {
    echo "<script>alert('Data Berhasil Disimpan!'); window.location='index.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>