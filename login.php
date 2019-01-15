<?php
include("bd_connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $myuser = mysqli_real_escape_string($conn, $_POST['user']);
    $mypass = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT idu FROM utilizador WHERE username = '$myuser' and senha= '$mypass'";
}
?>