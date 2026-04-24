<?php
include 'koneksi.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM buku WHERE ID = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Buku telah dihapus!'); window.location='index.php';</script>";
} else {
    echo "Gagal menghapus data";
}
$stmt->close();
$conn->close();
?>