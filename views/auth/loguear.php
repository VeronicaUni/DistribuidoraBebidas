<?php
session_start();
$usuario= $_POST['usuario'];
$clave= $_POST['contrasena'];

$_SESSION['rol'] = $usuario;

if ($_SESSION['rol'] !== "administrador" && $_SESSION['rol'] !== "distribuidor") {
    $_SESSION['vError'] = 'Usuario no válido'; 
    header("Location: ../../index.php");
    exit; 
}
else {
if ($_SESSION['rol'] === "administrador") {
    header("Location: ../admin/productos.php");
    exit();
} elseif ($_SESSION['rol'] === "distribuidor") {
    header("Location: ../distribuidor/bienvenida.php");
    exit();
} else {
	header("Location: ../../index.php");
    exit();
}	
}	

?>