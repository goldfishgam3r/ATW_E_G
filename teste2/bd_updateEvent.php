<?php
require("session.php");
if(strcmp($tipoUser, "user")==0) {
	header("location: welcome.php");
}
else
{
	if(isset ($_POST['enviarEvento'])) {
		$queryUpdateEvent = "UPDATE evento SET titulo = '$_POST[eventTitulo]', data_ini ='$_POST[eventDateStart]', data_fim = '$_POST[eventDateEnd]', estado = 1, info = '$_POST[eventDescription]' ,id_utilizador = '$idUser', descricao = '$_POST[eventDescpt]' , website = '$_POST[eventWebsite]' WHERE id_evento = '$_POST[Identificador]'";
		$resultUpdateEvent = mysqli_query ($conn, $queryUpdateEvent);
		$creationSuccess=1;
		echo "<script type='text/javascript'>alert('Update submitted successfully!')</script>";		
		header("location: gerirEvento.php");
		
	} elseif(isset ($_POST['deleteCause'])){
		$queryUpdateEvent = "UPDATE evento SET estado = 0 WHERE id_evento = '$_POST[Identificador]'";
		$resultUpdateEvent = mysqli_query ($conn, $queryUpdateEvent);
		$creationSuccess=1;
		echo "<script type='text/javascript'>alert('Cause deleted successfully!')</script>";		
		header("location: gerirEvento.php");
	}
	else {
		$creationSuccess=0;
		$query = "SELECT * FROM evento WHERE id_evento = $_GET[ID]";
		//echo $_GET["ID"];
		$result = mysqli_query ($conn, $query);
		$rowSearchEvent = mysqli_fetch_array ($result,MYSQLI_ASSOC);
		//$estado=$row["estado"];
	}
}

?>
<html lang="en">
<head>
	<title>Manage Cause</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/registerFinal.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
		<?php } ?>		
		<div class="panel-body">
			<div class = "cont container">
				<form action="bd_updateEvent.php" method="POST" role="form" style="display: block;" enctype="multipart/form-data">					
					<div class="form-group row">
						<div class="form-group col-md-6">
							<label>Title</label>
							<input type="text" class="form-control" placeholder="Cause title" name="eventTitulo" value="<?=$rowSearchEvent['titulo']; ?>" >					
						</div>
						<div class="form-group col-md-6">
							<label>Brief Description</label>
							<input type="text"  maxlength="50" class="form-control" placeholder="Describe your cause in a short sentence" name="eventDescpt" value="<?=$rowSearchEvent['descricao']; ?>">					
						</div>
					</div>																				
					<div class="form-group row">
						<div class="form-group col-md-4">
							<label>Start Date</label>
							<input type="date" class="form-control" name="eventDateStart" value="<?=$rowSearchEvent['data_ini']; ?>">
						</div>
						<div class="form-group col-md-4">
							<label>End Date</label>
							<input type="date" class="form-control" name="eventDateEnd" value="<?=$rowSearchEvent['data_fim']; ?>">
						</div>
						<div class="form-group col-md-4">
							<label>Website/Social Network</label>
							<input type="text" class="form-control" placeholder="Website/Social Network URL - www.weshare.pt" name="eventWebsite" value="<?=$rowSearchEvent['website']; ?>">					
						</div>
					</div>
					<div class="form-group">					
						<label>Description</label>
						<textarea class="form-control"  maxlength="100000" rows="3" name="eventDescription" placeholder="Some important considerations and information about the cause" style="resize: none;"><?=$rowSearchEvent['info']; ?></textarea>
					</div>
					<input name="Identificador" type="hidden" value="<?=$_GET['ID']?>" />
				  <button type="submit" class=" btn btn-primary" name="enviarEvento">Edit Cause</button>
				  <button type="submit" class=" btn btn-danger" name="deleteCause" style="margin-left:30px;">Delete Cause</button>
				</form>
			</div>
		</div>
		<div class="container" style="margin-top: 20px;">
			<div class="login-or">
				<hr class="hr-or">
				<span class="span-or"><i class="heart glyphicon glyphicon-heart"></i></span>
			</div>
		</div>
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
		<?php
			require('footer.php');
		?>
	</body>
</html>	