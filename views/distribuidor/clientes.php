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
            $titulo = "Módulo de Cliente";
            $icono = "../../assets/images/Icon-Productos.png";
            include '../components/title.php';
            ?>
        </div>
        <div class="down">
            <div class="search">
                <div class="search1">
                    <div>
                        <?php
                        $placeholder = "Buscar Cliente (Nombre o Cédula)";
                        include '../components/searchbar.php';
                        ?>
                    </div>
                    <div class="button">
                    <div>
                        <?php
                        $texto = "Registrar Cliente";
                        $color = "btn-primary";
                        $action = "create";
                        $module = 'pedidos';
                        $pedidoData = "{}";
                        include '../components/button.php';
                        ?>
                    </div>
                </div>
                </div>
                <div class="button">
                    
                </div>
            </div>
            <div>
                <?php
                $module = 'clientes';
                $columnas = ["Código", "Razón Social", "Nombre Cliente", "Cédula", "Teléfono", "Dirección Empresa", "Correo Electronico"];
                $datos = [
                        ["001", "Estanco la 21", "Marcos Solarte", "1056788409", "3203445687", "Calle 10 # 23-45", "marcos@gmail.com"],
                        ["002", "Supermercado El Sol", "Andrea Pérez", "1002345678", "3105678901", "Carrera 12 # 34-56", "andrea@gmail.com"],
                        ["003", "Licorera San Juan", "Carlos Rodríguez", "1034567890", "3112345678", "Avenida 5 # 67-89", "carlos@gmail.com"],
                        ["004", "Tienda La Esquina", "Luisa Fernández", "1012345678", "3123456789", "Calle 8 # 45-67", "luisa@gmail.com"],
                        ["005", "Minimarket Express", "Pedro Gómez", "1023456789", "3134567890", "Carrera 15 # 78-90", "pedro@gmail.com"],
                        ["006", "Bodega Central", "Ana Martínez", "1045678901", "3145678901", "Calle 20 # 56-78", "ana@gmail.com"],   
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