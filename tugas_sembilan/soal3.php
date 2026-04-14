<h2>Daftar Hewan</h2>

<form method="post">
    <input type="text" name="h1" required><br>
    <input type="text" name="h2" required><br>
    <input type="text" name="h3" required><br>
    <input type="text" name="h4" required><br>
    <input type="text" name="h5" required><br>
    <button type="submit" name="submit">Tampilkan</button>
</form>

<?php
if(isset($_POST['submit'])){
    $hewan = [
        $_POST['h1'],
        $_POST['h2'],
        $_POST['h3'],
        $_POST['h4'],
        $_POST['h5']
    ];

    foreach($hewan as $h => $nama){
        echo "Nama Hewan: " . $nama. "<br>";
    }
}
?>