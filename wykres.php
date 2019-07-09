<?php
  for($i=0; $i<10; $i++)
    { $liczby[$i] = rand()%10; }
  header("Content-type: image/jpeg");
  $rysunek = imagecreate (500,500)
    or die("Biblioteka graficzna nie została zainstalowana!");
  $kolorbialy = imagecolorallocate ($rysunek, 255, 255, 255);
  $kolorczarny = imagecolorallocate ($rysunek, 0, 0, 0);
  imagefill($rysunek, 0, 0, $kolorbialy);

  $j = 10;
  for( $i=0; $i<10; $i++)
  {
    $kolorslupka = imagecolorallocate ($rysunek, 25*$i, 25*$j,0);
    imagefilledrectangle ($rysunek, 500-$liczby[$i]*50 - 10, $i*50+3, 10, $i*50+20, $kolorslupka);
    imagestring ($rysunek, 10, 0, $i*50, $i, $kolorczarny);
    imagestring ($rysunek, 10, 500-$liczby[$i]*50 - 10, $i*50, abs($liczby[$i] - 10), $kolorczarny);
    $j--;
  }
  imagejpeg($rysunek);
?>