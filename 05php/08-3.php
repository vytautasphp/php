<?php

$mokiniai = [
    ['vardas'=>'Jonas','pazymiai'=>['anglu'=>[10,7,6], 'matematika'=>[8,3,7],'lietuviu'=>[4,5,6], 'fizika'=>[9,7,8]]], 
    ['vardas'=>'Ona','pazymiai'=>['anglu'=>[6,7,6], 'matematika'=>[7,7,8],'lietuviu'=>[5,4,5], 'fizika'=>[7,5,8]]],
    ['vardas'=>'Petras','pazymiai'=>['anglu'=>[10,10,10], 'matematika'=>[10,10,10],'lietuviu'=>[10,8,10], 'fizika'=>[10,10,10]]]];
$geriausias = 0;
$i = 0;
foreach ($mokiniai as $zmones){
    foreach ($zmones['pazymiai'] as $key=>$balai){
            foreach ($balai as $skaiciai){
                $suma +=$skaiciai;
            }
            $vidurkis = $suma / count($balai);
            $suma = 0;  
            $dalykuvid += $vidurkis;  
    }
    $trimestrovid = $dalykuvid / count($zmones['pazymiai']);
    $dalykuvid = 0;
    echo $mokiniai[$i]['vardas']. ' '. round($trimestrovid). '<br> ' ;
   
    if ($geriausias < $trimestrovid){
        $geriausias = $trimestrovid;
        $z = $i;
    }
    $i++;
}
echo 'Geriausias mokinys yra: '.$mokiniai[$z]['vardas'].' '. round($geriausias) ;

?>