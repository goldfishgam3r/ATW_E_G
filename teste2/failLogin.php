<html lang="en">
	<head>
	  <title>WeShare</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="css/menu.css">
	  <link rel="stylesheet" href="css/registerFinal.css">
	    <link rel="stylesheet" href="css/footer.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</head>
	<body id="myPage">
	<?php 
		require("menu.php");
	?>

		</br>
		<div class="marginTop80 container">
			<h3 class="tituloHeart">Join us and support the causes you want!</h3>
			<div class="login-or">
				<hr class="hr-or">
				<span class="span-or"><i class="heart glyphicon glyphicon-heart-empty"></i></span>
			</div>
		</div>	
		</br>
		<div class = "inspiracaoContainer container">
			<div class="row">
				<div class = "inspiracao col-sm-4 text-center">
					<i class="icons glyphicon glyphicon-share"></i>
					<p>Your contribution makes the difference!</p>
				</div>
				<div class = "inspiracao col-sm-4 text-center">
					<i class="icons glyphicon glyphicon-bullhorn"></i>
					<p>Share your act!</p>
				</div>
				<div class = "inspiracao col-sm-4 text-center">
					<i class="icons glyphicon glyphicon-heart"></i>
					<p>Help who need the most!</p>
				</div>
			</div>
		</div>
		
		<!-- Modal -->
		<div >
		  <div class="modal-dialog" style="margin-top:10px;">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modalh modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				 <!-- <img src="images/solidar2.jpg" alt="Norway">  -->      
				<h3> Welcome to Weshare!</h3> 
				<p>Support the causes you want and help who need the most!<p>
			  </div>
			  <div class="modal-body">
				<div class="container">
				  <div class="row" >
					<div class="main">
					  <h3>Please Log In, or <a href="#">Sign Up</a></h3>
					  <div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
						  <a href="#" class="btn btn-lg btn-primary btn-block">Facebook</a>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
						  <a href="#" class="btn btn-lg btn-info btn-block">Google</a>
						</div>
					  </div>
					  
					  <div class="login-or">
						<hr class="hr-or">
						<span class="span-or">or</span>
					  </div>

					  <form action="bd_login.php" method="post" role="form">
						<div class="form-group has-error">
						  <label class="control-label" for="inputUsernameEmail">Username or email</label>
						  <input type="text" class="form-control" id="inputUsernameEmail" name= "usernameLogin">
						</div>
						<div class="form-group has-error">
						  <a class="pull-right" href="#">Forgot password?</a>
						  <label class="control-label" for="inputPassword">Password</label>
						  <input type="password" class="form-control" id="inputPassword"name= "passwordLogin">
						</div>
						<div class="checkbox pull-right">
						  <label>
							<input type="checkbox">
							Remember me </label>
						</div>
						<button type="submit" class="btn btn btn-primary" name="login">
						  Log In
						</button>
					  </form>					
					</div>					
				  </div>
				</div>
			  </div>
			  <div class="modal-footer">
				<p>Do not have an account?  <a href = "registerFinal.php" target = "">Sign up!</a></p>
			  </div>
			</div>

		  </div>
		</div>
		<div class="container" style="margin-top:40px;">
			<div class="login-or">
				<hr class="hr-or">
				<span class="span-or"><i class="heart glyphicon glyphicon-heart"></i></span>
			</div>
		</div>
		<?php
			require('footer.php');
		?>
		<script>
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
	</body>
</html>