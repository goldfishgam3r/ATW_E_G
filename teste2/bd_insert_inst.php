<?php
include("config.php");
$passwordEncriptada = password_hash($_POST["regPasswordInst"], PASSWORD_BCRYPT);
$query1 ="INSERT INTO organizacao(org_username,org_nome,password,org_city,address,zip,email,telemovel,tipo,estado,org_nif)VALUES('$_POST[regUserInst]','$_POST[regNomeInst]','$passwordEncriptada','$_POST[regCityInst]','$_POST[regAddressInst]','$_POST[regZipInst]','$_POST[regEmailInst]','$_POST[regPhoneInst]','user','1','$_POST[regNifInst]')";
$flag = 0;


$sql = "SELECT email FROM organizacao WHERE email = '$_POST[regEmailInst]'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);


//verifica a existencia do post enviar (se é null ou não)
//if(isset($_POST["enviarUser"])){
	if($count>=1){
		myFunction($flag);
		//header("location: registerFinal.php");
		$errorEmailUser = 1;
		
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
				$flag = 1;
				myFunction($flag);
				header("location: index.php");
				
				
			}
			else
			{
				myFunction($flag);
				//header("location: registerFinal.php");
								
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Weak Password!')</script>";
			//header("location: registerFinal.php");

		}	
	}
//}
function myFunction($flag)
{
	if($flag == 1){
		echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Email already exists!')</script>";
	}		
}

//require('registerFinal.php');
//mysqli_close($conn);
?>