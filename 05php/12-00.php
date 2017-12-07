<?php
session_start();
$value1= $_POST['data'];
$value2=$_POST['numeris'];
$value3=$_POST['atstumas'];
$value4=$_POST['laikas'];

$value = [$value1, $value2, $value3, $value4];
// pasirasyti klase
//isset request 
// sessiom [radars] = radars;


$_SESSION["newsession"]=$value; //$_SESSION["value"]=$value;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>Prisijungti</h1>
        <?php if (isset($_POST['user'])): ?>
            <div>Neteisingas prisijungimo vardas ar slaptažodis</div> 
        <?php endif; ?>
        <form action="test.php" method="post"><br> <?php//jei nenurodom adreso i ta pati eina?>
             data ir laikas
             <br><input name="data" type="text"><br>
            numeris
            <br><input name="numeris" type="text"><br>
            atstumas metrais
            <br><input name="atstumas" type="text"><br>
            sugaistas laikas
            <br><input name="laikas" type="text"><br>
            <input type="submit" value="Login"><br>
        </form>
        <table border="1">
 <tr>
     <th>data ir laikas</th>
     <th>numeris</th>
     <th>atstumas metrais</th>
     <th>sugaistas laikas</th>
    
 </tr>
 <br>
 <tr>
     <td><?php echo $_SESSION["newsession"][0]; ?></td>
     <td><?php echo $_SESSION["newsession"][1]; ?></td>
     <td><?php echo $_SESSION["newsession"][2]; ?></td>
     <td><?php echo $_SESSION["newsession"][3]; ?></td>
    
</table>
    </body>
</html>
