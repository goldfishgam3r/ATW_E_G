<?php
header ('Content-type: text/html; charset=utf-8'); 
require("config.php");

$queryevento= "SELECT * FROM evento WHERE ide=1";
$resultevento= mysqli_query($conn, $queryevento);
$rowevento= mysqli_fetch_array($resultevento);

/*foreach($rowevento as $evento){
    echo $evento."|";
}*/

$utilizador = $rowEvento ['idu'];//criador do artigo
	
	$queryOrg = "SELECT * FROM utilizador WHERE idu = '$utilizador'";
	$resultOrg = mysqli_query ($conn, $queryOrg);
	$rowOrg = mysqli_fetch_array ($resultOrg);
//print_r($rowevento["ide"]);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
</head>
<body>
<table id="evento">
