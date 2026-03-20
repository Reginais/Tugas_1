<!DOCTYPE html>
<html lang=en>
    
    <head>
        <title>Latihan Nilai</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <h1>Nilai Mahasiswa</h1>
        
        <form method="post" action="">
            Nama: <input type="text" name="nama"><br><br>
            Nilai: <input type="number" name="nilai"><br><br>
            <input type="submit" value="Proses">
        </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $nilai = $_POST['nilai'];

        // Menentukan predikat dari nilai
        if ($nilai >= 85 && $nilai <= 100) {
            $predikat = "A";
        } elseif ($nilai >= 75) {
            $predikat = "B";
        } elseif ($nilai >= 65) {
            $predikat = "C";
        } elseif ($nilai >= 50) {
            $predikat = "D";
        } elseif ($nilai >= 0) {
            $predikat = "E";
        } else {
            $predikat = "Tidak valid";
        }

        // Status lulus atau tidak
        if ($nilai >= 60) {
            $status = "Lulus";
        } else {
            $status = "Tidak Lulus";
        }

        echo "<h3>Hasil:</h3>";
        echo "Nama: $nama <br>";
        echo "Nilai: $nilai <br>";
        echo "Predikat: $predikat <br>";
        echo "Status: $status";
        }
    ?>
    </body>
</html>