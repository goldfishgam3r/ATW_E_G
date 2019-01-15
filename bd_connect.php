<?php
$servername= "localhost";
$user= "root";
$pass= "";

$conn = new mysqli($servername,$user, $pass);

if ($conn -> connect_error){
    die ("Connection failed: " . $conn -> connect_error);
}
echo "Connected successfully";
?>