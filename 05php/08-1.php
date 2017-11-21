<?php
$zmones = [ 
    ['vardas' => 'Jonas', 'lytis' => 'V'], 
    ['vardas' => 'Ona', 'lytis' => 'M'], 
    ['vardas' => 'Petras', 'lytis' => 'V'],
    ['vardas' => 'Marytė', 'lytis' => 'M'],
    ['vardas' => 'Eglė', 'lytis' => 'M']
    ];


foreach ($zmones as $value){
   echo $value['vardas'];
       if ($value['lytis'] == 'M'){
        echo $value['vardas'];
       }
}


?>