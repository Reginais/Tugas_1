<?php
    
    $barang = [
    "nama" => "Keyboard",
    "harga" => 150000,
    "jumlah" => 2
    ];

    $total_sebelum_pajak = $barang["harga"] * $barang["jumlah"];
    $pajak = $total_sebelum_pajak * 0.10;
    $total_bayar = $total_sebelum_pajak + $pajak;

?>

<!DOCTYPE html>
<html lang ="en">
    <head>
        <title>Perhitungan Total Pembelian</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <style>
            body{
                font-family: Arial, sans-serif;
            }
            .kotak{
                width: 600px;
                border: 2px solid black;
                padding: 20px;
            }
            h2{
                text-align: locale_filter_matches;
            }
            p{
                margin: 5px 0;
            }
        </style>
    </head>

    <body>
        <div class="kotak">
            <h2>Perhitungan Total Pembelian (Dengan Array)</h2>
            <hr>
                <p>Nama Barang: <?php echo $barang["nama"]; ?></p>
                <p>Harga Satuan: Rp <?php echo number_format($barang["harga"],0,",","."); ?></p>
                <p>Jumlah Beli: <?php echo $barang["jumlah"]; ?></p>
                <p>Total Harga (Sebelum Pajak): Rp <?php echo number_format($total_sebelum_pajak,0,",","."); ?></p>
                <p>Pajak (10%): Rp <?php echo number_format($pajak,0,",","."); ?></p>

            <p><b>Total Bayar: Rp <?php echo number_format($total_bayar,0,",","."); ?></b></p>
        </div>
    </body>
</html>