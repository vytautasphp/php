<?php
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
 
    echo ' Data: ' . $auto->data(). ' Numeris: ' . $auto->numeris() . ' Laikas: ' . $auto->laikas(). ' Distancija: ' . $auto->distancija().' Greitis(km/h): ' .$auto->greitis() . ' ' .'<br>';
}
?>