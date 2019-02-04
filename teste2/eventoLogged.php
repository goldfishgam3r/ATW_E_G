<?php
require("session.php");

	$queryEvento = "SELECT * FROM evento WHERE id_evento=$_GET[ID]";
	//echo $_GET["ID"];
	$resultEvento = mysqli_query ($conn, $queryEvento);
	$rowEvento = mysqli_fetch_array ($resultEvento);
	$utilizador = $rowEvento ['id_utilizador'];//criador do artigo
	
	$queryOrg = "SELECT * FROM user WHERE id_utilizador = '$utilizador'";
	$resultOrg = mysqli_query ($conn, $queryOrg);
	$rowOrg = mysqli_fetch_array ($resultOrg);
	
	$userIdEvent = $rowEvento ['id_utilizador'];
	// = $userIdEvent;
	
	
?>
<html lang="en">
	<head>
	  <title><?= $rowEvento ['titulo'] ?></title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/footer.css">
	  <link rel="stylesheet" href="css/registerFinal.css">
	  <link rel="stylesheet" href="css/evento.css">
	  <link rel="stylesheet" href="css/menu.css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</head>
	<body id="myPage">
		<?php
			require('menuLogged.php');
			/*require('carousel.php');*/
		?>
		<div class="marginTop80 container">
			<h4 class="tituloHeart">Consider supporting the cause of: <b><?= $rowOrg ['username'] ?></b></h4>
			<div class="login-or">
				<hr class="hr-or">
				<span class="span-or"><i class="heart glyphicon glyphicon-heart-empty"></i></span>
			</div>
		</div>
		<div class = "cont container">
			<div class=" row">
				<div class ="col-md-6">
					<div>
						<p class="titulo"> <b><?= $rowEvento ['titulo'] ?> </b></p>
					</div>
						</br>							
					<div class="table-responsive">
						<table class="table table-borderless thBlue" style="text-align:left;">
							<tbody class="">
								<tr>
									<th>Initial Date:</th>
									<td><?= $rowEvento ['data_ini'] ?></td>
								</tr>
								<tr>
									<th>End Date:</th>
									<td><?= $rowEvento ['data_fim'] ?></td>
								</tr>
								<tr>
									<th>Website/Social Network:</th>
									<td><a target="_blank" href="<?= $rowEvento ['website'] ?>"><?= $rowEvento ['website'] ?><a></td>
								</tr>
								<tr>
									<th>Phone Number:</th>
									<td><?= $rowOrg ['telemovel'] ?></td>
								</tr>
								<tr class="borderTop">
									<th>Zip Code:</th>
									<td><?= $rowOrg ['zip'] ?></td>
								</tr>
								<tr>
									<th>City:</th>
									<td><?= $rowOrg ['city'] ?></td>
								</tr>
								<tr>
									<th>Address:</th>
									<td><?= $rowOrg ['address'] ?></td>
								</tr>							
								<tr class="borderTop">
									<th>NIF:</th>
									<td><?= $rowOrg ['nif'] ?></td>
								</tr>
								<tr>
									<th>NIB:</th>
									<td><?= $rowOrg ['nib'] ?></td>
								</tr>
								<tr>
									<th>IBAN:</th>
									<td><?= $rowOrg ['iban'] ?></td>
								</tr>
							</tbody>								
						</table>
					</div>
				</div>
				<div align="center" class ="col-md-6">
					<img src="images/<?= $rowEvento ['imagem'] ?>" class="img-responsive img-thumbnail">
					</br>
					</br>
					<div style="text-align:left;">
						<p class="titulocontudo"><b>Want to help this cause?</b> </p>
						<p><?= $rowEvento ['titulo'] ?> by <b class="titulocontudo"> <?= $rowOrg ['username'] ?> </b></p>
						<?php if(strcmp("$userIdEvent","$idUser")==0) { ?>
							<a  disabled="disabled" class="btn btn-success btn-lg" name="enviarEvento">Help cause</a>				
						<?php } else { ?>
							<a href="criarProduto.php" class="btn btn-success btn-lg" name="enviarEvento">Help cause</a>				
						<?php } ?>
					</div>
				</div>
			</div>
			<div class=" row col-md-12" align = "center" style = "margin-top:80px;">
				<fieldset>
					<p class="titulo" style ="text-align:left;"> <b>Map location</b> </p>
					<iframe align = "center" width="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCtfRGbYUsZLK5yYvuubXDlKu93r3u3EJc&q=<?=$rowOrg ['city'] ?>" allowfullscreen></iframe>										
				</fieldset>
			</div>
			<div class="row col-md-12 marginTop80" style="margin-bottom:40px;">
					<p class="titulo"><b>Description</b> </p>					
					<p><?= $rowEvento ['info'] ?> </p>
			</div>			
		</div>
		<div class= " marginTop80 container">
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