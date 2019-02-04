<?php
	/*verificar email*/
	$errorEmailUser = 0;
	$errorEmailInst = 0;
	
	/*verificar user*/
	$errorUserUsername = 0;
	$errorOrgUsername = 0;
	
	/*Verificar password*/
	$errorUserPass = 0;
	$errorOrgPass = 0;
	
	if(isset($_POST["enviarUser"])){
		require('bd_insert_user.php');
	}
	if(isset($_POST["enviarInst"])){
		require('bd_insert_user.php');
	}
?>	
<html lang="en">
<head>
  <title>WeShare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/registerFinal.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/footer.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    
  </style>

</head>
<body id="myPage">
	<?php
		require('menu.php');
	?>	
	<div class="marginTop80 container">
		<h3 class="tituloHeart">Join us and make your contribution!</h3>
		<div class="login-or">
			<hr class="hr-or">
			<span class="span-or"><i class="heart glyphicon glyphicon-heart-empty"></i></span>
		</div>
	</div>	
	</br>
	<div class = "inspiracaoContainer container-fluid">
		<div class="row">
			<div class = "inspiracao col-sm-4 text-center">
				<i class="icons glyphicon glyphicon-share"></i>
				<p>Share your purpose!</p>
			</div>
			<div class = "inspiracao col-sm-4 text-center">
				<i class="icons glyphicon glyphicon-bullhorn"></i>
				<p>Shout out love!</p>
			</div>
			<div class = "inspiracao col-sm-4 text-center">
				<i class="icons glyphicon glyphicon-heart"></i>
				<p>Do what you can to help others!</p>
			</div>
		</div>
	</div>
	<div class="container cont" style= "margin-top: 150px;">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-6">
					<a href="#" onclick="function()" class="active" id="resgisterUser-form-link">User Register</a>
				</div>
				<div class="col-xs-6">
					<a href="#" onclick="function()" id="registerInst-form-link">Organization Register</a>
				</div>
			</div>
			<hr>
		</div>
		<div class="panel-body">
			<form id="resgisterUser-form" action="registerFinal.php" method="POST" role="form" style="display: block;">				
				<div class="form-group row">
					<?php if($errorUserUsername==0){ ?>
						<div class="form-group col-md-6">
							<label for="inputUsername">Username</label>
							<input type="text" class="form-control" id="inputUser" placeholder="Username" name="regUser" required>					
						</div>
					<?php } else { ?>
						<div class="form-group col-md-6 has-error">
							<label class="control-label" for="inputUsername">Username</label>
							<input type="text" class="form-control" id="inputUser" placeholder="Username" name="regUser" required>
							<span class="help-block">Username Already exists!</span>
						</div>
					<?php } ?>
					
					<?php if($errorUserPass==0){ ?>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Password</label>
						<input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="regPassword" required>
					</div>
					<?php } else { ?>
					<div class="form-group col-md-6 has-error">
						<label class="control-label" for="inputPassword4">Password</label>
						<input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="regPassword" required>
						<span class="help-block">Very Weak Password! must contain atleast 5 characters.</span>						
					</div>
					<?php } ?>
					
				</div>
				<div class="form-group">
					<label for="inputNome">Name</label>
					<input type="text" class="form-control" id="inputNome" placeholder="Name" name="regNome"required>
				</div>
				
				<?php if($errorEmailUser==0){ ?>
				<div class="form-group">					
					<label for="inputEmail4">Email</label>
						<input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="regEmail"required>													
				</div>
				<?php } else { ?>
				<div class="form-group has-error">					
					<label class="control-label" for="inputEmail4">Email</label>					
						<input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="regEmail"required>					
						<span class="help-block">Email Already exists!</span>									
				</div>
				<?php } ?>
				<div class="form-group row">
					<div class="form-group col-md-2">
						<label for="inputCity">City</label>
						<input type="text" class="form-control" id="inputCity" placeholder="Porto" name="regCity"required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputAddress">Address</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="regAddress"required>
					</div>
					<div class="form-group col-md-2">
					  <label for="inputZip">Zip</label>
					  <input type="text" class="form-control" id="inputZip" placeholder="4450-950" name="regZip"required>
					</div>
					<div class="form-group col-md-2">
					  <label for="inputPhone">Phone</label>
					  <input type="text" class="form-control" id="inputPhone" placeholder="974620847" name="regPhone"required>
					</div>
				</div>
			  <button type="submit" class="btn btn-primary" name="enviarUser">Sign in</button>
			</form>
			
			<form id="registerInst-form" action="" method="post" role="form" style="display: none;">
				<div class="form-group row">
					<?php if($errorOrgUsername==0){ ?>
						<div class="form-group col-md-6">
							<label for="inputUsernameInst">Username</label>
							<input type="text" class="form-control" id="inputUsernameInst" placeholder="Username" name="regUserInst" required>					
						</div>
					<?php } else { ?>
						<div class="form-group col-md-6 has-error">
							<label class="control-label" for="inputUsernameInst">Username</label>
							<input type="text" class="form-control" id="inputUsernameInst" placeholder="Username" name="regUserInst" required>
							<span class="help-block">Username Already exists!</span>
						</div>
					<?php } ?>
					
					<?php if($errorOrgPass==0){ ?>
						<div class="form-group col-md-6">
							<label for="inputPassword4Inst">Password</label>
							<input type="password" class="form-control" id="inputPassword4Inst" placeholder="Password" name="regPasswordInst" required>
						</div>
					<?php } else { ?>
						<div class="form-group col-md-6 has-error">
							<label class="control-label" for="inputPassword4Inst">Password</label>
							<input type="password" class="form-control" id="inputPassword4Inst" placeholder="Password" name="regPasswordInst" required>
							<span class="help-block"> Very Weak Password! must contain atleast 5 characters.</span>						
						</div>
					<?php } ?>
				</div>
				
				<?php if($errorEmailInst==0){ ?>
					<div class="form-group">					
						<label for="inputEmail4Inst">Email</label>
						<input type="email" class="form-control" id="inputEmail4Inst" placeholder="Email" name="regEmailInst"required>													
					</div>
				<?php } else { ?>
					<div class="form-group has-error">					
						<label class="control-label" for="inputEmail4">Email</label>					
						<input type="email" class="form-control" id="inputEmail4Inst" placeholder="Email" name="regEmailInst"required>					
						<span class="help-block">Email Already exists!</span>									
					</div>
				<?php } ?>				

				<div class="form-group row">
					<div class="form-group col-md-6">
						<label for="inputNameInst">Organization Name</label>
						<input type="text" class="form-control" id="inputNameInst" placeholder="Weshare" name="regNameInst"required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputNifInst">Organization NIF</label>
						<input type="text" class="form-control" id="inputNifInst" placeholder="" name="regNifInst"required>
					</div>
				</div>
				<div class="form-group row">
					<div class="form-group col-md-6">
						<label>Organization IBAN</label>
						<input type="text" maxlength="27" class="form-control" placeholder="" name="regIbanInst"required>
					</div>
					<div class="form-group col-md-6">
						<label>Organization NIB</label>
						<input type="text" maxlength="24" class="form-control" placeholder="" name="regNibInst"required>
					</div>
				</div>
				<div class="form-group row">
					<div class="form-group col-md-2">
						<label for="inputCityInst">City</label>
						<input type="text" class="form-control" id="inputCityInst" placeholder="Porto" name="regCityInst"required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputAddressInst">Address</label>
						<input type="text" class="form-control" id="inputAddressInst" placeholder="1234 Main St" name="regAddressInst"required>
					</div>
					<div class="form-group col-md-2">
					  <label for="inputZipInst">Zip</label>
					  <input type="text" class="form-control" id="inputZipInst" placeholder="4450-950" name="regZipInst"required>
					</div>
					<div class="form-group col-md-2">
					  <label for="inputPhoneInst">Phone</label>
					  <input type="text" class="form-control" id="inputPhoneInst" placeholder="974620847" name="regPhoneInst"required>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" name="enviarInst">Sign in</button>
			</form>			
		</div>
	</div>
	<div class="container" style="margin-top: 30px; ">
		<div class="login-or">
			<hr class="hr-or">
			<span class="span-or"><i class="heart glyphicon glyphicon-heart"></i></span>
		</div>
	</div>
	
	<script>
		$('#resgisterUser-form-link').click(function(e) {
			$("#resgisterUser-form").delay(100).fadeIn(100);
			$("#registerInst-form").fadeOut(100);
			$('#registerInst-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#registerInst-form-link').click(function(e) {
			$("#registerInst-form").delay(100).fadeIn(100);
			$("#resgisterUser-form").fadeOut(100);
			$('#resgisterUser-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		
		$(document).ready(function(){
			  // Add smooth scrolling to all links in navbar + footer link
			  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

			   // Make sure this.hash has a value before overriding default behavior
			  if (this.hash !== "") {

				// Prevent default anchor click behavior
				event.preventDefault();

				// Store hash
				var hash = this.hash;

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
				$('html, body').animate({
				  scrollTop: $(hash).offset().top
				}, 900, function(){

				  // Add hash (#) to URL when done scrolling (default click behavior)
				  window.location.hash = hash;
				  });
				} // End if
			  });
			})
	</script>
	<?php
		require('footer.php');
	?>	
</body>
</html>