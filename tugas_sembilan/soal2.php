<h2>Bilangan Genap</h2>

    <form method="post">
        <input type="text" name="awal" placeholder="Angka awal">
        <input type="text" name="akhir" placeholder="Angka akhir">
        <button type="submit">Tampilkan</button>
    </form>

    <?php
    if(isset($_POST['awal']) && isset($_POST['akhir'])){
        for($i = $_POST['awal']; $i <= $_POST['akhir']; $i++){
            if($i % 2 == 0){
                echo $i . "<br>";
            }
        }
    }
    ?>