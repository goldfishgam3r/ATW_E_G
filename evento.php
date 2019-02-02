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
require('carousel.php');
?>
<!--  Jumbotron  -->
    <div class="jumbotron">
      <div class="container">       
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
                        $count= 1;
							for ($i = 0; $i < $count; $i++) {
								$rowevento = mysqli_fetch_array ($resultevento);						
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