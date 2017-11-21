<?php
$suma = [];
$i = 0;
$a = [ [1, 3, 4], 
     [2, 5], 
     [2 => 3, 5=> 8], 
     [1, 1, 5 => 1] ];

foreach ($a as $value){
    foreach ($value as $verte){
        $suma[$i] += $verte;  
    }
        $i++;
}
echo 'sumos: ';

$didziausias = $suma[0];
foreach ($suma as $value){
  if ($didziausias < $value){
    $didziausias = $value;
  }
  $i++;
  echo $value.' ';
}  
echo '<br>';
echo 'Didziausia suma yra: '.$didziausias.'<br>';   
foreach $a as $eilute{
foreach ($eilute as $stulpelis =>$reiksme)
}
?>

foreach ($eilute as $stulpelis =>$reiksme)
