<?php
if (isset($_SESSION['usuario'])) {
    // Mostrar lista de usuarios
    include 'crud.php';
} else {
    // Mostrar formulario de inicio de sesión
    include 'login.php';
}
?>