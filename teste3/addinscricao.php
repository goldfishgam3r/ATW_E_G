   <?php
    
    require("config.php");

 
// Define variables and initialize with empty values
$prova = $prova_err = "";
$iduser = $_POST['user'];
$idevento = $_POST['evento'];
 
// Processing form data when form is submitted

 






// Validate designacao
if(empty(trim($_POST["prova"]))){
    $prova_err = "Por favor selecione uma prova.";     
} else{
    $prova = trim($_POST["prova"]);
}




    
    // Check input errors before inserting in database
    if(empty($prova_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO inscricoes (idutilizador, idprova, datainsc, idev) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_idutilizador, $param_idprova, $param_datainsc, $param_idev);
            
            // Set parameters
            $param_idutilizador = $iduser;
            $param_idprova = $prova;
            $param_datainsc = date_create()->format('Y-m-d');
            $param_idev = $idevento;
            
            

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: pesquisaevento.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);


?>