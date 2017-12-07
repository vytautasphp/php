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
?>

<?php 
 if (isset($_GET['automobiliai'])) {
    $sql = 'SELECT number, COUNT(*) AS kiekis, MAX(distance/time*3.6) AS greitis
    FROM radars GROUP BY number';
    //$conn->real_escape_string($_GET["edit"]);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $values = $result->fetch_assoc();
    }
}
    if (isset($_GET['edit'])) {
        $sql = 'SELECT * FROM radars WHERE `id` = ' . intval($_GET['edit']);
        //$conn->real_escape_string($_GET["edit"]);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $values = $result->fetch_assoc();
        }
    }
    if (isset($_GET['delete'])) {
        $sql = "DELETE FROM radars WHERE id = ". intval($_GET['delete']);
        $conn->query($sql);
    }
    
    if ($_POST['id'] > 0) {
        $sql = "UPDATE radars SET `number` = ?, `date` = ?, `distance` = ?, `time` = ? WHERE id = ?"; 
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("ssddi", $_POST['number'], $_POST['date'], 
        $_POST['distance'], $_POST['time'], $_POST['id']);
        $stmt->execute();

        header("Location: " . $_SERVER['PHP_SELF']); /* Redirect browser */
        exit();

    } else if ($_POST['id'] === '') {
        $insert = "INSERT INTO radars(`date`, `number`, `distance`, `time`) VALUES(?, ?, ?, ?)"; 
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ssdd", $_POST['date'], $_POST['number'], $_POST['distance'], $_POST['time']);
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
    <input name="id" type="hidden" value="<?= $values['id'] ?>">

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
                <th>Max Greitis (km/h)</th>
                
            </tr>
        
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['number']; ?></td>
                    <td><?= $row['date']; ?></td>
                    <td><?= $row['distance']; ?></td>
                    <td><?= $row['time']; ?></td>
                    <td><?= round($row['speed'], 1); ?></td>
                    
                    <form action="" method="get">
                        <td><button type="submit" name="edit" value="<?= $row['id'] ?>">Taisyti</button></td>
                        <td><button type="submit" name="delete" value="<?= $row['id'] ?>">Trinti</button></td>
                    </form>
                </tr>
            <?php endwhile; ?>
        
        </table>
    </body>
</head
        <?php
    } else {
        echo 'nėra duomenų';
    }
    $conn->close();
}?>