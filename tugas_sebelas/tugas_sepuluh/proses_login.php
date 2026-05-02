<?php
session_start();

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT ID, Username FROM user WHERE Username = ? AND Password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        $_SESSION['nama']              = $user['Username'];
        $_SESSION['katasandi']         = $user['password'];
        $_SESSION['login_Un51k4'] = true;

        header("Location: index.php");
        exit;

    } else {

        header("Location: login.php?message=" . urlencode("Username atau Password salah"));

    }

    $stmt->close();
}
?>