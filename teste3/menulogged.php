<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container-fluid menuCont">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="welcome.php">
		<img src="images/Redh.png" width="49" height="49" class="d-inline-block align-top" alt="">
	  </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			if (strpos($url,'welcome.php') !== false) { ?>

        <li><a href="#about">Sobre Nós</a></li>
		<li><a href="#partners">Parcerias</a></li>
        <li><a href="#contact">Contactos</a></li>
		<?php } ?>
        <li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Causes<span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="welcome.php">Search Causes</a></li>
				<li><a href="criarEvento.php">Create Causes</a></li>
				<li><a href="gerirEvento.php">Manage Causes</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="myProduto.php">Donated Products</a></li>
			  </ul>
        </li>
    </div>
</nav>