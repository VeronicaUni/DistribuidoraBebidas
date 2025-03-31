<?php
session_start();
$usuario = $_SESSION['usuario'];

if (!isset($usuario)){
header('location: ../../index.php');
}else{

session_start();

session_destroy();

header('location: ../../index.php');
exit();
}
?>