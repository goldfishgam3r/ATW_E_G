<nav class="navbar navbar-fixed-top navbar-inverse" style = "margin-bottom:100px;">
  <div class="container-fluid menuCont">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">
		<img src="images/logoHR.png" width="49" height="49" class="d-inline-block align-top" alt="" style="margin-bottom:10px;">
	  </a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
	<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		if (strpos($url,'index.php') !== false) { ?>
      <ul class="nav navbar-nav">
		<li><a href="#about">Sobre Nós</a></li>
		<li><a href="#partners">Parcerias</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
		<?php } else { ?>
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
		</ul>
		<?php } ?>
      <ul class="nav navbar-nav navbar-right">
      <?php
          session_start();
          if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            ?>
          <li><a href="welcome.php"><?php echo($_SESSION["username"])?></a></li>
          <li><a href="logout.php">Logout</a></li>
          <?php
          }else{
            ?>
             <li><a>Visitante</a></li>
          <li><a href="login.php">Login</a></li>
          <?php
          }
          ?>
      </ul>
    </div>
  </div>
</nav>