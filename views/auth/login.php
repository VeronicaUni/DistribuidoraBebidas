<!DOCTYPE html>
<html lang="es">
<?php include '../partials/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Distribución Express</title>
    <link rel="stylesheet" href="../../assets/css/login.css">
</head>

<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form onsubmit="redirigir(event)">
            <div class="input-group">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="input-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="login-btn">Ingresar</button>
        </form>
    </div>
</body>
<!-- Este parte redirige la vista a administrador o distribuidor -->
<!-- Nota: solo colocar el usuario administrador o distribuidor y la contraseña cualquier cosa -->
<script>
    function redirigir(event) {
        event.preventDefault(); // Evita que el formulario se envíe
        let usuario = document.getElementById("usuario").value.toLowerCase();

        if (usuario === "administrador") {
            sessionStorage.setItem("rol", "administrador");
            window.location.href = "../admin/productos.php";
        } else if (usuario === "distribuidor") {
            sessionStorage.setItem("rol", "distribuidor");
            window.location.href = "../distribuidor/bienvenida.php";
        } else {
            alert("Usuario no válido");
        }
    }
</script>
</html>