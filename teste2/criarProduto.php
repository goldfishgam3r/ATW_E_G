<?php
require("session.php");
if(strcmp($tipoUser, "org")==0) {
	header("location: welcome.php");
}
else
{

	$creationSuccess = 0;
	$uploadOk = 1;

	$sqlGetEventos = "SELECT * FROM evento WHERE estado = 1 ORDER BY data_ini ASC";
	$resultGetEventos = mysqli_query($conn,$sqlGetEventos);
	$count = mysqli_num_rows($resultGetEventos);

	$sqlGetCategorias = "SELECT * FROM categoria";
	$resultGetCategorias = mysqli_query($conn,$sqlGetCategorias);
	$countCategorias = mysqli_num_rows($resultGetCategorias);

	if(isset($_POST["enviarProduto"])){
		require('bd_insert_produto.php');
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
	  <link rel="stylesheet" href="css/menu.css">
	  <link rel="stylesheet" href="css/registerFinal.css">
	  <link rel="stylesheet" href="css/footer.css">
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
			<h3 class="tituloHeart">Donating goods its one way to go!</h3>
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
		<?php if ($creationSuccess == 1) { ?>
			<div class = "container">
				<div class="row">
					<h3 class="tituloHeart">Event submitted successfully!</h3>
					<p class="tituloHeart text-center" style="margin-bottom:20px;" >For more information check Events menu.</p>
				</div>
			</div>
		<?php } ?>
		<div class = "cont container">
			<form action="criarProduto.php" method="POST" role="form" enctype="multipart/form-data" style="display: block;">					
				<div class="form-group">
					<label>Product Name</label>
					<input type="text" class="form-control" placeholder="What will you danate - Ex: Cadeira de Rodas " name="productName" required>					
				</div>
				<div class="form-group row">
					<div class="form-group col-md-4">
						<label>Category</label>
						<select id="elementId" onchange="handleSelect()"  class="form-control" name="productCategoria"required>
						<option disabled selected value> -- Select an option -- </option>
						<?php
							for ($i = 0; $i < $countCategorias; $i++) {
								$rowCategoria = mysqli_fetch_array ($resultGetCategorias);								
						?>
							<option  value = "<?= $rowCategoria ['id_categoria'] ?>" > <?= $rowCategoria ['nome'] ?> </option>
						<?php } ?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>Associate an Event/Cause</label>
						<select disabled="disabled" id = "Evento" class="form-control" name="productCause" required>
						<?php
							for ($i = 0; $i < $count; $i++) {
								$rowEvento = mysqli_fetch_array ($resultGetEventos);							
						?>
							<option  value = "<?= $rowEvento ['id_evento'] ?>"> <?= $rowEvento ['titulo'] ?> </option>
						<?php } ?>
						</select>
					</div>

					<div class="form-group col-md-4">
						<label>Quantity</label>
						<input class="form-control" type="number" name="productQuantity" min="1" max="15">
					</div>
				</div>
				<div class=" row form-group ">
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
				<div class="form-group">					
					<label>Description</label>
					<textarea maxlength="100" class="form-control" rows="3" name="productDescription" placeholder="Some information about the product" style="resize: none;" required></textarea>
				</div>
			  <button type="submit" class=" btn btn-primary" name="enviarProduto">Register Product</button>
			</form>
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
			function handleSelect() {
         document.getElementById('Evento').disabled = false;
		}
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