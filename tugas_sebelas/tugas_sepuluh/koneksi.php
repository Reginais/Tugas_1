<?php
$conn = new mysqli("localhost", "root", '', "aplikasi_musik");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>