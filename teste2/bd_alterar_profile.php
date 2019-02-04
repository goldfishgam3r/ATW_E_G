<?php
include('session.php');

if(isset ($_POST['alterar'])) {
	$query = "UPDATE user SET nome = '$_POST[regNameInst]', city = '$_POST[regCityInst]', address ='$_POST[regAddressInst]',telemovel = '$_POST[regPhoneInst]', zip ='$_POST[regZipInst]', email = '$_POST[regEmailInst]', nif = '$_POST[regNifInst]', iban = '$_POST[regIbanInst]', nib = '$_POST[regNibInst]'  WHERE id_utilizador = '$_POST[Identificador]'";
	$result = mysqli_query ($conn, $query);
	//echo $_POST["Identificador"];
	$query = "SELECT * FROM user WHERE id_utilizador = '$_POST[Identificador]'";
	$result = mysqli_query ($conn, $query);
	$row_user = mysqli_fetch_array ($result);
	$creationSuccess=1;
	//header("location: meus_eventos.php");
} else {
	$query = "SELECT * FROM user WHERE id_utilizador = $_GET[ID]";
	$result = mysqli_query ($conn, $query);
	$row_user = mysqli_fetch_array ($result,MYSQLI_ASSOC);
	$creationSuccess=0;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	  <title>Update <?= $row_user ['username'] ?> Profile</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="css/registerFinal.css">
	  <link rel="stylesheet" href="css/evento.css">
	  <link rel="stylesheet" href="css/menu.css">
	  <link rel="stylesheet" href="css/footer.css">
	  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body id="myPage">
		<a name = "up"></a>
		<div id='cssmenu'>
			<?php
				require('menuLogged.php');
			?>	
		</div>
		<div class="form-style-5 marginTop80" >
		<?php if ($creationSuccess == 1) { ?>
			<div class = "container">
				<div class="row">
					<h3 class="tituloHeart">Profile updated successfully!</h3>
					<p class="tituloHeart text-center" style="margin-bottom:20px;" >For more information check Events menu.</p>
				</div>
			</div>
		<?php } ?>	
		<div class="marginTop80 container">
			<h3 class="tituloHeart">Donating goods its one way to go!</h3>
			<div class="login-or">
				<hr class="hr-or">
				<span class="span-or"><i class="heart glyphicon glyphicon-heart-empty"></i></span>
			</div>
		</div>	
		<div class = "cont container marginTop80">
			<form id="registerInst-form" action="" method="post" role="form">			
					<div class="form-group">					
						<label for="inputEmail4Inst">Email</label>
						<input type="email" value="<?=$row_user['email']; ?>" class="form-control" id="inputEmail4Inst" placeholder="Email" name="regEmailInst"required>													
					</div>
				<div class="form-group row">
					<div class="form-group col-md-6">
						<label for="inputNameInst">Organization Name</label>
						<input type="text"  value="<?=$row_user['nome']; ?>" class="form-control" id="inputNameInst" placeholder="Weshare" name="regNameInst"required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputNifInst">Organization NIF</label>
						<input type="text"  value="<?=$row_user['nif']; ?>" class="form-control" id="inputNifInst" placeholder="" name="regNifInst"required>
					</div>
				</div>
				<div class="form-group row">
					<div class="form-group col-md-6">
						<label>Organization IBAN</label>
						<input type="text"  value="<?=$row_user['iban']; ?>" maxlength="27" class="form-control" placeholder="" name="regIbanInst"required>
					</div>
					<div class="form-group col-md-6">
						<label>Organization NIB</label>
						<input type="text"  value="<?=$row_user['nib']; ?>" maxlength="24" class="form-control" placeholder="" name="regNibInst"required>
					</div>
				</div>
				<div class="form-group row">
					<div class="form-group col-md-2">
						<label for="inputCityInst">City</label>
						<input type="text"  value="<?=$row_user['city']; ?>" class="form-control" id="inputCityInst" placeholder="Porto" name="regCityInst"required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputAddressInst">Address</label>
						<input type="text"  value="<?=$row_user['address']; ?>" class="form-control" id="inputAddressInst" placeholder="1234 Main St" name="regAddressInst"required>
					</div>
					<div class="form-group col-md-2">
					  <label for="inputZipInst">Zip</label>
					  <input type="text"  value="<?=$row_user['zip']; ?>" class="form-control" id="inputZipInst" placeholder="4450-950" name="regZipInst"required>
					</div>
					<div class="form-group col-md-2">
					  <label for="inputPhoneInst">Phone</label>
					  <input type="text"  value="<?=$row_user['telemovel']; ?>" class="form-control" id="inputPhoneInst" placeholder="974620847" name="regPhoneInst"required>
					</div>
				</div>
				<input name="Identificador" type="hidden" value="<?=$_GET['ID']?>" />
				<button type="submit" class="btn btn-success" name="alterar">Update</button>
			</form>
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
<?php
	mysqli_close($conn);
?>