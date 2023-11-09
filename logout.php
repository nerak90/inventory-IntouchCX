<?php
session_start();

// Elimina todas las variables de sesión
$_SESSION = array();

// Destruye la sesión actual
session_destroy();

// Redirige a la página de inicio de sesión
header('Location: login.php'); // Reemplaza '/php-login' con la ruta correcta
exit;
?>
