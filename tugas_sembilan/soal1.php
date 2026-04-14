<h2>Jenis Kendaraan</h2>

    <form method="post">
        <input type="text" name="model" placeholder="">
        <button type="submit">Cek</button>
    </form>

    <?php
    if(isset($_POST['model'])){
        $model = $_POST['model'];

        switch($model){
            case "Motor":
            case "Sepeda":
                echo "Roda 2";
                break;
            case "Bajai":
            case "Becak":
                echo "Roda 3";
                break;
            case "Mobil":
            case "Golf Cart":
                echo "Roda 4";
                break;
            default:
                echo "Tidak diketahui";
        }
    }
    ?>