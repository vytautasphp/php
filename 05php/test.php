
<?php
session_start();
class Radar
{
private $date;  //data ir laikas
private $number; //automobilio numeris
private $distance; //nuvaziuotas atstumas metrais
private $time; //sugaistas laikas sekundemis

    function __construct($data, $number, $distance, $time) {
        $this->date = $data;
        $this->number = $number;
        $this->distance = $distance;
        $this->time = $time;
    }
    public function data(){
        return $this->date;
    }
    public function numeris(){
        return $this->number;
    }
    public function distancija(){
        return $this->distance;
    }
    public function laikas(){
        return $this->time;
    }
   public function greitis(){
       if ($this->distance > 0){
        $speed = ($this->distance / $this->time) * 3.6;   
        return round($speed,1);
       }
       else {
        return '';
       }
    }
    static function lyginimas($a, $b)
    {
        $al = $a->greitis();
        $bl = $b->greitis();
        if ($al == $bl) {
            return 0;
        }
        return ($al > $bl) ? -1 : +1;

    }

}

// $radaras = [
//     new Radar('2017-01-11 14:25:15', 'ASE938', 5000, 100),
//     new Radar('2016-10-13 14:25:15', 'BSS123', 2000, 300),
//     new Radar('2017-10-11 14:25:15', 'CDS523', 1000, 58),
//     new Radar('2017-11-11 14:25:15', 'AHE538', 1000, 100)
// ];

$radaras =  isset ($_SESSION['radar']) ? $_SESSION['radar']:[
    new Radar('2017-01-11 14:25:15', 'ASE938', 5000, 100),
    new Radar('2016-10-13 14:25:15', 'BSS123', 2000, 300),
    new Radar('2017-10-11 14:25:15', 'CDS523', 1000, 58),
    new Radar('2017-11-11 14:25:15', 'AHE538', 1000, 100)
];
usort($radaras, ["Radar", "lyginimas"]);

foreach ($radaras as $auto){
    $auto->greitis();
 
    //echo ' Data: ' . $auto->data(). ' Numeris: ' . $auto->numeris() . ' Laikas: ' . $auto->laikas(). ' Distancija: ' . $auto->distancija().' Greitis(km/h): ' .$auto->greitis() . ' ' .'<br>';
}
?>

<h1>Prisijungti</h1>
        
        <form action="test.php" method="get"><br> <?php//jei nenurodom adreso i ta pati eina?>
             data ir laikas
             <br><input name="data" type="text"><br>
            numeris
            <br><input name="numeris" type="text"><br>
            atstumas metrais
            <br><input name="atstumas" type="number"><br>
            sugaistas laikas
            <br><input name="laikas" type="number"><br>
            <input type="submit" value="Login"><br>
        </form>
<?php



if (isset($_REQUEST['data'])){
    $radaras[] =  new Radar($_REQUEST["data"], $_REQUEST["numeris"], $_REQUEST["atstumas"], $_REQUEST["laikas"]);

//$radaras[] = $_SESSION['radar'];   
$_SESSION['radar'] = $radaras;
}



//echo var_dump($radaras);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>10-00 uzduotis</title>
    </head>
    <body>

<table border="1">
<tr>
    <th>Data</th>
    <th>numeris</th>
    <th>Distancija</th>
    <th>Laikas</th>
    <th>greitis</th>
</tr>
<?php foreach ($_SESSION['radar'] as $item): ?>

<tr>
    <td><?php echo $item->data(); ?></td>
    <td><?php echo $item->numeris(); ?></td>
    <td><?php echo $item->distancija(); ?></td>
    <td><?php echo $item->laikas(); ?></td>
    <td><?php echo $item->greitis(); ?></td>
    

<?php endforeach; ?>

</table>

</body>
</html>
