<!DOCTYPE html>
<html>
    <head>
        <title>09-00 uzduotis</title>
    </head>
    <body>

<?php

class Mokinys
{
public $vardas;
public $pavarde;
public $pazymiai;

    function __construct($a, $b, $pazymiai) {
        $this->vardas = $a;
        $this->pavarde = $b;
        $this->pazymiai = $pazymiai;
    }


    function vidurkis(){
        $trimestras = [];
        foreach ($this->pazymiai as $balas){
            foreach ($balas as $skaicius) {
                $sum += $skaicius;
            }
            $balai = $sum / count($balas);
            $suma += $balai;
            $sum = 0;
        }
        $trimestras = $suma / count($this->pazymiai);
        return $trimestras;
    }
    function vardas() {
        return $this->vardas;
    }
    function pavarde() {
        return $this->pavarde;
    }

    static function lyginimas($a, $b)
    {
        $al = strtolower($a->vidurkis());
        $bl = strtolower($b->vidurkis());
        if ($al == $bl) {
            return 0;
        }
        return ($al > $bl) ? -1 : +1;
    }
}

$mokiniai = [
    new Mokinys('Jonas', 'Jonaitis',['anglu'=>[10,7,6], 'matematika'=>[8,3,7],'lietuviu'=>[4,5,6], 'fizika'=>[9,7,8]]), 
    new Mokinys('Adomas', 'Adomaitis',['anglu'=>[6,7,6], 'matematika'=>[7,7,8],'lietuviu'=>[5,4,5], 'fizika'=>[7,5,8]]),
    new Mokinys('Ona', 'Onaityte',['anglu'=>[10,10,9], 'matematika'=>[10,10,10],'lietuviu'=>[10,8,10], 'fizika'=>[10,10,10]])
];

 usort($mokiniai, ["Mokinys", "lyginimas"]);
 
?>
 <table border="1">
 <tr>
     <th>Vardas</th>
     <th>pavarde</th>
     <th>Pazymiai</th>
     <th>Vidurkis</th>
 </tr>
 <?php foreach ($mokiniai as $item): ?>
 <tr>
     <td><?php echo $item->vardas; ?></td>
     <td><?php echo $item->pavarde; ?></td>
     <td>
         <?php foreach ($item->pazymiai as $dalykas => $pazymiai): ?>
             <div>
                 <?php echo $dalykas . ': ' . implode(', ', $pazymiai); ?>
             </div>
         <?php endforeach; ?>
     </td>
     <td><?php echo round($item->vidurkis()); ?></td>
 </tr>
 <?php endforeach; ?>
</table>

</body>
</html>

