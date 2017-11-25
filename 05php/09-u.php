
<!DOCTYPE html>
<html>
  <head>
    <title>Pavadinimas</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<?php

class Zmogus
{
public $vardas;
public $pavarde;

function __construct($vardas, $pavarde) {
    $this->vardas = $vardas;
    $this->pavarde = $pavarde;
}

function vardas() {
    return $this->vardas;
}
function pavarde() {
    return $this->pavarde;
}
}
$zmones = [
$zmogus = new Zmogus('Adomas', 'Adomaitis'),
$zmogus = new Zmogus('Jonas', 'Jonaitis'),
$zmogus = new Zmogus('Petras', 'Petraitis')];


?>
<table>
    <tr>
        <th>Vardas</th><th>Pavarde</th>
    </tr>
    <?php foreach ($zmones as $zmogus): ?>
        <tr>
            <td><?php echo $zmogus->vardas(); ?></td>
            <td><?php echo $zmogus->pavarde(); ?></td>
        </tr
        <?php endforeach; ?>



</body>
</html>

class Zmogus
{
public $vardas;
public $pavarde;

function __construct($vardas, $pavarde) {
    $this->vardas = $a;
    $this->pavarde = $b;
}

function vardas() {
    return $this->vardas;
}
function pavarde() {
    return $this->pavarde;
}
}
$zmones1 = [

$zmogus = new Zmogus('Jonas', 'Jonaitis'),
$zmogus = new Zmogus('Adomas', 'Adomaitis')];

$zmones1[] = new Zmogus('Petras', 'petraitis');


