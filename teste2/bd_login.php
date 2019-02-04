<?php

include("config.php");
session_start();

if(isset($_POST['login'])){ 
	  
  $myusername = mysqli_real_escape_string($conn,$_POST['usernameLogin']);
  $passwordEncriptada = password_hash($_POST["passwordLogin"], PASSWORD_BCRYPT);
  
  
  $sqlLogin = "SELECT id_utilizador,estado,username,tipo, password FROM user WHERE username = '$myusername'";
  $resultLogin = mysqli_query($conn,$sqlLogin);
  $rowLogin = mysqli_fetch_array($resultLogin,MYSQLI_ASSOC);
  $estadoLogin=$rowLogin["estado"];
  $tipoLogin=$rowLogin["tipo"];
  $idLogin=$rowLogin["id_utilizador"];
  
  $testePass = password_verify ( $_POST["passwordLogin"], $rowLogin['password'] );//verifica a password retorna 1 -true, 0 - false
  
  $countLogin = mysqli_num_rows($resultLogin); //contar rows da query

  
  
  // Se o $myusername e o $mypassword existirem, devera ter 1 row e o count = 1
  if($countLogin >= 1 && $testePass == 1) {
	  //Se o atributo estado desse utilizador for igual a 1, é encaminhado para a welcome page 
	  if($estadoLogin==1)
	  {
		  if(strcmp($tipo, "admin")==0){
			  $_SESSION['login_user'] = $myusername;
			  $_SESSION['tipo_user'] = $tipoLogin;
			  $_SESSION['id_user'] = $idLogin;
			  header("location: bd_gestao.php");
		  }
			  
		  else{
			$_SESSION['login_user'] = $myusername;
			$_SESSION['tipo_user'] = $tipoLogin;
			$_SESSION['id_user'] = $idLogin;
			header("location: welcome.php");
		  }
	  }
	  else{
		  
		  require("index.php");
		  echo "<script type='text/javascript'>alert('Your account has been disabled!')</script>";
		  
		  }
  }else {
	require("failLogin.php");
	echo "<script type='text/javascript'>alert('Your Login Name or Password is invalid!')</script>";
		  
  }
}
	mysqli_close($conn);
?>