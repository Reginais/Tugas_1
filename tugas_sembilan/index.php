<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Soal Latihan</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <p>Nama: Regina Inryanti Simanjuntak</p>
        <p>NPM: 2410631170102</p>
        
        <h1>Pilih Menu</h1>
        
        <li><a href="?page=soal1">Soal 1 - Jenis Kendaraan</a></li>
        <li><a href="?page=soal2">Soal 2 - Bilangan Genap</a></li>
        <li><a href="?page=soal3">Soal 3 - Daftar Hewan</a></li>
        <li><a href="?page=soal4">Soal 4 - Genap atau Ganjil</a></li>
        
        <?php
            if(isset($_GET['page'])){
            $page = $_GET['page'];

            if($page == "soal1"){
                include "soal1.php";
            } elseif($page == "soal2"){
                include "soal2.php";
            } elseif($page == "soal3"){
                include "soal3.php";
            } elseif($page == "soal4"){
                include "soal4.php";
            }
            } else {
                echo "Silakan pilih menu di atas.";
            }
        ?>
    </body>
</html>