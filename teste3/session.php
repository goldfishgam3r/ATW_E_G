<?php
	//Session.php o estado da session, caso não exista retorna para a pagina principal.
   include('config.php');
   session_start();
   $user = $_SESSION['login_user'];
   $tipoUser = $_SESSION['tipo_user'];
   $idUser = $_SESSION['id_user'];
   
   /*
   
   $ses_sql = mysqli_query($conn,"select username from user where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];*/
   
   if(!isset($_SESSION['login_user'])){
      header("location: index.php");
   }
?>