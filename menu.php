<!-- Navbar -->    
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Help Running</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="sobre.html">Sobre</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
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
      </div><!--/.nav-collapse -->
    </div>
  </nav>