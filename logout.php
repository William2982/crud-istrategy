<?php
session_start();

// Destruir todas las sesiones
session_unset();
session_destroy();

// Eliminar cookies si existen
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    setcookie('username', '', time() - 3600, "/"); // Elimina la cookie estableciendo una expiración en el pasado
    setcookie('password', '', time() - 3600, "/");
}

// Redirigir al usuario a la página de inicio de sesión u otra página
header("location:index.php");
exit();
?>