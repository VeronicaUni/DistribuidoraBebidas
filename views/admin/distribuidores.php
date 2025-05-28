<?php require_once '../../config/proteccionADMIN.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo time(); ?>">
    <?php include '../partials/header.php'; ?>
</head>

<body>
    <!-- ESTA PARTE ES LA BARRA LATERAL QUE ES UN PARTIALS -->
    <div class="container-left">
        <?php include '../partials/sidebar.php'; ?>
    </div>

    <div class="container-right">
        <!-- ESTE ES UN COMPONENTE QUE SE CREO PARA TITULO, recuerden que la variable se coloca al principio y después se llama -->
        <div class="up">
            <?php
            $titulo = "Módulo de Distribuidores";
            $icono = "../../assets/images/Icon-ClienteDistribuidor.png";
            include '../components/title.php';
            ?>
        </div>

        <div class="down">
            <!-- Barra de búsqueda y filtros -->
            <div class="search">
                <div class="search1">
                    <div>
                        <?php
                        $placeholder = "Buscar Distribuidor...";
                        include '../components/searchbar.php';
                        ?>
                    </div>
                    <div>
                        <?php
                        $opciones = ["Zona de trabajo", "Norte", "Sur", "Este", "Oeste"];
                        include '../components/dropdown.php';
                        ?>
                    </div>
                </div>
                <div class="button">
                    <div>
                        <?php
                        $texto = "Registrar Distribuidor";
                        $color = "btn-primary";
                        $action = "create";
                        $module = "distribuidores";
                        $productData = "{}"; // Para indicar que es un nuevo distribuidor
                        include '../components/button.php';
                        ?>
                    </div>
                </div>
            </div>

            <div>
                <?php
                // Datos de ejemplo de distribuidores
                $module = 'distribuidores';
                $columnas = ["Identificación", "Nombre", "Correo Electrónico", "Celular", "Zona de trabajo"];
                $datos = [
                    ["123456789", "Carlos Pérez", "carlos@example.com", "3101234567", "Norte"],
                    ["987654321", "Ana Gómez", "ana@example.com", "3107654321", "Sur"],
                    ["111223344", "Luis Fernández", "luis@example.com", "3111234987", "Este"],
                    ["443322110", "María Rodríguez", "maria@example.com", "3128765432", "Oeste"],
                    ["556677889", "Juan Sánchez", "juan@example.com", "3137896541", "Norte"]
                ];
                // Definir acciones con imágenes
                $actions = [
                    'assign' => '../../assets/images/Icon-AsignacionProductos.png',
                    'edit' => '../../assets/images/Icon-Actualizar.png',
                    'delete' => '../../assets/images/Icon-Eliminar.png'
                ];
                include '../components/table.php';
                ?>
            </div>
        </div>
    </div>

    <?php include '../components/modal.php'; ?>
    <script src="../../assets/js/modal.js"></script>
</body>

</html>
