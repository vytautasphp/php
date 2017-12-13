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

$values = [];
echo var_dump($values);
?>

<?php 
 
    if (isset($_GET['edit'])) {
        $sql = 'SELECT *, radars.driverid FROM radars, drivers 
                WHERE `id` = ' . intval($_GET['edit']);
        //$conn->real_escape_string($_GET["edit"]);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $values = $result->fetch_assoc();
        }
        $radarid = intval($_GET['edit']);


    }
    if (isset($_GET['vairuotojas'])) {
        $sql = 'SELECT * FROM radars WHERE `id` = ' . intval($_GET['vairuotojas']);
        //$conn->real_escape_string($_GET["edit"]);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $values1 = $result->fetch_assoc();
        }
    }
    if (isset($_GET['delete'])) {
        $sql = "DELETE FROM radars WHERE id = ". intval($_GET['delete']);
        $conn->query($sql);
    }
    echo var_dump($values);
    if ($_POST['id'] > 0) {
        $sql = "UPDATE radars SET `number` = ?, `date` = ?, `distance` = ?, `time` = ?, driverid = ? WHERE id = ?"; 
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("ssddii", $_POST['number'], $_POST['date'], 
        $_POST['distance'], $_POST['time'], $_POST['driverid'], $_POST['id']);
        $stmt->execute();


        $sql = "UPDATE drivers,radars SET `name` = ?, `city` = ? WHERE radars.id = ?"; 
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("ssi", $_POST['name'], $_POST['city']);
        $stmt->execute();

        header("Location: " . $_SERVER['PHP_SELF']); /* Redirect browser */
        exit();

    } else if ($_POST['id'] === '') {
        $insert = "INSERT INTO radars(`date`, `number`, `distance`, `time`, driverid) VALUES(?, ?, ?, ?, ?)"; 
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ssddd", $_POST['date'], $_POST['number'], $_POST['distance'], $_POST['time'], $_POST['driverid']);
        $stmt->execute();


        header("Location: " . $_SERVER['PHP_SELF']); /* Redirect browser */
        exit();
    }
  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Demo 1</title>
        <meta charset="UTF-8">
    </head>
<body>

<form action="" method="post"><br>
    <br>data ir laikas: 
    <br><input name="date" type="text" value="<?= $values['date'] ?>">
    <br>numeris
    <br><input name="number" type="text" value="<?= $values['number'] ?>">
    <br>atstumas metrais
    <br><input name="distance" type="text" value="<?= $values['distance'] ?>">
    <br>sugaistas laikas
    <br><input name="time" type="text" value="<?= $values['time'] ?>">
    <br>Vardas
    <br><input name="name" type="text" value="<?= $values['name'] ?>">
    <br>Miestas
    
    <br><input name="city" type="text" value="<?= $values['city'] ?>">  
    <input name="id" type="hidden" value="<?= $values['id'] ?>">
    <input name="driverid" type="number" value="<?= $values['driverid'] ?>">

    <br><button>Saugoti</button>
</form>
    <form  method="get">
        <button name="automobiliai"value="">Automobiliai</button>
        <button name="metai">Metai</button>
        <button name="menuo">Menuo</button>
        <button name="home">Home</button>
    </form>

   
<?php
    if (isset($_GET['automobiliai'])) {
        $sql = 'SELECT number, COUNT(*) AS kiekis, MAX(distance/time*3.6) AS speed
        FROM radars GROUP BY number';
        $result = $conn->query($sql);
        require_once 'automobiliai.php';
    }
    else if (isset($_GET['metai'])) {
        $sql = 'SELECT YEAR(date) as date, COUNT(*) AS kiekis, MAX(distance/time*3.6) AS speed, MIN(distance/time*3.6) as minspeed, AVG(distance/time*3.6) as avgspeed
        FROM radars GROUP BY YEAR(date) ';
        $result = $conn->query($sql);
        require_once 'metai.php';
        
    }
    else if (isset($_GET['menuo'])) {
        $sql = 'SELECT SUBSTRING(date,1,7) as date, COUNT(*) AS kiekis, MAX(distance/time*3.6) AS speed, MIN(distance/time*3.6) as minspeed, AVG(distance/time*3.6) as avgspeed
        FROM radars GROUP BY Month(date) ';
        $result = $conn->query($sql);
        require_once 'menuo.php';
        
    }
    else {
        // if (isset($_GET['pirmyn'])){$offset = $offset + $_GET['pirmyn'];}
        // else if (isset($_GET['atgal'])){$offset = $offset + $_GET['atgal'];}
        
        $offset = 0;
        
    // išvedame
    $sql = 'SELECT *, distance/time*3.6 as speed, v.name as name, v.city as city, a.driverid as driverid
            FROM radars a
            LEFT JOIN drivers v ON v.driverId is NULL OR a.driverId = v.driverId
           
            ORDER BY id';

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
                <th>Max Greitis (km/h)</th>
                <th>Vardas</th>
                <th>Miestas</th>
                <th>driverId</th>
                
            </tr>
        
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['number']; ?></td>
                    <td><?= $row['date']; ?></td>
                    <td><?= $row['distance']; ?></td>
                    <td><?= $row['time']; ?></td>
                    <td><?= round($row['speed'], 1); ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['city']; ?></td>
                    <td><?= $row['driverid']; ?></td>
                    
                    <form action="" method="get">
                        <td><button type="submit" name="edit" value="<?= $row['id'];?>">Taisyti</button></td>
                        <td><button type="submit" name="delete" value="<?= $row['id'] ?>">Trinti</button></td>
                        <td><button type="submit" name="vairuotojas" value="<?= $row['id'] ?>">Priskirti vairuotoja</button></td>
                    </form>
                </tr>
            <?php endwhile; ?>
            <form action="" method="get">
                        <td><button type="submit" name="pirmyn"value="5" >pirmyn</button></td>
                        <td><button type="submit" name="atgal"value="-5" >atgal</button></td>
                    </form>
       
    

        <?php
    } else {
        echo 'nėra duomenų';
    }

        $sql = 'SELECT *, name, city, driverid
        FROM drivers
        ORDER BY driverid';

    $result2 = $conn->query($sql);
    
    if ($result2->num_rows > 0) {
        ?>
        <table>
            <tr>             
                <th>Vardas</th>
                <th>Miestas</th>
                <th>DriverID</th>
            </tr>
        
            <?php while($row = $result2->fetch_assoc()): ?>
                <tr>
                  
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['city']; ?></td>
                    <td><?= $row['driverid']; ?></td>
                   
                </tr>
            <?php endwhile; ?>
            <form action="" method="get">
                        <td><button type="submit" name="pirmyn"value="5" >pirmyn</button></td>
                        <td><button type="submit" name="atgal"value="-5" >atgal</button></td>
                    </form>
        </table>
    </body>
</head
        <?php
    } else {
        echo 'nėra duomenų';
    }


    $conn->close();
}?>





