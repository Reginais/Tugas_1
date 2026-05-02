<?php
session_start();

include 'koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idpengguna = $_POST['idpengguna'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, nama, katasandi FROM pengguna WHERE id = ? AND nama = ? AND katasandi = ?");
    $stmt->bind_param("iss", $idpengguna, $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        $_SESSION['id']                 = $user['id'];
        $_SESSION['nama']               = $user['nama'];
        $_SESSION['katasandi']          = $user['katasandi'];
        $_SESSION['login_Un51k4']  = true;

        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?message=" . urlencode("Nama atau Kata sandi salah"));
        exit;
    }

    $stmt->close();
}
?>