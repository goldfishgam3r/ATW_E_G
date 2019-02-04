<?php
	//Session.php o estado da session, caso não exista retorna para a pagina principal.
   include('config.php');
   session_start();
   $user = $_SESSION['username'];
   $tipoUser = $_SESSION['tipo'];
   $idUser = $_SESSION['id'];
   
   /*
   
   $ses_sql = mysqli_query($conn,"select username from user where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];*/
   
   if(!isset($_SESSION['username'])){
      header("location: index.php");
   }
?>