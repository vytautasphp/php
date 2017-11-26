

<?php
$datetime1 = new DateTime('2001-10-11');
$datetime2 = date_create();
$interval = $datetime1->diff($datetime2);
echo $interval->format('%Y');
?>

