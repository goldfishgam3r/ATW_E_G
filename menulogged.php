<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="welcome.php"></a>
        <img src="images/logoHR.png" width="49" height="49" class="d-inline-block align-top" alt="" style="margin-bottom:10px;">
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#sobre">Sobre</a></li>
          <li><a href="#contact">Contact</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Causes<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="welcome.php">Eventos</a></li>
            <li><a href="criarEvento.php">Adicionar Eventos</a></li>
            <li><a href="gerirEvento.php">Manage Causes</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="myProduto.php">Donated Products</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
          
          if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            ?>
          <li><a href="welcome.php"><?php echo($_SESSION["username"])?></a></li>
          <li><a href="logout.php">Logout</a></li>
          <?php
          }else{
            ?>
          <?php
          }
          ?>
          
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>