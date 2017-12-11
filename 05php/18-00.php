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


    // išvedame
    $sql = 'SELECT *, `distance`/`time`*3.6 as `speed` FROM radars ORDER BY `number`, `date` DESC';
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
?>

