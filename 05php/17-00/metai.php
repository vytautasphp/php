<?php
if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                
                <th>Data</th>
               
                <th>Max Greitis (km/h)</th>
                <th>Min greitis (km/h)</th>
                <th>Vid greitis (km/h)</th>
                <th>kiekis</th>
            </tr>
        
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    
                    <td><?= $row['date']; ?></td>
                    
                    <td><?= round($row['speed'], 1); ?></td>
                    <td><?= round($row['minspeed'], 1); ?></td>
                    <td><?= round($row['avgspeed'], 1); ?></td>
                    <td><?= $row['kiekis'] ?></td>
                    
                    
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
?>