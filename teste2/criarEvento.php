<?php
require("session.php");
if(strcmp($tipoUser, "user")==0) {
	header("location: welcome.php");
}
	else
	{
	$creationSuccess = 0;
	$uploadOk = 1;
	if(isset($_POST["enviarEvento"])){
		require('bd_insert_evento.php');
	}
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
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	
	<script>
		$( function() {
			$( "#datepicker" ).datepicker();
			$( "#datepicker2" ).datepicker();
		} );
	</script>
  
  

  <link rel="stylesheet" href="css/registerFinal.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
	<body id="myPage">
		<?php
			require('menuLogged.php');
			/*require('carousel.php');*/
		?>
		</br>
		<div class="marginTop80 container">
			<h3 class="tituloHeart">Are you an Organazation?</h3>
			<p class="tituloHeart text-center" style="font-size:20px;">Share your cause!</p>
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
					<p>Share your purpose.</p>
				</div>
				<div class = "inspiracao col-sm-4 text-center">
					<i class="icons glyphicon glyphicon-bullhorn"></i>
					<p>Reach more people and get more funds.</p>
				</div>
				<div class = "inspiracao col-sm-4 text-center">
					<i class="icons glyphicon glyphicon-heart"></i>
					<p>Do what you can to help others.</p>
				</div>
			</div>
		</div>
		<?php if ($creationSuccess == 1) { ?>
			<div class = "container">
				<div class="row">
					<h3 class="tituloHeart">Event submitted successfully!</h3>
					<p class="tituloHeart text-center" style="margin-bottom:20px;" >For more information check Events menu.</p>
				</div>
			</div>
			<br>
			<br>
		<?php } ?>
		<div class="panel-body">
			<div class = " container cont">
				<form action="criarEvento.php" method="POST" role="form" style="display: block;" enctype="multipart/form-data">					
					<div class="form-group row">
						<div class="form-group col-md-6">
							<label>Title</label>
							<input type="text" class="form-control" placeholder="Cause title" name="eventTitulo" required>					
						</div>
						<div class="form-group col-md-6">
							<label>Website/Social Network</label>
							<input type="text" class="form-control" placeholder="Website/Social Network URL - www.weshare.pt" name="eventWebsite" required>					
						</div>
					</div>																				
					<div class="form-group row">
						<div class="form-group col-md-6">
							<label>Start Date</label>
							<input type="date" class="form-control" name="eventDateStart"required>
						</div>
						<div class="form-group col-md-6">
							<label>End Date</label>
							<input type="date" class="form-control" name="eventDateEnd"required>
						</div>
						<div class="form-group col-md-4">
							</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Intervation Area</label>
							<input type="text"  maxlength="50" class="form-control" placeholder="Intervation Area" name="eventDescpt" required>											
						</div>
						<div class="form-group col-md-6">
							<?php if($uploadOk==1) { ?>
								<div class="form-group col-md-4">
									<label for="exampleInputFile">Image File Input</label>
									<input type="file" name="ficheiro">
									<p class="help-block">Pick an image to represent your event.</p>
								</div>
							<?php } else { ?>
								<div class="form-group col-md-4 has-error">
									<label class="control-label" for="exampleInputFile">Image File Input</label>
									<input type="file" name="ficheiro" id="exampleInputFile">
									<p class="help-block">Error saving image file, check extension or size</p>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="form-group">					
						<label>Description</label>
						<textarea class="form-control"  maxlength="10000" rows="15" name="eventDescription" placeholder="Some important considerations and information about the cause" style="resize: none;" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class=" btn btn-primary" name="enviarEvento">Create event</button>		
					</div>
				</form>
			</div>
		</div>
		<div class="container" style="margin-top: 20px;">
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