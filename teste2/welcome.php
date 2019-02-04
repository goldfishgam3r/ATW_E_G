<?php
require('session.php');
	
	$dataAtual = date('Y-m-d');
	$query = "UPDATE evento SET ativo = 0 WHERE dataevento < '$dataAtual'";
	$result = mysqli_query ($conn, $query);
	
	$sqlGetEventos = "SELECT * FROM evento WHERE ativo = 1 ORDER BY data_ini ASC";
	$resultGetEventos = mysqli_query($conn,$sqlGetEventos);
	$count = mysqli_num_rows($resultGetEventos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Help Running</title>
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<?php
		require('menuLogged.php');
		require('carousel.php');
	?>
<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8" style = "text-align = left" >
      <h2>About Company Page</h2><br>
      <h2 style = "color:#007a99;"><strong>Who we are</strong></h2><br>
      <p>A “We Share” consiste num projeto elaborado por um conjunto de estudantes de diversas licenciaturas desde gestão à engenharia informática e à contabilidade. </p>
	  <p>Estes jovens decidiram criar uma entidade solidária, constituída por uma equipa dinâmica, motivada e apaixonada em que o principal objetivo passa pela solidariedade e partilha com os outros. </p>
	  <p> “We Share” é uma organização com uma nova forma de apoio onde a sociedade em geral pode apoiar as diversas causas sociais existentes e particularmente outras pessoas. </p>
	  <br><button class="btn btn-default btn-lg">Get in Touch</button>
    </div>
    <div class="col-sm-4" align = "right">
	<img src="images/Redh.png" width="300" height="261" class="d-inline-block align-top slideanim" alt="" style="margin-bottom:10px;">	        
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
	<span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h2><strong style = "color:#007a99;">MISSION:</strong></h2>
	  <p>Our organization is focused on helping others, working in emergent situations. </p>  	  
	  <p>Encourages sharing of asset and assistance in alarming situations and we also help people rebuild their lives and follow your dreams.</p>
	  </br>
	  <h2><strong style = "color:#007a99;">VISION:</strong></h2> 
	  <p>We aim to reduce inequalities by creating a more harmonious, more inclusive, less indifferent and more supportive world.  </p>
	  <p>We intend to be a reference organization in the creation and dynamization of responses to the needs and potential of people.</p>
	  
	</div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center" >
  <h2><Strong>SERVICES<strong></h2>
  <h3>What we offer</h3>
  <br>
  <div class="row slideanim" >
    <div class="col-sm-6">
      <span class="glyphicon glyphicon-eye-open logo-small"></span>
      <h4>Visibility</h4>
      <p>We can help your organazition to be recognized.</p><p> Join us, and power up the visibility of your cause!</p>
    </div>
    <div class="col-sm-6">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>Ways of Help</h4>
      <p>We provide more ways for people to contribute and support your causes</p><p> By donating there products!</p>
    </div>
  </div>
</div>
  <br><br>
  <hr>
<div id="partners" class="container-fluid text-center">
 <h2><Strong>Some Partners<strong></h2>
  <h3>Join us too!</h3>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
		<img src="images/Logo2.jpg" width="150" height="110" class="d-inline-block align-top slideanim" alt="" style="margin-bottom:10px;">	        
    </div>
    <div class="col-sm-4">
		<img src="images/Cruz.jpg" width="150" height="110" class="d-inline-block align-top slideanim" alt="" style="margin-bottom:10px;">	        
    </div>
	<div class="col-sm-4">
		<img src="images/logotiponariz.jpg" width="190" height="110" class="d-inline-block align-top slideanim" alt="" style="margin-bottom:10px;">	        
    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Porto, PT</p>
      <p><span class="glyphicon glyphicon-phone"></span> +351 227824166</p>
      <p><span class="glyphicon glyphicon-envelope"></span> weshare@weshare.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>
	
	<div id = "causes" class="container">
		<h3 class="tituloHeart">Support the causes you want and help who need the most!</h3>
		<div class="login-or">
			<hr class="hr-or">
			<span class="span-or"><i class="heart glyphicon glyphicon-heart-empty"></i></span>
		</div>
	</div>	
	</br>
	
	<div class="container">
		<div class="row">
		<?php
				for ($i = 0; $i < $count; $i++) {
					$rowEvento = mysqli_fetch_array ($resultGetEventos);
					
					if ($i % 3 == 0 && $i != 0) { ?>
		</div>				
	</div>
	<div class="container">
	  <div class="row">
		<?php }	?>
		<div class="col-xs-12 col-md-4 col-lg-4 ">
		  <div class="panel panel-default">
			<div class="panel-heading" ><?=$rowEvento ['titulo'] ?></div>
			<div class="panel-body" align="center">
				<a target="_self" href="eventoLogged.php?ID=<?=$rowEvento ['id_evento']; ?>">
					<img src="images/<?= $rowEvento ['imagem'] ?>" class="img-responsive" style = "height: 150px; width: auto; object-fit: contain;">
				</a>
			</div>
			<div class="panel-footer"> <?=$rowEvento ['descricao'] ?> </div>
		  </div>
		</div>
		<?php }	?>

	  </div>
	</div><br>
	<div class="container">
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
		  
		  $(window).scroll(function() {
			$(".slideanim").each(function(){
			  var pos = $(this).offset().top;

			  var winTop = $(window).scrollTop();
				if (pos < winTop + 600) {
				  $(this).addClass("slide");
				}
			});
		  });
		})
	</script>	
	</br>
	<?php 
		require('footer.php');
	?>
</body>
</html>