<?php require_once '../../config/proteccionDIST.php'; ?>
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
            $titulo = "Módulo de Productos";
            $icono = "../../assets/images/Icon-Productos.png";
            include '../components/title.php';
            ?>
        </div>
        <div class="down">
            <div class="search">
                <div class="search1">
                    <div>
                        <?php
                        $placeholder = "Buscar Producto...";
                        include '../components/searchbar.php';
                        ?>
                    </div>
                    <div>
                        <?php
                        $opciones = ["Tipo de Producto", "Cerveza", "Licor", "Refresco"];
                        include '../components/dropdown.php';
                        ?>
                    </div>
                </div>
                <div class="button">
                    
                </div>
            </div>
            <div>
                <?php
                $module = 'productos';
                $columnas = ["Nombre", "Tipo de bebida", "Cantidad", "Precio", "Proveedor"];
                $datos = [
                    ["Aguardiente Caucano 1L", "Licor", 20, 45000, "Cauca"],
                    ["Cerveza Poker", "Cerveza", 50, 3000, "Bavaria"],
                    ["Aguardiente Caucano 1L", "Licor", 20, 45000, "Cauca"],
                    ["Cerveza Poker", "Cerveza", 50, 3000, "Bavaria"],
                    ["Aguardiente Caucano 1L", "Licor", 20, 45000, "Cauca"],
                    ["Aguardiente Caucano 1L", "Licor", 20, 45000, "Cauca"],
                    ["Cerveza Poker", "Cerveza", 50, 3000, "Bavaria"],
                    ["Aguardiente Caucano 1L", "Licor", 20, 45000, "Cauca"],
                    ["Cerveza Poker", "Cerveza", 50, 3000, "Bavaria"],
                    ["Aguardiente Caucano 1L", "Licor", 20, 45000, "Cauca"],
                ];
                // Definir acciones con imágenes
                $actions = [
                    'view' => '../../assets/images/Icon-Informacion.png',
                    
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