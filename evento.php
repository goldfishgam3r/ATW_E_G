<?php
require ("config.php");

$queryevento= "SELECT * FROM evento";
$resultevento= mysqli_query($conn, $queryevento);
$rowevento= mysqli_fetch_array($resultevento);
print($resultevento);
exit;
?>
