<?php
include 'koneksi.php';

$per_halaman = 10;
$halaman = (isset($_GET['halaman']) && is_numeric($_GET['halaman']) && $_GET['halaman'] > 0) 
            ? (int)$_GET['halaman'] 
            : 1;

$offset = ($halaman - 1) * $per_halaman;

$search_judul = isset($_GET['judul']) ? trim($_GET['judul']) : '';
$search_artis = isset($_GET['artis']) ? trim($_GET['artis']) : '';

$conditions = [];
$params = [];
$types = '';

if ($search_judul !== '') {
    $conditions[] = "Judul LIKE ?";
    $params[] = "%$search_judul%";
    $types .= 's';
}

if ($search_artis !== '') {
    $conditions[] = "Artis LIKE ?";
    $params[] = "%$search_artis%";
    $types .= 's';
}

$where = $conditions ? "WHERE " . implode(" AND ", $conditions) : "";

$sql_count = "SELECT COUNT(*) AS total FROM lagu $where";
$stmt_count = $conn->prepare($sql_count);

if ($types !== '') {
    $stmt_count->bind_param($types, ...$params);
}

$stmt_count->execute();
$result_count = $stmt_count->get_result();
$total_data = $result_count->fetch_assoc()['total'] ?? 0;
$total_halaman = ceil($total_data / $per_halaman);

$stmt_count->close();

if ($halaman > $total_halaman && $total_halaman > 0) {
    $halaman = $total_halaman;
    $offset = ($halaman - 1) * $per_halaman;
}

$sql_data = "SELECT * FROM lagu $where ORDER BY ID DESC LIMIT ? OFFSET ?";
$stmt_data = $conn->prepare($sql_data);

$params_data = [...$params, $per_halaman, $offset];
$types_data = $types . 'ii';
$stmt_data->bind_param($types_data, ...$params_data);
$stmt_data->execute();
$result = $stmt_data->get_result();
$stmt_data->close();
?>