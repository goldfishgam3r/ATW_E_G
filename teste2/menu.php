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
		<li><a href="#services">Parcerias</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#partners">Causes</a></li>
      </ul>
		<?php } else { ?>
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
		</ul>
		<?php } ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>