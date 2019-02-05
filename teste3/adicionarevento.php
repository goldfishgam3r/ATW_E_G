<?php
// Include config file
require_once "config.php";
require("menu.php");
 
// Define variables and initialize with empty values
$desigancao = $local = $coordenadas = $categoria = $dataevento = $ativo = $imagem = "";
$desigancao_err = $local_err = $coordenadas_err = $categoria_err = $dataevento_err = $ativo_err = $imagem_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate desigancao
    if(empty(trim($_POST["desigancao"]))){
        $desigancao_err = "Escreva uma designação para o evento.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ide FROM evento WHERE desigancao = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_desigancao);
            
            // Set parameters
            $param_desigancao = trim($_POST["desigancao"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $desigancao_err = "Já existe um evento com esta designação.";
                } else{
                    $desigancao = trim($_POST["desigancao"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }





// Validate local
if(empty(trim($_POST["local"]))){
    $local_err = "Por favor insira o local.";     
} else{
    $local = trim($_POST["local"]);
}

// Validate coordenadas
if(empty(trim($_POST["coordenadas"]))){
    $coordenadas_err = "Por favor insira as coordenadas.";     
} else{
    $coordenadas = trim($_POST["coordenadas"]);
}

// Validate categoria
if(empty(trim($_POST["categoria"]))){
    $categoria_err = "Por favor insira uma categoria.";     
} else{
    $categoria = trim($_POST["categoria"]);
}


// Validate ativo
if(empty(trim($_POST["ativo"]))){
    $ativo_err = "Por favor selecione se é ou não ativo.";     
} else{
    $ativo = trim($_POST["ativo"]);
}



// Validate date
if(empty(trim($_POST["dataevento"]))){
    $dataevento_err = "Por favor insira a data do evento.";     
} else{
    $dataevento = trim($_POST["dataevento"]);
}

// Validate imagem
if(empty(trim($_POST["imagem"]))){
    $imagem = "images/default.png";     
} else{
    $imagem = trim($_POST["imagem"]);
}

    
    // Check input errors before inserting in database
    if(empty($desigancao_err) && empty($local_err) && empty($coordenadas_err) && empty($categoria_err) && empty($dataevento_err) && empty($ativo_err && empty($imagem_err))){
        
        // Prepare an insert statement
        $sql = "INSERT INTO evento (desigancao, local, coordenadas, categoria, dataevento, ativo, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_desigancao, $param_local, $param_coordenadas, $param_categoria, $param_dataevento, $param_ativo, $param_imagem);
            
            // Set parameters
            $param_desigancao = $desigancao;
            $param_local = $local;
            $param_coordenadas = $coordenadas;
            $param_categoria = $categoria;
            $param_dataevento = $dataevento;
            $param_ativo = $ativo;
            $param_imagem =  $imagem;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to same page
                header("location: adicionarevento.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Evento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
    <br>
        <h2>Adicionar evento</h2>
        <p>Preencha todos os dados do evento.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <div class="form-group <?php echo (!empty($desigancao_err)) ? 'has-error' : ''; ?>">
                <label>Designação</label>
                <input type="text" name="desigancao" class="form-control" value="<?php echo $desigancao; ?>">
                <span class="help-block"><?php echo $desigancao_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($local_err)) ? 'has-error' : ''; ?>">
                <label>Local</label>
                <input type="text" name="local" class="form-control" value="<?php echo $local; ?>">
                <span class="help-block"><?php echo $local_err; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($coordenadas_err)) ? 'has-error' : ''; ?>">
                <label>Coordenadas</label>
                <input type="text" name="coordenadas" class="form-control" value="<?php echo $coordenadas; ?>">
                <span class="help-block"><?php echo $coordenadas_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($categoria_err)) ? 'has-error' : ''; ?>">
                <label>Categoria</label>
                <input type="text" name="categoria" class="form-control" value="<?php echo $categoria; ?>">
                <span class="help-block"><?php echo $categoria_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($ativo_err)) ? 'has-error' : ''; ?>">
                <label>Ativo:<br></label>
                <input type="radio" name="ativo" value="1"> Sim<br>
                <input type="radio" name="ativo" value="2"> Não<br>
                <span class="help-block"><?php echo $ativo_err; ?></span>
            </div>  
            
            <div class="form-group <?php echo (!empty($dataevento_err)) ? 'has-error' : ''; ?>">
                <label>Data do Evento</label>
                <input type="date" name="dataevento" class="form-control" value="<?php echo $dataevento; ?>">
                <span class="help-block"><?php echo $dataevento_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($imagem_err)) ? 'has-error' : ''; ?>">
                <label>Imagem</label>
                <input type="text" name="imagem" class="form-control" value="<?php echo $imagem; ?>">
                <span class="help-block"><?php echo $imagem_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>    
</body>
</html>