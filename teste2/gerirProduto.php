<?php
require("session.php");
if(strcmp($tipoUser, "org")==0) {
	header("location: welcome.php");
}
else
{
	$queryProduto = "SELECT * FROM produto WHERE id_utilizador='$idUser'";
	//echo $_GET["ID"];
	$resultProduto = mysqli_query ($conn, $queryProduto);
	$count = mysqli_num_rows($resultProduto);
}
?>
<html lang="en">
	<head>
	  <title>WeShare</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
	  <link rel="stylesheet" href="css/footer.css">
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		<div class="marginTop80 container ">
			<h3 class="tituloHeart">Are you an Organazation?</h3>
			<p class="tituloHeart text-center" style="font-size:20px;">Share your cause!</p>
			<div class="login-or">
				<hr class="hr-or">
				<span class="span-or"><i class="heart glyphicon glyphicon-heart-empty"></i></span>
			</div>
		</div>
		<div class="container table-responsive">
			<div class=" panel panel-primary" style = "margin: 50px 60px 0px 60px; text-align: center;">		
				<div class="panel-heading"><p style = "font-size:20px;">My Events/Causes Control Panel</p></div>
				<div class="panel-body">					
					<table class="table table-hover table-bordered " style = "text-align: center; margin:0;">
						<thead>
							<tr class="active">
								<th>Title</th>
								<th>Quantity</th>
								<th>Status</th>
								<th>Delivery</th>
								<th>Edit/Delete product</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							for ($i = 0; $i < $count; $i++) {
								$rowProduto = mysqli_fetch_array ($resultProduto);						
						?>
							<tr>
								<td><?= $rowProduto ['nome'] ?> </td>
								<td><?= $rowProduto ['quantidade'] ?> </td>
									<?php if ($rowProduto ['estado'] == 1) { ?>
									<td class="success text-success"><b>Active</b></td>
									<?php } else { ?>
									<td class="danger text-danger"><b>Inactive</b></td>
									<?php } ?>
									
									<?php if ($rowProduto ['delivery'] == 1) { ?>
									<td class="success text-success"><b>Delivered</b></td>
									<?php } else { ?>
									<td class="danger text-danger"><b>Undelivered</b></td>
									<?php } ?>
									
									<td> <a href="bd_updateProduto.php?ID=<?=$rowProduto ['id_produto']; ?>" class="btn btn-warning" name="enviarEvento">Update/Delete Cause</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
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