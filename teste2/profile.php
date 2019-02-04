<?php
	require("session.php");	
	$queryOrg = "SELECT * FROM user WHERE id_utilizador = $_GET[ID]";
	$resultOrg = mysqli_query ($conn, $queryOrg);
	$rowOrg = mysqli_fetch_array ($resultOrg);
?>
<html lang="en">
	<head>
	  <title><?= $rowOrg ['username'] ?> Profile</title>
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
			<h1 class="tituloHeart">Profile of: <b><?= $rowOrg ['username'] ?></b></h1>
			<div class="login-or">
				<hr class="hr-or">
				<span class="span-or"><i class="heart glyphicon glyphicon-heart-empty"></i></span>
			</div>
		</div>
		<div class = "container">
			<div class=" row">
				<div class ="col-md-6">			
					<div style="margin-bottom: 30px;">
					<?php if(strcmp($tipoUser, "org")==0) { ?>
						<a data-original-title="Broadcast Message" data-toggle="tooltip" href="bd_alterar_profile.php?ID=<?=$rowOrg ['id_utilizador']; ?>" class="btn btn-warning" name="enviarEvento">Update Profile</a>
					<?php } else { ?>
						<a href="bd_alterar_profile_user.php?ID=<?=$rowOrg ['id_utilizador']; ?>" class="btn btn-warning" name="enviarEvento2">Update Profile</a>
					<?php } ?>
					</div>
						</br>							
					<div class="table-responsive">
						<table class="table table-striped  thBlue" style="text-align:left;">
							<tbody class="" style="text-align:left;">
								<tr>
									<th>Username:</th>
									<td><?= $rowOrg ['username'] ?></td>
								</tr>
								<tr>
									<th>Email:</th>
									<td><?= $rowOrg ['email'] ?></td>
								</tr>
								<tr>
									<th>Nome:</th>
									<td><?= $rowOrg ['nome'] ?></td>
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

								<?php if(strcmp($tipoUser, "org")==0) { ?>									
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
								<?php } ?>
							</tbody>								
						</table>
					</div>
				</div>			
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