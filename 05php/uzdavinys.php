<?php

function skal(){
 $a = [5, 6, 10, 15];
 $b = [8, 5, 3, 25];
for ($i=0;$i < count($a); $i++) {
    $c= $a[$i] * $b[$i];
    $d= $d+$c;
}
return $d;
}
echo skal();
phpinfo();
?>