<?php
echo phpinfo();
$a = ['Jonas','Petras','Antanas','Povilas'];

for($i = 1; $i < count($a); $i++){ //-1
    foreach ($a as $value){
        if($a[$i]!=$value) {
            echo $a[$i].' '.$value.'<br>';
        }
    }
}
?>
