<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_usuarios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// echo "Conectado con éxito";
?>