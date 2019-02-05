<head>
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
	header ('Content-type: text/html; charset=utf-8'); 
    require('menulogged.php');
  ?>

<?php
// Initialize the session

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
    <br><br>
        <h1>Olá, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bem-vindo ao nosso site.</h1>
				<h3>Aqui encontra as provas em que está inscrito:</h3>
        

				<div class="container">       
      <table class="table table-hover table-bordered " style = "text-align: center; margin:0;">
        <?php
						$iduser = $_SESSION["id"];
            require_once "config.php";
            $sql = "select idprova, datainsc, idev from inscricoes where idutilizador = ".$iduser;
            $result = mysqli_query($conn, $sql);
            ?>
						<thead>
            <tr class="header">
                <td>Evento</td>
                <td>Prova</td>
                <td>Data</td>
                <td>Data Inscrição</td>
								<td>Detalhes</td>
            </tr>
						</thead>
						<tbody>
            <?php
               while ($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
									 echo "<td>".mysqli_fetch_array(mysqli_query($conn, "select desigancao from evento where ide = ".$row['idev']))['desigancao']."</td>";
									 echo "<td>".mysqli_fetch_array(mysqli_query($conn, "select designacao from prova where idp = ".$row['idprova']))['designacao']."</td>";
                   echo "<td>".mysqli_fetch_array(mysqli_query($conn, "select dataevento from evento where ide = ".$row['idev']))['dataevento']."</td>";
                   echo "<td>".$row['datainsc']."</td>";
                   echo "<td>
                   <form action=\"eventod.php\" method=\"post\">
                   <button name=\"detalhes\" type=\"submit\" class=\"btn btn-primary\" value=\"".$iduser."\">Detalhes</button>
                   </form>
                   </td>";
                   echo "</tr>";
               }

            ?>
						</tbody>
					</table>
      </div>




    </div>
		</body>

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