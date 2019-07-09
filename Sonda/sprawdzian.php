<?php
    if (isset($_GET['akcja'])){
        $wybor = $_GET['day'];
        $conn = @new mysqli('localhost', 'kmroczek', 'kmroczek', 'kmroczek');
        if ($conn->connect_errno) die('Brak połączenia.');//errno zawiera numery błędów
        $ile = "SELECT 'glosy' FROM dni WHERE id='$wybor'";
        $conn->query("UPDATE dni SET glosy=glosy + 1 WHERE id=".$wybor) or die('Błąd.');

        header("Content-type: image/jpeg");
        $rysunek = imagecreate (700,100)
        or die("Biblioteka graficzna nie została zainstalowana!");

        $kolorbialy = imagecolorallocate ($rysunek, 255, 255, 255);
        $kolorczarny = imagecolorallocate ($rysunek, 0, 0, 0);
        imagefill($rysunek, 0, 0, $kolorbialy);

        $sql = "SELECT * FROM dni";
        $rs = $conn->query($sql) or die ("Błąd operacji.");
        $kolorczarny = imagecolorallocate ($rysunek, 0, 0, 0);
        if ($rs->num_rows > 0){ 
            while ($rec=$rs->fetch_array()){
                $kolorslupka = imagecolorallocate ($rysunek, $rec['glosy'], $rec['glosy'],0);
                imagefilledrectangle ($rysunek, 100, 10 * $rec['id'], $rec['glosy'] * 3, 10 * $rec['id'] + 10, $kolorslupka);
                imagestring ($rysunek, 2, 20, 10 * $rec['id'], $rec['nazwa'], $kolorczarny);
                imagestring ($rysunek, 2, $rec['glosy'] * 3, 10 * $rec['id'], $rec['glosy'], $kolorczarny);
            } 
        }
        imagejpeg($rysunek);
        $rs->close();
        $conn->close();
    }
?>