<?php
$servername = "localhost";
$database = "db_proyecto";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
//Verificamos conexión con la base de datos
if (!$conn) {
      die("La conexión ha fallado: " . mysqli_connect_error());
}
?>