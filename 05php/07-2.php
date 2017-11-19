<?php
$a = ['Jonas','Petras','Antanas','Povilas'];
$i=0;

for($i = 0; $i < count($a); $i++){
    foreach ($a as $key => $value){
        if($a[$i]!=$a[$key]) {
            echo $a[$i].' '.$value.'<br>';   
        }
    }
}

?>