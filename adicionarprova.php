<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$desigancaoe = $designacao = $hora = "";
$desigancaoe_err = $designacao_err = $hora_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 






// Validate designacao
if(empty(trim($_POST["designacao"]))){
    $designacao_err = "Por favor insira a designação da prova.";     
} else{
    $designacao = trim($_POST["designacao"]);
}

// Validate hora
if(empty(trim($_POST["hora"]))){
    $hora_err = "Por favor insira as horas da prova.";     
} else{
    $hora = trim($_POST["hora"]);
}

// Validate desigancaoe
if(empty(trim($_POST["ide"]))){
    $desigancaoe_err = "Por favor selecione um evento.";     
} else{
    $desigancaoe = trim($_POST["ide"]);
}


    
    // Check input errors before inserting in database
    if(empty($designacao_err) && empty($hora_err) && empty($desigancaoe_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO prova (designacao, hora, idevento) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_designacao, $param_hora, $param_desigancaoe);
            
            // Set parameters
            $param_designacao = $designacao;
            $param_hora = $hora;
            $param_desigancaoe = $desigancaoe;
            
            

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: adicionarprova.php");
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
    <title>Adicionar Prova</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Adicionar prova</h2>
        <p>Preencha todos os dados da prova.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
        <div class="form-group <?php echo (!empty($desigancaoe_err)) ? 'has-error' : ''; ?>">
                <label>Selecionar Evento</label>
                <?php
        
        $sql = "Select ide, desigancao from evento";
        $result = mysqli_query($conn, $sql);

        echo "<select name='ide'>";
        while ($row = mysqli_fetch_array($result)) {
           echo "<option value='" .$row['ide']."'> ".$row['desigancao'] . "</option>"; 
        }
        echo "</select>";
 ?>
                <span class="help-block"><?php echo $desigancaoe_err; ?></span>
            </div>     
            <div class="form-group <?php echo (!empty($designacao_err)) ? 'has-error' : ''; ?>">
                <label>Designação Prova</label>
                <input type="text" name="designacao" class="form-control" value="<?php echo $designacao; ?>">
                <span class="help-block"><?php echo $designacao_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($hora_err)) ? 'has-error' : ''; ?>">
                <label>Hora</label>
                <input type="time" name="hora" class="form-control" value="<?php echo $hora; ?>">
                <span class="help-block"><?php echo $hora_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>    
</body>
</html>