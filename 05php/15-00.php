

<!DOCTYPE html>
<html>
    <head>
        <title>Demo 1</title>
        <meta charset="UTF-8">
    </head>
<body>
<?php 

$servername = 'localhost';
$dbname = 'Auto';
$username = 'Auto';
$password = 'LabaiSlaptas123';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Nepavyko prisjungti: ' . $conn->connect_error);
}


?>
<h2>Prisijungti</h2>
<?php if (isset($_get['data'])): ?>
    <div>Neteisingas prisijungimo vardas ar slaptažodis</div> 
<?php endif; ?>
<form action="" method="get"><br> <?php//jei nenurodom adreso i ta pati eina?>
     data ir laikas
     <br><input name="data" type="text" value=""></br>
    numeris
    <br><input name="numeris" type="text"></br>
    atstumas metrais
    <br><input name="atstumas" type="text"></br>
    sugaistas laikas
    <br><input name="laikas" type="text"></br>
    ID
    <br><input name="id" type="number" value=""></br>
    <br><input type="submit" value="Vykdyti"></br>
</form>
<table border="1">



<?php //Duomenu iterpimas
    if ($_REQUEST["data"] >'' && $_REQUEST["id"]==''){
        $data = $_REQUEST["data"];
        $numeris = $_REQUEST["numeris"];
        $kelias = $_REQUEST["atstumas"];
        $laikas = $_REQUEST["laikas"];

        $insert = "INSERT INTO radars(`date`, `number`, `distance`, `time`) VALUES(?, ?, ?, ?)"; 
        $stmt = $conn->prepare($insert);

        $stmt->bind_param("ssdd", $data, $numeris, $kelias, $laikas);

        $stmt->execute();

        if(isset($_GET['data'])){unset($_GET['data']);}
        
    }
    
        //Duomenu modifikavimas
    if ($_REQUEST["atstumas"] && $_REQUEST["laikas"] && $_REQUEST["data"] >''){
        $id = $_REQUEST["id"];
        $data = $_REQUEST["data"];
        $kelias = $_REQUEST["atstumas"];
        $laikas = $_REQUEST["laikas"];
        
        $sql = "UPDATE radars SET `date` = ?, `distance` = ?, `time` = ? WHERE id = ?"; 
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("sddi",  $data, $kelias, $laikas, $id);
        
        $stmt->execute();
    }

?>

<?php
lentele($conn);
function lentele($conn) {
    // išvedame
    $sql = 'SELECT *, `distance`/`time`*3.6 as `speed` FROM radars ORDER BY `id`, `date` DESC';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Numeris</th>
                <th>Data</th>
                <th>Atstumas (m)</th>
                <th>Laikas (s)</th>
                <th>Greitis (km/h)</th>
            </tr>
        
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['number']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['distance']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo round($row['speed'], 1); ?></td>
                    <td><a href = "15-00.php">taisyti <?php echo $row['id']; ?></a></td>
                </tr>
            <?php endwhile; ?>
        
        </table>

        <?php

    } else {
        echo 'nėra duomenų';
    }
    $conn->close();
}
