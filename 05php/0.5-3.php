<?php

echo ' duotas masyvas:  ';
$a=[0, 5, 3, 2];

for ($i = 0; $i < count($a); $i++){
    echo ' '.$a[$i];
}
echo ' masyvas mazejimo tvarka:  ';
rsort($a);

for ($i = 0; $i < count($a); $i++){
    echo ' '.$a[$i];
}
?>