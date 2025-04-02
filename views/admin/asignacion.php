<?php
$idDistribuidor = $_GET['id'] ?? null;
$nombreDistribuidor = $_GET['nombre'] ?? 'Desconocido';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo time(); ?>">
    <?php include '../partials/header.php'; ?>
</head>

<body>
    <!-- Barra lateral -->
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
             <div class="subtitulo">Distribuidor: <?php echo htmlspecialchars($nombreDistribuidor); ?></div>
        </div>

        <div class="down">
            <!-- Barra de búsqueda y filtros -->
            <div class="search">
                <div class="search1">
                    <div>
                        <?php
                        $opciones = ["Productos", "Aguardiente Caucano 1L", "Cerveza Poker", "Aguardiente Caucano 1L", "Cerveza Poker"];
                        include '../components/dropdown.php';
                        ?>
                    </div>
                    <div></div>
                    <div>
                        <?php
                        $placeholder = "Cantidad";
                        include '../components/searchbar.php';
                        ?>
                    </div>
                </div>
                <div class="button">
                    <div>
                        <?php
                        $texto = "Asignar Producto";
                        $color = "btn-primary";
                        $productData = "{}";
                        include '../components/button.php';
                        ?>
                    </div>
                </div>
            </div>

            <div>
                <?php
                // Datos de ejemplo para asignación de productos
                $module = 'asignacion_productos';
                $columnas = ["ID Producto", "Nombre Producto", "Cantidad"];
                $datos = [
                    ["001", "Laptop HP", "5"],
                    ["002", "Aspiradora", "3"],
                    ["003", "Camiseta Nike", "10"],
                    ["004", "Cereal Kellogg's", "20"],
                    ["005", "Smartphone Samsung", "4"]
                ];
                // Definir acciones con imágenes
                $actions = [
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
