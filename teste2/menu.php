<nav class="navbar navbar-fixed-top navbar-inverse" style = "margin-bottom:100px;">
  <div class="container-fluid menuCont">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">
		<img src="images/INEM_Logo.png" width="49" height="49" class="d-inline-block align-top" alt="" style="margin-bottom:10px;">
	  </a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
	<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		if (strpos($url,'index.php') !== false) { ?>
      <ul class="nav navbar-nav">
		<li><a href="#about">Sobre Nós</a></li>
		<li><a href="#services">Partners</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#partners">Causes</a></li>
      </ul>
		<?php } else { ?>
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
		</ul>
		<?php } ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a data-toggle="modal" href="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="registerFinal.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!-- <div class="modalh modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		 <img src="images/solidar2.jpg" alt="Norway">  
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
		</div>
		-->
      <div class="modal-body">
        <div class="container">
		  <div class="row" >
			<div class="main">
			  <h3>Sign Up</h3>
			  
			  </div>
			  
			  <div class="login-or">
				<hr class="hr-or">
				<span class="span-or">or</span>
			  </div>

			  <form action="bd_login.php" method="post" role="form">
				<div class="form-group">
				  <label for="inputUsernameEmail">Username or email</label>
				  <input type="text" class="form-control" id="inputUsernameEmail" name= "usernameLogin">
				</div>
				<div class="form-group">
				  <a class="pull-right" href="#">Forgot password?</a>
				  <label for="inputPassword">Password</label>
				  <input type="password" class="form-control" id="inputPassword"name= "passwordLogin">
				</div>
				<div class="checkbox pull-right">
				  <label>
					<input type="checkbox">
					Remember me </label>
				</div>
				<button type="submit" class="btn btn btn-primary" name="login">
				  Log In
				</button>
			  </form>
			
			</div>
			
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>