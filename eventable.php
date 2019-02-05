<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Eventps</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
    <body>
        <?php
            require_once "config.php";
            $sql = "select ide, desigancao, local, categoria, dataevento, ativo, imagem from evento";
            $result = mysqli_query($conn, $sql);
            
        ?>
        <table class="striped">
            <tr class="header">
                <td>Id</td>
                <td>Nome</td>
                <td>Imagem</td>
                <td>Local</td>
                <td>Categoria</td>
                <td>Data</td>
                <td>Detalhes</td>
            </tr>
            <?php
               while ($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>".$row['ide']."</td>";
                   echo "<td>".$row['desigancao']."</td>";
                   echo "<td><img src=".$row['imagem']." alt=\"\" border=3 height=100 width=100></img></td>";
                   echo "<td>".$row['local']."</td>";
                   echo "<td>".$row['categoria']."</td>";
                   echo "<td>".$row['dataevento']."</td>";
                   echo "<td>
                   <form action=\"/eventod.php\" method=\"post\">
                   <button name=\"detalhes\" type=\"submit\" class=\"btn btn-primary\" value=\"".$row['ide']."\">Detalhes</button>
                   </form>
                   </td>";
                   echo "</tr>";
               }

            ?>
        </table>
    </body>
</html>