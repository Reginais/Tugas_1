<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $judul  = isset($_POST['judul']) ? trim($_POST['judul']) : '';
    $artis  = isset($_POST['artis']) ? trim($_POST['artis']) : '';
    $genre  = isset($_POST['genre']) ? trim($_POST['genre']) : '';
    $tahun  = isset($_POST['tahun_rilis']) ? (int)$_POST['tahun_rilis'] : 0;
    $durasi = isset($_POST['durasi']) ? (float)$_POST['durasi'] : 0;

    if ($id <= 0 || $judul === '' || $artis === '') {
        $_SESSION['pesan'] = " Data tidak valid";
        $_SESSION['tipe_pesan'] = "danger";
        header("Location: tambah_lagu.php");
        exit;
    }

    $cek = $conn->prepare("SELECT ID FROM lagu WHERE ID = ?");
    $cek->bind_param("i", $id);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows > 0) {
        $_SESSION['pesan'] = "ID Lagu sudah digunakan";
        $_SESSION['tipe_pesan'] = "danger";
        header("Location: tambah_lagu.php");
        exit;
    }
    $cek->close();

    $stmt = $conn->prepare("
        INSERT INTO lagu (ID, Judul, Artis, Genre, Tahun_Rilis, Durasi)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param("isssid", $id, $judul, $artis, $genre, $tahun, $durasi);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Lagu berhasil ditambahkan";
        $_SESSION['tipe_pesan'] = "success";
    } else {
        $_SESSION['pesan'] = "Terjadi Kesalahan: " . $stmt->error;
        $_SESSION['tipe_pesan'] = "danger";
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit;

} else {
    header("Location: index.php");
    exit;
}
?>