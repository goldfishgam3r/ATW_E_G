<?php
header ('Content-type: text/html; charset=utf-8'); 
require("config.php");

$queryevento= "SELECT * FROM evento WHERE ide=1";
$resultevento= mysqli_query($conn, $queryevento);

?>
<html>
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
<body>
<!-- Navbar -->    
<?php
require('menu.php');
?>
<!--  Jumbotron  -->
    <div class="jumbotron">
      <div class="container">       
      <table class="table table-hover table-bordered " style = "text-align: center; margin:0;">
        <?php
            require_once "config.php";
            $sql = "select ide, desigancao, local, categoria, dataevento, ativo, imagem from evento";
            $result = mysqli_query($conn, $sql);
            ?>
						<thead>
            <tr class="header">
                <td>Id</td>
                <td>Nome</td>
                <td>Imagem</td>
                <td>Local</td>
                <td>Categoria</td>
                <td>Data</td>
                <td>Detalhes</td>
            </tr>
						</thead>
						<tbody>
            <?php
               while ($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>".$row['ide']."</td>";
                   echo "<td>".$row['desigancao']."</td>";
                   echo "<td><img src=".$row['imagem']." alt=\"\" border=3 height=100 width=100></img></td>";
                   echo "<td>".$row['local']."</td>";
                   echo "<td>".$row['categoria']."</td>";
                   echo "<td>".$row['dataevento']."</td>";
                   echo "<td>
                   <form action=\"eventod.php\" method=\"post\">
                   <button name=\"detalhes\" type=\"submit\" class=\"btn btn-primary\" value=\"".$row['ide']."\">Detalhes</button>
                   </form>
                   </td>";
                   echo "</tr>";
               }

            ?>
						</tbody>
					</table>
      </div>
    </div>

<!-- Footer -->

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