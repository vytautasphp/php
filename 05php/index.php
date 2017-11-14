<?php
$a=[3, 2, 5, 5];
$b=[4, 10, 6, 5]; 
$c=[5, 8, 5, 5];
$d=0;

for ($i = 0; $i < count($a); $i++){
    $e=$d;
    echo ' |'.$e=$e+1; 
if($a[$d]+$b[$d]>$c[$d]&&$a[$d]+$c[$d]>$b[$d]&&$b[$d]+$c[$d]>$a[$d]){   
   echo ' trikampis susidaro';
        if ($c[$d]==$a[$d] && $c[$d]==$b[$d] && $b[$d]==$a[$d]){
            echo ' lygiakrastis ';
            }
            else if (c==$a[$d] && $c[$d]!=$b[$d] && $c[$d]!=$a[$d]|| $b[$d]==$a[$d] && $b[$d]!=$c[$d] && $a[$d]!=$c[$d]|| $c[$d]==$b[$d] && $c[$d]!=$a[$d] && $b[$d]!=$a[$d]){
                echo ' lygiasonis ';
            }
            else if (pow($a[$d], 2)+pow($b[$d], 2)==pow($c[$d], 2)){
                echo ' statusis ';
            }
            else {
                echo ' ivairiakrastis ';
            }
        }
else {
    echo ' trikampis nesusidaro'; 
}

$d++;
}
?>