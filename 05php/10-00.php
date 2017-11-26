<!DOCTYPE html>
<html>
    <head>
        <title>10-00 uzduotis</title>
    </head>
    <body>

<?php

class Mokinys
{
public $gimimo;
public $vardas;
public $pavarde;
public $pazymiai;

    function __construct($gimimo, $a, $b, $pazymiai) {
        $this->data = $gimimo;
        $this->vardas = $a;
        $this->pavarde = $b;
        $this->pazymiai = $pazymiai;
    }

    function gimimo(){
        $datetime1 = new DateTime($this->data);
        $datetime2 = date_create();
        $interval = $datetime1->diff($datetime2);
        //echo $interval->format('%Y');
        return $interval->format('%Y');
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
    new Mokinys('1998-01-02','Jonas', 'Jonaitis',['anglu'=>[10,7,6], 'matematika'=>[8,3,7],'lietuviu'=>[4,5,6], 'fizika'=>[9,7,8]]), 
    new Mokinys('2000-10-08','Adomas', 'Adomaitis',['anglu'=>[6,7,6], 'matematika'=>[7,7,8],'lietuviu'=>[5,4,5], 'fizika'=>[7,5,8]]),
    new Mokinys('1997-11-02','Ona', 'Onaityte',['anglu'=>[10,10,9], 'matematika'=>[10,10,10],'lietuviu'=>[10,8,10], 'fizika'=>[10,10,10]])
];

 usort($mokiniai, ["Mokinys", "lyginimas"]);
 
?>
 <table border="1">
 <tr>
     <th>Vardas</th>
     <th>pavarde</th>
     <th>metai</th>
     <th>Pazymiai</th>
     <th>Vidurkis</th>
 </tr>
 <?php foreach ($mokiniai as $item): ?>
    <?php if($item->gimimo() >= 18): ?>
 <tr>
     <td><?php echo $item->vardas; ?></td>
     <td><?php echo $item->pavarde; ?></td>
     <td><?php echo $item->gimimo(); ?></td>
     <td>
         <?php foreach ($item->pazymiai as $dalykas => $pazymiai): ?>
             <div>
                 <?php echo $dalykas . ': ' . implode(', ', $pazymiai); ?>
             </div>
         <?php endforeach; ?>
     </td>
     <td><?php echo round($item->vidurkis()); ?></td>
 </tr>
    <?php endif; ?>
 <?php endforeach; ?>

</table>

</body>
</html>

