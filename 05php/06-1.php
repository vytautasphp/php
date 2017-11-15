<?php
$a = [5, 6, 10, 15];
$b = [8, 5, 3, 25];

function vid($a)   {
        for ($i = 0; $i < count($a); $i++){
            $vidurkis = ($vidurkis + $a[$i]);
        }
    $vidurkis = $vidurkis/count($a);
    return $vidurkis;
}
$skirtumas = vid($a) - vid($b);
echo 'Rezultatas  '.$skirtumas;

?>



