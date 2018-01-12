<?php

echo ' duotas masyvas:  ';
$a=[0, 5, 3, 2];
$m=count($a);
$x=0;
$y=0;


for ($m;$m>0;$m-1){
    for ($i = 0,$z=1; $i < $m; $i++,$z++){
    if ($a[$i]>$a[$z]){
        $x=$a[$i];
        $a[$i]=$a[$z];
        $a[$z]=$x;
    }
    }
}
echo var_dump($a);nbbnb