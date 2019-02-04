<?php
require("session.php");
if(strcmp($tipoUser, "user")==0) {
	header("location: welcome.php");
}
else
{
	$queryProduto = "SELECT *, produto.nome as productName, produto.id_utilizador as productUser, produto.id_produto FROM evento, produto, user WHERE evento.id_utilizador='$idUser' and evento.id_evento = produto.id_evento and produto.id_utilizador = user.id_utilizador and produto.delivery = '0'";
	//echo $_GET["ID"];
	$resultProduto = mysqli_query ($conn, $queryProduto);
	$count = mysqli_num_rows($resultProduto);
	//echo "<h1>".$count."</h1>";
	
	$queryProduto2 = "SELECT *, produto.nome as productName, produto.id_utilizador as productUser, produto.id_produto FROM evento, produto, user WHERE evento.id_utilizador='$idUser' and evento.id_evento = produto.id_evento and produto.id_utilizador = user.id_utilizador and produto.delivery = '1'";
	//echo $_GET["ID"];
	$resultProduto2 = mysqli_query ($conn, $queryProduto2);
	$count2 = mysqli_num_rows($resultProduto2);
	
	$queryProduto3 = "SELECT *, produto.nome as productName, produto.id_utilizador as productUser, produto.id_produto FROM evento, produto, user WHERE evento.id_utilizador='$idUser' and evento.id_evento = produto.id_evento and produto.id_utilizador = user.id_utilizador and produto.delivery = '0'";
	//echo $_GET["ID"];
	$resultProduto3 = mysqli_query ($conn, $queryProduto3);
	$count3 = mysqli_num_rows($resultProduto3);
	
	$queryProdutoPending = "SELECT *, produto.nome as productName, produto.id_utilizador as productUser, produto.id_produto FROM evento, produto, user WHERE evento.id_utilizador='$idUser' and evento.id_evento = produto.id_evento and produto.id_utilizador = user.id_utilizador and produto.delivery != '0' and produto.delivery != '1'";
	//echo $_GET["ID"];
	$resultProdutoPending = mysqli_query ($conn, $queryProdutoPending);
	$countPending = mysqli_num_rows($resultProdutoPending);
	
	if(isset($_POST["checkout"])){
		
		$prefix = "PT";
		$uniqid = $prefix . uniqid();
		for ($i = 0; $i < $count3; $i++) {
			$rowEvento3 = mysqli_fetch_array ($resultProduto3);
			$idProduto = $rowEvento3["id_produto"];
			/*echo "id produto:" . $idProduto;
			echo $uniqid;*/
			$queryAlterarDelivery = "UPDATE produto set delivery = '$uniqid' where id_produto = '$idProduto'";
			mysqli_query ($conn, $queryAlterarDelivery);
			mysqli_error($conn);
			$queryProdutoPending = "SELECT *, produto.nome as productName, produto.id_utilizador as productUser, produto.id_produto FROM evento, produto, user WHERE evento.id_utilizador='$idUser' and evento.id_evento = produto.id_evento and produto.id_utilizador = user.id_utilizador and produto.delivery != '0' and produto.delivery != '1'";
			$resultProdutoPending = mysqli_query ($conn, $queryProdutoPending);
			mysqli_error($conn);
			$countPending = mysqli_num_rows($resultProdutoPending);
		}
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
		<?php if ($count > 0) { ?>
		<div class="row marginTop80">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Image</th>
							<th>Product</th>
							<th>Quantity</th>
							<th> </th>
						</tr>
					</thead>

					<tbody>
					<?php 
						for ($i = 0; $i < $count; $i++) {
							$rowEvento = mysqli_fetch_array ($resultProduto);
					?>
						<tr>
							<td class="col-md-2">
								<a class="thumbnail pull-left" href="#"> <img class="media-object image-responsive" src="images/product.png" style="max-width: 72px; width: auto; object-fit: contain;"> </a>
								
								</td>
							<td class="col-md-4">
							<div class="media">
								<div class="media-body">
									<p class="media-heading">Cause: <a href="eventoLogged.php?ID=<?= $rowEvento ['id_evento'] ?>"><?= $rowEvento ['titulo'] ?></a></p>						
							
									<h5 class="media-heading"><a href="#"><?= $rowEvento ['productName']; ?></a></h4>
									<h5 class="media-heading"> by <a href="userProfile.php?ID=<?= $rowEvento ['productUser'] ?>"><?= $rowEvento ['username'] ?></a></h5>
										<span>Status: </span><span class="text-warning"><strong>*Still in Donator</strong></span>
								</div>
							</div></td>
							<td class="col-md-1" style="text-align: center">
							<input type="text" class="form-control" id="exampleInputEmail1" value="<?= $rowEvento ['quantidade'] ?>">
							</td>
							<td class="col-md-1">
							<button type="button" class="btn btn-danger">
								<span class="glyphicon glyphicon-remove"></span> Remove
							</button></td>
						</tr>
					<?php } ?>
						<tr>
							<td>   </td>
							<td><h5>Subtotal</h5></td>
							<td class="text-right"><h5><strong>$0.00</strong></h5></td>
						</tr>
						<tr>
							<td>   </td>
							<td><h5>Estimated shipping</h5></td>
							<td class="text-right"><h5><strong>$3.00</strong></h5></td>
						</tr>
						<tr>
							<td>   </td>
							<td><h3>Total</h3></td>
							<td class="text-right"><h3><strong>$3.00</strong></h3></td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td colspan="2">					
								<p><span class="text-warning"><strong>*Still in Donator</strong></span> - Leaves warehouse in 2 - 3 weeks after checkout</p>
							</td>
							 
							
						</tr>	
						<tr>
							<td colspan="3" align="right">
								<form action="myProduto.php" method="post" role="form" >
									<button type="submit" class="btn btn-success" name="checkout">
										Checkout <span class="glyphicon glyphicon-play"></span>
									</button>
								</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<? } else { ?>
			<div class="container-fluid">
				<h2> Products not found! </h2>
			</div>		
		<?php } ?>
		<?php if ($countPending > 0) { ?>
		<div class=" container table-responsive">
			<div class=" marginTop80 panel panel-warning" style = " text-align: center;">		
				<div class="panel-heading"><p style = "font-size:20px;">Pending Products: </p></div>
				<div class="panel-body">
					<table class="table table-hover table-bordered" style = "text-align: center; margin:0;">
						<thead>
							<tr class="active" style = "text-align: center;">
								<th>Product Name</th>
								<th>Donator</th>
								<th>Quantity</th>					
								<th>Delivery Code</th>
							</tr>
						</thead>
						<?php 
							for ($i = 0; $i < $countPending; $i++) {
								$rowEventoPending = mysqli_fetch_array ($resultProdutoPending);						
						?>
						<tbody>
							<tr>
							
								<td><?= $rowEventoPending ['productName'] ?> </td>
								<td><a href="userProfile.php?ID=<?= $rowEventoPending ['productUser']; ?>"><?= $rowEventoPending ['username'] ?></a></td>									
								<td><?= $rowEventoPending ['quantidade'] ?> </td>							
								<td class="warning text-warning"><span data-toggle="tooltip" data-placement="top" title="Use this code to keep track your order!" class="test" ><?= $rowEventoPending ['delivery'] ?></span> </td>
							</tr>						
						</tbody>							
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if ($count2 > 0) { ?>
		<div class=" container table-responsive">
			<div class=" marginTop80 panel panel-success" style = " text-align: center;">		
				<div class="panel-heading"><p style = "font-size:20px;">Delivered Products: </p></div>
				<div class="panel-body">
					<table class="table table-hover table-bordered" style = "text-align: center; margin:0;">
						<thead>
							<tr class="active" style = "text-align: center;">
								<th>Product Name</th>
								<th>Donator</th>
								<th>Quantity</th>					
								<th>Delivery Status</th>
							</tr>
						</thead>
						<?php 
							for ($i = 0; $i < $count2; $i++) {
								$rowEvento2 = mysqli_fetch_array ($resultProduto2);						
						?>
						<tbody>
							<?php if (strcmp($rowEvento2 ['delivery'], "1")==0) { ?>
							<tr>
							
								<td><?= $rowEvento2 ['productName'] ?> </td>
								<td><a href="userProfile.php?ID=<?= $rowEvento2 ['productUser']; ?>"><?= $rowEvento2 ['username'] ?></a></td>									
								<td><?= $rowEvento2 ['quantidade'] ?> </td>
								<td class="text-success success">Delivered</td>
							</tr>
							<?php } ?>							
						</tbody>							
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class= " marginTop80 container ">
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
			   $('[data-toggle="tooltip"]').tooltip();  
			});			
		</script>
	</body>
</html>