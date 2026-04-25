<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt_get = $conn->prepare("SELECT Judul FROM lagu WHERE ID = ?");
    $stmt_get->bind_param("i", $id);
    $stmt_get->execute();
    $result = $stmt_get->get_result();

    if ($result->num_rows === 0) {
        $_SESSION['pesan'] = "Data tidak valid";
        $_SESSION['tipe_pesan'] = "danger";
        header("Location: index.php");
        exit;
    }

    $data = $result->fetch_assoc();
    $judul = $data['Judul'];
    $stmt_get->close();
    $stmt = $conn->prepare("DELETE FROM lagu WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Lagu <strong>" . htmlspecialchars($judul) . "</strong> berhasil dihapus";
        $_SESSION['tipe_pesan'] = "warning";
    } else {
        $_SESSION['pesan'] = "Lagu gagal dihapus!";
        $_SESSION['tipe_pesan'] = "danger";
    }

    $stmt->close();

} else {
    $_SESSION['pesan'] = "Data tidak valid!";
    $_SESSION['tipe_pesan'] = "danger";
}

$conn->close();
header("Location: index.php");
exit;