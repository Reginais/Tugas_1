<h2>Genap atau Ganjil</h2>

    <form method="post">
        <input type="text" name="angka" placeholder="">
        <button type="submit">Cek</button>
    </form>

    <?php
    if(isset($_POST['angka'])){
        $angka = $_POST['angka'];
        echo ($angka % 2 == 0) ? "Genap" : "Ganjil";
    }
    ?>  