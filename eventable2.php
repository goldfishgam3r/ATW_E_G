<?php
header ('Content-type: text/html; charset=utf-8'); 
require("config.php");

$queryevento= "SELECT * FROM evento WHERE ide=1";
$resultevento= mysqli_query($conn, $queryevento);

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
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
                   <form action=\"/eventod.php\" method=\"post\">
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
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>Lorem ipsum</h5>
        <address>
  <strong>Twitter, Inc.</strong><br>
  795 Folsom Ave, Suite 600<br>
  San Francisco, CA 94107<br>
  <abbr title="Phone">P:</abbr> (123) 456-7890
</address>

<address>
  <strong>Full Name</strong><br>
  <a href="mailto:#">first.last@example.com</a>
</address>
        <h5>Lorem ipsum dolor</h5>
        <form class="form-inline">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail3">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
  </div>
 <button type="submit" class="btn btn-default">Sign in</button>
</form>
      </div>
      <div class="col-md-4">
        <h5>Lorem ipsum</h5>
        <img src="http://placehold.it/360x200" class="img-responsive" alt="" />
        <small>Lorem ipsum dolor sit amet, consectetur.</small>
        
      </div>
      <div class="col-md-4">
        <h5>Lorem ipsum</h5>
        <form>
 <div class="form-group">
   <textarea class="form-control" rows="3"></textarea>
  </div>
<div class="form-group">
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Your name">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your E-mail">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
      </div>
    </div>
    
    <div class="row">
    <div class="col-md-6"><p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small></p></div>
      <div class="col-md-6 text-right"><p><small>Lorem ipsum <a href="">Dolor sit amet</a></small></p></div>
  </div>
  </div>
  
</footer>