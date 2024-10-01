<?php  
$servername = "localhost";
$username = "root";
$password = "";
$database = "en_linea";

//crear conexion
$conn = new mysqli($servername, $username, $password, $database);

//chequeo de conexion
if ($conn->connect_error){
    die("Conexion fallida: " . $conn->connect_error);
}

?>