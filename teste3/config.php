<?php
   define('BD_SERVER', 'localhost');
   define('BD_USERNAME', 'root');
   define('BD_PASSWORD', '');
   define('BD_DATABASE', 'atw3');
   $conn = mysqli_connect(BD_SERVER,BD_USERNAME,BD_PASSWORD,BD_DATABASE);
   mysqli_set_charset($conn, "utf8");
?>