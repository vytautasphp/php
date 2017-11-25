
<!DOCTYPE html>
<html>
<head>
    <title>pratimas 9.2</title>
</head>
<body>
<h1>Kuku</h1>
<?php

class Mokinys {
    public $vardas;
    public $pazymiai;

    function __construct($v, $p) {
        $this->vardas = $v;
        $this->pazymiai = $p;
    }

    function trimestras() {
        $trimestras = [];
        foreach ($this->pazymiai as $dalykas => $pazymiai) {
            $vidurkis = $this->vidurkis($pazymiai);
            $trimestras[$dalykas] = $vidurkis;
        }
        return $trimestras;
    }

    function vidurkis($pazymiai) {
        $sum = 0;
        foreach ($pazymiai as $pazymys) {
            $sum += $pazymys;
        }
        return $sum / count($pazymiai);
    }

    function trimestroVidurkis() {
        $trimestras = $this->trimestras($m);
        return $this->vidurkis($trimestras);
    }
} 

$mokiniai = [
    new Mokinys('Jonas', ['lietuviu' => [4, 8, 6, 7], 'anglu' =>[6, 7, 8], 'matematika' => [3, 5, 4]]), 
    new Mokinys('Ona', ['anglu' => [9, 8, 10], 'lietuviu' => [10, 9, 10], 'matematika' => [10, 10, 9, 9]]),
    new Mokinys('Petras', ['anglu' => [5, 8, 7], 'lietuviu' => [6, 9, 8], 'matematika' => [10, 10, 9, 9]])
];


//ksort($mokiniai, 'vidurkis');
for ($i = 0; $i < count($mokiniai) - 1; $i++) {
    
    $x = $mokiniai[$i];
    $index = $i;

    for ($j = $i + 1; $j < count($mokiniai); $j++) {
        if ($x->trimestroVidurkis() > $mokiniai[$j]->trimestroVidurkis()) {
            $x = $mokiniai[$j];
            $index = $j;
        }
    }
    $y = $mokiniai[$i];
    $mokiniai[$i] = $mokiniai[$index];
    $mokiniai[$index] = $y;
}


?>

<table border="1">
    <tr>
        <th>Vardas</th>
        <th>Pazymiai</th>
        <th>Vidurkis</th>
    </tr>
    <?php foreach ($mokiniai as $mokinys): ?>
    <tr>
        <td><?php echo $mokinys->vardas; ?></td>
        <td>
            <?php foreach ($mokinys->pazymiai as $dalykas => $pazymiai): ?>
                <div>
                    <?php echo $dalykas . ': ' . implode(', ', $pazymiai); ?>
                </div>
            <?php endforeach; ?>
        </td>
        <td><?php echo $mokinys->trimestroVidurkis() ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>




