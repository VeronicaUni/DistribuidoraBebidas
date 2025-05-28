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
        <!-- ESTE ES UN COMPONENTE QUE SE CREO PARA TITULO, recuerden que la variable se coloca al principio y despues se llama -->
        <div class="up">
            <?php
            $titulo = "Módulo de Ventas";
            $icono = "../../assets/images/Icon-PedidoVentas.png";
            include '../components/title.php';
            ?>
        </div>

        <div class="down">
            <!-- Barra de búsqueda y filtros -->
            <div class="search">
                <div class="search1">
                    <div>
                        <?php
                        $placeholder = "Buscar Venta...";
                        include '../components/searchbar.php';
                        ?>
                    </div>
                    <div>
                        <?php
                        $opciones = ["Tipo de Venta", "Venta en efectivo", "Venta a crédito"];
                        include '../components/dropdown.php';
                        ?>
                    </div>
                </div>
                <div class="button">
                    <div>
                        <?php
                        $texto = "Registrar Venta";
                        $color = "btn-primary";
                        $action = "create";
                        $module = "ventas";
                        $productData = "{}"; // Para indicar que es una nueva venta
                        include '../components/button.php';
                        ?>
                    </div>
                </div>
            </div>

            <div>
                <?php
                // Datos de ejemplo de ventas
                $module = 'ventas';
                $columnas = ["Fecha", "Producto", "Cantidad", "Precio", "Total", "Vendedor"];
                $datos = [
                    ["2025-04-01", "Aguardiente Caucano 1L", 3, 45000, 135000, "Carlos Pérez"],
                    ["2025-04-02", "Cerveza Poker", 10, 3000, 30000, "Ana Gómez"],
                    ["2025-04-02", "Aguardiente Caucano 1L", 2, 45000, 90000, "Carlos Pérez"],
                    ["2025-04-03", "Cerveza Poker", 5, 3000, 15000, "Luis Fernández"],
                    ["2025-04-03", "Aguardiente Caucano 1L", 4, 45000, 180000, "Ana Gómez"],
                    ["2025-04-03", "Cerveza Poker", 8, 3000, 24000, "Carlos Pérez"]
                ];
                // Definir acciones con imágenes
                $actions = [
                    'view' => '../../assets/images/Icon-Informacion.png',
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
