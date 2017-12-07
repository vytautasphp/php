
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
<html>
<body>
    <form action="demo.php" method="get">
        <input type="submit" name="on" value="pirmyn">
        <input type="submit" name="off" value="atgal">
    </form>
</body>
</html>
<?php
if(isset($_GET['on'])) {
    echo $ofsetas;
    $ofsetas = $ofsetas +5;
    $_SESSION = $ofsetas;
}
if(isset($_GET['off'])) {
    echo $ofsetas;
    $ofsetas = $ofsetas -5;
    $_SESSION = $ofsetas;
}




//$ofsetas = 10;

if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
} else {
    $offset = $_SESSION;
}

$sql = 'SELECT `number`, `distance`/`time` as `speed`, `date` FROM radars ORDER BY `number`, `date` DESC LIMIT 5 OFFSET '.$offset;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <table>
        <tr>
            <th>Numeris</th>
            <th>Data</th>
            <th>Greitis</th>
        </tr>
    
    <?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['speed']; ?></td>
        </tr>
        <?php
    }
    echo '</table>';
} else {
    echo 'nėra duomenų';
}
echo $_SESSION;
$conn->close();

?>
</body>
</html>