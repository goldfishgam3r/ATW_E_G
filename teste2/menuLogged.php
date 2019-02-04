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
		<?php if(strcmp($tipoUser, "org")==0) { ?>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Causes<span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="welcome.php">Procurar Eventos</a></li>
				<li><a href="criarEvento.php">Criar Evento</a></li>
				<li><a href="gerirEvento.php">Gerir Evento</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="criarprova.php">Criar Provas</a></li>
			  </ul>
			</li>
		<?php } ?>
		<?php if(strcmp($tipoUser, "user")==0) { ?>
			<li class="dropdown">
			  <a href="CriarProduto.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Donate<span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="criarProduto.php">Donate Product</a></li>
				<li><a href="gerirProduto.php">Manage Products</a></li>
			  </ul>
			</li>
		<?php } ?>
		<li><a href="profile.php?ID=<?=$idUser?>">Profile</a></li>	
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>  <?php echo'Logout (' .$user.')'; ?> </a></li>
      </ul>
    </div>
  </div>
</nav>