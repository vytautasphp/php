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
     
     function pilnasVardas() {
         return $this->vardas . ' ' . $this->pavarde;
     }
     }
     $zmones = [
     $zmogus1 = new Zmogus('Adomas', 'Adomaitis'),
     $zmogus2 = new Zmogus('Jonas', 'Jonaitis'),
     $zmogus3 = new Zmogus('Petras', 'Petraitis')];
     
     $zmogus2->pilnasVardas();
    ?>
    <h1>Zmones <?php echo count($zmones);?></h1>

    <table>
    <tr>
    <th>Vardas</th><th>Pavarde</th>
    </tr>
    <?php foreach ($zmones as $zmogus): ?>
    <tr>
        <td><?php echo $zmogus1->vardas(); ?></td>
        <td><?php echo $zmogus1->pavarde(); ?></td>
    </tr
<?php endforeach; ?>
 
    
  </body>
</html>
