<?php
class Radar
{
public $date;  //data ir laikas
public $number; //automobilio numeris
public $distance; //nuvaziuotas atstumas metrais
public $time; //sugaistas laikas sekundemis

    function __construct($data, $number, $distance, $time) {
        $this->date = $data;
        $this->number = $number;
        $this->distance = $distance;
        $this->time = $time;
    }

    function greitis(){
        $speed = ($this->distance / $this->time) * 3.6;   
        return round($speed,1);
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

$radaras = [
    new Radar('2017-01-11 14:25:15', 'ASE938', 5000, 100),
    new Radar('2016-10-13 14:25:15', 'BSS123', 2000, 300),
    new Radar('2017-10-11 14:25:15', 'CDS523', 1000, 58),
    new Radar('2017-11-11 14:25:15', 'AHE538', 1000, 100)
];

usort($radaras, ["Radar", "lyginimas"]);

foreach ($radaras as $auto){
    $auto->greitis();
    echo ' Data: ' . $auto->date. ' Numeris: ' . $auto->number . ' Laikas: ' . $auto->time. ' Greitis(km/h): ' .$auto->greitis() . ' ' .'<br>';
}
?>