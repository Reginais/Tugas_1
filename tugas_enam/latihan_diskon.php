<!DOCTYPE html>
<html>
<head>
    <title>Diskon Pembayaran Mahasiswa</title>
</head>
<body>

<?php
$npm = "";
$nama = "";
$prodi = "";
$semester = "";
$ukt = "";
$diskon = 0;
$total_bayar = 0;

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $ukt = $_POST['ukt'];

    if ($ukt >= 5000000 && $semester > 8) {
        $diskon = 15;
    } elseif ($ukt >= 5000000) {
        $diskon = 10;
    } else {
        $diskon = 0;
    }

    $potongan = $ukt * $diskon / 100;
    $total_bayar = $ukt - $potongan;
}
?>

<form method="post" action="">
    NPM : <input type="text" name="npm"><br><br>

    Nama : <input type="text" name="nama"><br><br>

    Prodi : <input type="text" name="prodi"><br><br>

    Semester : <input type="text" name="semester"><br><br>

    Biaya UKT : <input type="text" name="ukt"><br><br>

    <input type="submit" name="submit" value="Proses">
</form>

<?php
if (isset($_POST['submit'])) {
    echo "<h3>Luaran yang Diharuskan</h3>";
    echo "NPM : " . $npm . "<br>";
    echo "NAMA : " . $nama . "<br>";
    echo "PRODI : " . $prodi . "<br>";
    echo "SEMESTER : " . $semester . "<br>";
    echo "BIAYA UKT : Rp. " . number_format($ukt, 0, ',', '.') . ",-<br>";
    echo "DISKON : " . $diskon . "%<br>";
    echo "YANG HARUS DIBAYAR : Rp. " . number_format($total_bayar, 0, ',', '.') . ",-";
}
?>

</body>
</html>