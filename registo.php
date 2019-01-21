<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = $confirm_password = $nif = $cc = $datan = $nome = $telf = $morada = $nac = $genero = $ativo = $federado = $tamanho = "";
$email_err = $password_err = $confirm_password_err = $nif_err = $cc_err = $datan_err = $nome_err = $telf_err = $morada_err = $nac_err = $genero_err = $ativo_err = $federado_err = $tamanho_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an e-mail.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This e-mail is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate name
    if(empty(trim($_POST["nome"]))){
        $nome_err = "Por favor insira o seu nome.";     
    } else{
        $nome = trim($_POST["nome"]);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    //Validate NIF
    if(empty(trim($_POST["nif"]))){
        $nif = "999999990";
    } elseif(strlen(trim($_POST["nif"])) == 9 && ctype_digit($nif)){
        $nif = trim($_POST["nif"]);
    } else{
        $nif_err = "NIF inválido, por favor verifique.";
    }

    //Validate CC
    if(!empty(trim($_POST["cc"]))){
        if(strlen(trim($_POST["cc"])) == 8 && ctype_digit($cc)){
            $nif = trim($_POST["cc"]);
        }else{
            $cc_err = "Nº civil inválido, por favor verifique.";
        }
    }else{
        $cc_err = "Insira por favor o Nº Civil.";
    }
    
    // Validate phone
    if(empty(trim($_POST["telf"]))){
        $telf_err = "Por favor insira um número de telefone.";     
    } elseif(strlen(trim($_POST["telf"])) != 9 || !ctype_digit($telf)){
        $telf_err = "O Nº de telefone inserido não é válido.";
    } else{
        $telf = trim($_POST["telf"]);
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                <label>Nome*</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
                <span class="help-block"><?php echo $nome_err; ?></span>
            </div>   

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>E-Mail*</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>   

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password*</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password*</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($nif_err)) ? 'has-error' : ''; ?>">
                <label>NIF</label>
                <input type="text" name="nif" class="form-control" value="<?php echo $nif; ?>">
                <span class="help-block"><?php echo $nif_err; ?></span>
            </div>   

            <div class="form-group <?php echo (!empty($cc_err)) ? 'has-error' : ''; ?>">
                <label>Nº Civil*</label>
                <input type="text" name="cc" class="form-control" value="<?php echo $cc; ?>">
                <span class="help-block"><?php echo $cc_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($datan_err)) ? 'has-error' : ''; ?>">
                <label>Data de Nascimento*</label>
                <input type="date" name="datan" class="form-control" value="<?php echo $datan; ?>">
                <span class="help-block"><?php echo $datan_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($telf_err)) ? 'has-error' : ''; ?>">
                <label>Telefone*</label>
                <input type="tel" name="telf" class="form-control" value="<?php echo $telf; ?>">
                <span class="help-block"><?php echo $cc_telf; ?></span>
            </div>  

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>

            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>