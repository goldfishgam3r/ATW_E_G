
 
<!DOCTYPE html>
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

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <?php
	header ('Content-type: text/html; charset=utf-8'); 
    require('menu.php');
    require("config.php");
    $idevento = $_POST['detalhes'];
    $iduser = $_SESSION["id"];
?>
    
  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>



<body>
    <div class="page-header">
    <br><br>
    <?php
            
            $sqlnome = "select desigancao from evento WHERE ide=".$idevento;
            $resulte = mysqli_query($conn, $sqlnome);
            $rowe = mysqli_fetch_array($resulte);
            ?>
    

        <h1>Evento: <?php echo $rowe['desigancao'] ?></h1>
        
    </div>
    <table class="table table-hover table-bordered " style = "text-align: center; margin:0;">
        <?php
            
            $sql = "select idp, designacao, hora, datalimite from prova WHERE idevento=".$idevento;
            $result = mysqli_query($conn, $sql);
            ?>
						<thead>
            <tr class="header">
                <td>Id Prova</td>
                <td>Nome da Prova</td>
                <td>Hora</td>
                <td>Data Limite de Inscrição</td>
            </tr>
						</thead>
						<tbody>
            <?php
               while ($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>".$row['idp']."</td>";
                   echo "<td>".$row['designacao']."</td>";
                   echo "<td>".$row['hora']."</td>";
                   echo "<td>".$row['datalimite']."</td>";
                   echo "</tr>";
               }

            ?>
						</tbody>
					</table>
        

    <div class="wrapper">

    

        <h2>Inscrição em prova</h2>
        <?php $_SESSION["loggedin"] = true;
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
                $sql1 = "SELECT idprova FROM inscricoes WHERE idev = ? AND  idutilizador = ?";
                
            
                if($stmt = mysqli_prepare($conn, $sql1)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "ss", $param_idev, $param_idutilizador);
                    
                    // Set parameters
                    $param_idev = $idevento;
                    $param_idutilizador = $iduser;
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            ?>
                            <p>Já se encontra inscrito numa prova deste evento.</p>
                            <form action="removeinscricao.php" method="post">
                            <div>
                
                                <input type="hidden" id="user" name="user" value=<?php echo $iduser; ?>>
                                <input type="hidden" id="evento" name="evento" value=<?php echo $idevento; ?>>
                
                            </div>
            
                            <div class="form-group">
                                <input type="submit" name="remove" class="btn btn-primary" value="Remover Inscrição">
                            </div>
                            </form>
                            <?php
                        } else{
                            ?>
                            <p>Selecione qual a prova na qual se deseja inscrever:</p>
                            <form action="addinscricao.php" method="post">
            
                                <div class="form-group <?php echo (!empty($prova_err)) ? 'has-error' : ''; ?>">
                                    <label>Selecionar prova:</label>
                                    <?php
        
                                    $sql = "select idp, designacao from prova WHERE idevento=".$idevento;
                                    $result3 = mysqli_query($conn, $sql);
    
                                    echo "<select name='prova'>";
                                    while ($row = mysqli_fetch_array($result3)) {
                                        echo "<option value='" .$row['idp']."'> ".$row['designacao'] . "</option>"; 
                                    }
                                    echo "</select>";
                                    ?>
                
                                </div>
                            <div>
                
                                <input type="hidden" id="user" name="user" value=<?php echo $iduser; ?>>
                                <input type="hidden" id="evento" name="evento" value=<?php echo $idevento; ?>>
                
                            </div>
            
                            <div class="form-group">
                                <input type="submit" name="Inscrever" class="btn btn-primary" value="Inscrever">
                            </div>
                        </form>
                        
            
              
                    <?php
                    }
                }
            }
            }   
            else
            {
                ?>
                <p>Faça login para se inscrever numa prova.</p>
                <?php
            }    
        ?>
    </div>    
</body>
</html>