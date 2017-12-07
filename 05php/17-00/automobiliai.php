
<?php
if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                
                <th>Numeris</th>
               
                
                <th>Max Greitis (km/h)</th>
                
                <th>kiekis</th>
            </tr>
        
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                   
                    <td><?= $row['number']; ?></td>
                   
                    
                    <td><?= round($row['speed'], 1); ?></td>
                    
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