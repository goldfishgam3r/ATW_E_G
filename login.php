<?php
include("bd_connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $myuser = mysqli_real_escape_string($conn, $_POST['user']);
    $mypass = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT idu FROM utilizador WHERE username = '$myuser' and senha= '$mypass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['ativo'];

    $count = mysqli_num_rows($result);

    if ($row['Tipo_user'] == "Admin"){
        $_SESSION['login_user']= $myuser;
        header("location: administrador.php");
    }
    else {
        header("location: utilizador.php");
    }
    
}
?>
<html>
<body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Bem-Vindo</h4>
            <input type="text" id="user" class="form-control input-sm chat-input" placeholder="username" />
            <br>
            <input type="text" id="pass" class="form-control input-sm chat-input" placeholder="password" />
            <br>
            <div class="wrapper">
            <span class="group-btn">     
                <a href="login.php" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
            </span>
            </div>
            </div>
        
        </div>
    </div>
</div>
</body>
</html>