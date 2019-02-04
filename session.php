<?php
session_start();
include('config.php');                       
    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["username"] = $username;
    $_SESSION["tipo"] = $tipo;                           
                            
    // Redirect user to welcome page
    if (!isset($_SESSION['loggedin'])){
        header("location: index.php");
    }
    header("location: welcome.php");
?>