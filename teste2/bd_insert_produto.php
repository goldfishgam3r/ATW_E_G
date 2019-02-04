<?php
$pasta = "images/";
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["ficheiro"]["name"]);
$nome_imagem = basename($_FILES["ficheiro"]["name"]);
$query1 = "INSERT INTO produto (nome, descricao, id_evento, id_categoria, id_utilizador, quantidade, imagem, estado, delivery) VALUES ('$_POST[productName]','$_POST[productDescription]','$_POST[productCause]','$_POST[productCategoria]','$idUser','$_POST[productQuantity]','$nome_imagem','1','0')";
$uploadOk = 1;
$creationSuccess = 0;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Verificar se é uma imagem
//if(isset($_POST["enviar"])) {
    $check = getimagesize($_FILES["ficheiro"]["tmp_name"]);
    if($check !== false) {
        //echo "O ficheiro é uma imagem - " . $check["mime"] . ".";
		echo "1";
        $uploadOk = 1;
    } else {
        //echo "O ficheiro não é uma imagem.";
        $uploadOk = 0;
		echo "2";
    }
//}
// Verificar se já existe 
if (file_exists($target_file)) {
    //echo "<script type='text/javascript'>alert('File name already exists!')</script>";
    $uploadOk = 0;
	echo "3";
}
// Verificar o tamanho da imagem
if ($_FILES["ficheiro"]["size"] > 8000000) {
    //echo "<script type='text/javascript'>alert('File size to big!')</script>";
    $uploadOk = 0;
	echo "4";
}
// Verificação das extensões das imagens 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "O tipo de ficheiro é inválido só JPG, JPEG, PNG & GIF é que são possiveis.";
    $uploadOk = 0;
}
// Verificar $uploadOk se está a 0, ou seja encontrou alguma exceçao
if ($uploadOk == 1) {
// Faz upload do ficheiro
    if (move_uploaded_file($_FILES["ficheiro"]["tmp_name"], $target_file)) {		
    } else {
        $uploadOk = 0;
		echo "5";
    }
}
//echo"Causa:". $_POST['productCause']. "   categoria". $_POST['productCategoria'];
//die;
	
//verificar a conexão
if(!$conn || $uploadOk == 0)
	{
		die(mysqli_connect_error());
		
	}
//Aplicar a query dependendo da condição
elseif(mysqli_query($conn,$query1))
	{
		echo "<script type='text/javascript'>alert('Registration submitted successfully!')</script>";
		$creationSuccess = 1;
	}
else
	{
		echo "<script type='text/javascript'>alert('Registration failed, try again.')</script>";

	}
	
mysqli_close($conn);

?>