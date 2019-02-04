<?php
include('config.php');
	
	$dataAtual = date('Y-m-d');
	$query = "UPDATE evento SET ativo = 0 WHERE dataevento < '$dataAtual'";
	$result = mysqli_query ($conn, $query);
	
	$sqlGetEventos = "SELECT * FROM evento WHERE ativo = 1";
	$resultGetEventos = mysqli_query($conn,$sqlGetEventos);
	$count = mysqli_num_rows($resultGetEventos);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <title>WeShare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/carousel.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<?php
		require('menu.php');
		require('carousel.php');
	?>
<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8" style = "text-align = left" >
      <h2>Sobre a página da empresa</h2><br>
      <h2 style = "color:#007a99;"><strong>Quem somos?</strong></h2><br>
      <p>A “Help Running” consiste num projeto elaborado por uma dupla de estudantes da licenciatura de engenharia informática. </p>
	  <p>Estes jovens criaram uma página que permitisse a todas as pessoas com alguma limitação fisica podessem inscrever-se em provas de atletismo</p>
    </div>
    <div class="col-sm-4" align = "right">
	<img src="images/Redh.png" width="300" height="261" class="d-inline-block align-top slideanim" alt="" style="margin-bottom:10px;">	        
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center" >
  <div id="partners" class="container-fluid text-center">
  <h2><Strong>Parcerias<strong></h2>~
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
    <img src="images/runportugal.jpg" width="150" height="110" class="d-inline-block align-top slideanim" alt="" style="margin-bottom:10px;">
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACTO</h2>
  <div class="row">
    <div class="col-sm-5">
      <p><span class="glyphicon glyphicon-map-marker"></span> Porto, PT</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> helprunning@helprunning.com</p>
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
				<a target="_self" href="evento.php?ID=<?=$rowEvento ['id_evento']; ?>">
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