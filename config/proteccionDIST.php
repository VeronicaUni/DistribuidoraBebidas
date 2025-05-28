<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'distribuidor') {
    header("Location: ../auth/login.php");
    exit();
}
