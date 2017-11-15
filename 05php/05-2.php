<?php
$a=[10, 2, 5, 5];
$b=[10, 10, 6, 5]; 
$c=[10, 8, 5, 5];
$d=0;
$S=0;
$p=5;
$p=($a[d]+$b[d]+$c[d])*2;
for ($i = 0; $i < count($a); $i++){
   
    $e=$d;
    echo ' |'.$e=$e+1; 
if($a[$d]+$b[$d]>$c[$d]&&$a[$d]+$c[$d]>$b[$d]&&$b[$d]+$c[$d]>$a[$d]){   
   echo ' trikampis susidaro';
   
        if ($c[$d]==$a[$d] && $c[$d]==$b[$d] && $b[$d]==$a[$d]){
            
            echo ' lygiakrastis, Plotas = '.$p;
            }
            else if (c==$a[$d] && $c[$d]!=$b[$d] && $c[$d]!=$a[$d]|| $b[$d]==$a[$d] && $b[$d]!=$c[$d] && $a[$d]!=$c[$d]|| $c[$d]==$b[$d] && $c[$d]!=$a[$d] && $b[$d]!=$a[$d]){
                echo ' lygiasonis, Plotas = '.$p;
            }
            else if (pow($a[$d], 2)+pow($b[$d], 2)==pow($c[$d], 2)){
                echo ' statusis, Plotas = '.$p;
            }
            else {
                echo ' ivairiakrastis, Plotas = '.$p;
            }
        }
else {
    echo ' trikampis nesusidaro'; 
}

$d++;
}
?>