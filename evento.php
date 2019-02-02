<?php
header ('Content-type: text/html; charset=utf-8'); 
require("config.php");

$queryevento= "SELECT * FROM evento WHERE ide=1";
$resultevento= mysqli_query($conn, $queryevento);
$rowevento= mysqli_fetch_array($resultevento);

foreach($rowevento as $evento){
    echo $evento."|";
}
//print_r($rowevento["ide"]);
?>
<html>
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
<script>
