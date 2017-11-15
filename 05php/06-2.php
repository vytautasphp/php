<?php

function dal($a){
    for ($i = 1; $i <= $a; $i++){
        if ($a%$i==0) {
            $x=($x+$i);   
        }   
    }
    $x=$x-$a;
    return $x;
}

function tob($sk){
    for ($a = 0; $a <= $sk; $a++) {
        if (dal($a)==$a){
            echo dal($a).'<br>';
        }
    }
}
echo tob(1000);
?>