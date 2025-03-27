<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Ventas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo time(); ?>">
    <?php include '../partials/header.php'; ?>
</head>

<body>
    <!-- Barra lateral -->
    <div class="container-left">
        <?php include '../partials/sidebar.php'; ?>
    </div>
    
    <div class="container-right">
        <!-- Encabezado con título -->
        <div class="up">
            <?php
            $titulo = "Módulo de Ventas";
            $icono = "../../assets/images/Icon-Ventas.png"; // Asegúrate de tener este icono
            include '../components/title.php';
            ?>
        </div>
        
        <div class="down">
            <!-- Barra de búsqueda -->
            <div class="search">
                <div class="search1">
                    <div>
                        <?php
                        $placeholder = "Buscar Código de Venta...";
                        include '../components/searchbar.php';
                        ?>
                    </div>
                    <div>
                        <?php
                        $opciones = ["Todos los productos", "Aguardiente", "Cerveza", "Refresco"];
                        include '../components/dropdown.php';
                        ?>
                    </div>
                    <div>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                </div>
                <div class="button">
                    <div>
                        <?php
                        $texto = "Nueva Venta";
                        $color = "btn-primary";
                        $action = "create";
                        $ventaData = "{}";
                        include '../components/button.php';
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Tabla de ventas -->
            <div>
                <?php
                $columnas = ["Cédula", "Nombre de distribuidor", "Producto Vendido", "Nombre de cliente", "Cantidad", "Fecha", "Acciones"];
                $datos = [
                    ["1003456548", "José Eduardo Narváez", "Aguardiente Caucano IL", "Manuel Cordoba", 20, "10/05/2025"],
                    ["1003456548", "José Eduardo Narváez", "Manzana postobon 1.5 Lt", "José Luis Manzano", 15, "10/05/2025"],
                    ["1003456548", "José Eduardo Narváez", "Manzana postobon 1.5 Lt", "Manuel Cordoba", 23, "10/05/2025"],
                    ["1003456548", "José Eduardo Narváez", "Cerveza Poker 12oz", "Carlos Andrés López", 30, "09/05/2025"],
                    ["1003456548", "José Eduardo Narváez", "Ron Medellín 750ml", "Ana María García", 8, "08/05/2025"]
                ];
                
                // Definir acciones con íconos de Bootstrap
                $actions = [
                    'edit' => '<i class="bi bi-pencil"></i>',
                    'delete' => '<i class="bi bi-trash"></i>',
                    'view' => '<i class="bi bi-eye"></i>'
                ];
                
                include '../components/table.php';
                ?>
            </div>
        </div>
    </div>
    
    <?php include '../components/modal.php'; ?>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/modal.js"></script>
    
    <!-- Script para acciones -->
    <script>
        // Función para manejar las acciones de los botones
        document.addEventListener('DOMContentLoaded', function() {
            // Botones de editar
            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', function() {
                    alert('Función de editar venta');
                });
            });
            
            // Botones de eliminar
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    if(confirm('¿Está seguro de eliminar esta venta?')) {
                        alert('Venta eliminada (simulación)');
                        // En implementación real, aquí iría la lógica para eliminar
                    }
                });
            });
            
            // Botones de ver
            document.querySelectorAll('.btn-view').forEach(btn => {
                btn.addEventListener('click', function() {
                    alert('Mostrando detalles de la venta');
                });
            });
        });
    </script>
</body>

</html>