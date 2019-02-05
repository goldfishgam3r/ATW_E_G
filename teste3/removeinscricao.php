   <?php
    
    require("config.php");

 
// Define variables and initialize with empty values

$iduser = $_POST['user'];
$idevento = $_POST['evento'];





    
    // Check input errors before inserting in database

        
        // Prepare an insert statement
        $sql = "DELETE FROM inscricoes WHERE idutilizador = ? AND idev = ?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_idutilizador, $param_idev);
            
            // Set parameters
            $param_idutilizador = $iduser;
            $param_idev = $idevento;
            
            

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: eventable3.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    
    
    // Close connection
    mysqli_close($conn);


?>