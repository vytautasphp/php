<?php
$a = ['Jonas','Petras','Antanas','Povilas'];

for($i = 1; $i < count($a); $i++){
    foreach ($a as $value){
        if($a[$i]!=$value) {
            echo $a[$i].' '.$value.'<br>';
        }
    }
}
?>
