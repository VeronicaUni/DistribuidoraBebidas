<?php
session_start();         // Iniciar sesión si no lo estaba
session_unset();         // Eliminar todas las variables de sesión
session_destroy();       // Destruir la sesión

// Redirigir al login
header("Location: login.php");
exit();