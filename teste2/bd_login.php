<?php

include("config.php");
session_start();

if(isset($_POST['login'])){ 
	  
  $myusername = mysqli_real_escape_string($conn,$_POST['usernameLogin']);
  $passwordEncriptada = password_hash($_POST["passwordLogin"], PASSWORD_BCRYPT);
  
  
  $sqlLogin = "SELECT idu,ativo,username,Tipo_user, senha FROM utilizador WHERE username = '$myusername'";
  $resultLogin = mysqli_query($conn,$sqlLogin);
  $rowLogin = mysqli_fetch_array($resultLogin,MYSQLI_ASSOC);
  $estadoLogin=$rowLogin["ativo"];
  $tipoLogin=$rowLogin["Tipo_user"];
  $idLogin=$rowLogin["idu"];
  
  $testePass = password_verify ( $_POST["passwordLogin"], $rowLogin['senha'] );//verifica a password retorna 1 -true, 0 - false
  
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
		  echo "<script type='text/javascript'>alert('A sua conta esta inativa!')</script>";
		  
		  }
  }else {
	require("failLogin.php");
	echo "<script type='text/javascript'>alert('O seu username ou paswword é invalida!')</script>";
		  
  }
}
	mysqli_close($conn);
?>