<?php
$servername= "localhost";
$user= "root";
$pass= "";
$database ="atw";

$conn = mysqli_connect($servername,$user, $pass, $database);

if ($conn -> connect_error){
    die ("Connection failed: " . $conn -> connect_error);
}
echo "Connected successfully";

?>