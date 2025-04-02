<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo time(); ?>">
    <?php include '../partials/header.php'; ?>
    <script>
        function updateDateTime() {
            const now = new Date();
            const date = now.toLocaleDateString('es-ES', { year: 'numeric', month: 'long', day: 'numeric' });
            const time = now.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit', hour12: false });
            document.getElementById('date-time').innerHTML = `${date} ${time}`;
        }
        setInterval(updateDateTime, 1000);
    </script>
</head>

<body>
    <!-- Barra lateral -->
    <?php include '../partials/sidebar.php'; ?>

    <!-- Contenido principal -->
    <div class="container-right">
        <!-- Sección de bienvenida -->
        <div class="welcome-view">
            <div id="date-time" class="date-time-box"></div>
            <h2 class="welcome-text">Bienvenido, usted se encuentra en el panel de control de Distribuidor</h2>
            <div class="welcome-image">
                <img src="../../assets/images/Image-Bienvenida.png" alt="Distribuidor">
            </div>
        </div>
    </div>
</body>


</html>
