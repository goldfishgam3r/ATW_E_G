<?php
include("config.php");
if(isset($_POST["enviarUser"])){
	$passwordEncriptada = password_hash($_POST["regPassword"], PASSWORD_BCRYPT);
	$usernameLowercase = strtolower($_POST["regUser"]);
	$query1 ="INSERT INTO user(username,nome,password,city,address,zip,email,telemovel,tipo,estado)VALUES('$usernameLowercase','$_POST[regNome]','$passwordEncriptada','$_POST[regCity]','$_POST[regAddress]','$_POST[regZip]','$_POST[regEmail]','$_POST[regPhone]','user','1')";

	/*verificar email*/
	$sql = "SELECT email FROM user WHERE email = '$_POST[regEmail]'";
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	/*verificar user*/
	$sqlVerUser = "SELECT username FROM user WHERE username = '$_POST[regUser]'";
	$resultVerUser = mysqli_query($conn,$sqlVerUser);
	$countVerUser = mysqli_num_rows($resultVerUser);

	//verifica a existencia do post enviar (se é null ou não)

		if($count>=1){
			$errorEmailUser = 1;
			echo "<script type='text/javascript'>alert('Email already exists!')</script>";							
		}
		elseif($countVerUser>=1){
			$errorUserUsername = 1;
			echo "<script type='text/javascript'>alert('Username already exists!')</script>";				
		}
		else{
			
			if(strlen($_POST['regPassword'])>=5)
			{
				//verificar a conexão
				if(!$conn)
				{
					die(mysqli_connect_error());
				}
				//Aplicar a query dependendo da condição
				elseif(mysqli_query($conn,$query1))
				{
					echo "<script type='text/javascript'>alert('Registration submitted successfully!')</script>";
		
				}
				else
				{
					echo mysql_error($conn,$query1);
									
				}
			}
			else{
				$errorUserPass = 1;
			}	
		}
}
if(isset($_POST["enviarInst"])){
	$passwordEncriptadaInst = password_hash($_POST["regPasswordInst"], PASSWORD_BCRYPT);
	$usernameLowercaseInst = strtolower($_POST["regUserInst"]);
	$queryInsertInst ="INSERT INTO user(username,nome,password,city,address,zip,email,telemovel,tipo,estado,nif,iban,nib)VALUES('$usernameLowercaseInst','$_POST[regNameInst]','$passwordEncriptadaInst','$_POST[regCityInst]','$_POST[regAddressInst]','$_POST[regZipInst]','$_POST[regEmailInst]','$_POST[regPhoneInst]','org','1','$_POST[regNifInst]','$_POST[regIbanInst]','$_POST[regNibInst]')";

	/*verificar email*/
	$sqlInst = "SELECT email FROM user WHERE email = '$_POST[regEmailInst]'";
	$resultInst = mysqli_query($conn,$sqlInst);
	$countInst = mysqli_num_rows($resultInst);

	/*verificar user*/
	$sqlVerUserInst = "SELECT username FROM user WHERE username = '$_POST[regUserInst]'";
	$resultVerUserInst = mysqli_query($conn,$sqlVerUserInst);
	$countVerUserInst = mysqli_num_rows($resultVerUserInst);

	//verifica a existencia do post enviar (se é null ou não)

		if($countInst>=1){
			$errorEmailInst = 1;
			echo "<script type='text/javascript'>alert('Email already exists!')</script>";			
		}
		elseif($countVerUserInst>=1){
			$errorOrgUsername = 1;
			echo "<script type='text/javascript'>alert('Username already exists!')</script>";				
		}
		else{
			
			if(strlen($_POST['regPasswordInst'])>=5)
			{
				//verificar a conexão
				if(!$conn)
				{
					die(mysqli_connect_error());
				}
				//Aplicar a query dependendo da condição
				elseif(mysqli_query($conn,$queryInsertInst))
				{
					echo "<script type='text/javascript'>alert('Registration submitted successfully!')</script>";
		
				}
				else
				{
					echo mysql_error($conn,$queryInsertInst);
									
				}
			}
			else{
				$errorOrgPass = 1;
			}	
		}
}
function myFunction($flag)
{
	if($flag == 1){
		echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Email already exists!')</script>";
	}		
}

mysqli_close($conn);
?>