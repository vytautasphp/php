<?php

echo ' duotas masyvas:  ';
$a=[-10, 0, 2, 9, -5];

for ($i = 0; $i < count($a); $i++){
    echo ' '.$a[$i];
}
echo ' masyvas mazejimo tvarka:  ';
rsort($a);

for ($i = 0; $i < count($a); $i++){
    echo ' '.$a[$i];
}
?>