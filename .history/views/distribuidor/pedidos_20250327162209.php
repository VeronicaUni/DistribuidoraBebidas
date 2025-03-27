<?php
// Conexión a la base de datos
require_once 'conexion.php';

// Número de registros por página
$registros_por_pagina = 10;

// Obtener el número de página actual
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina > 1) ? ($pagina * $registros_por_pagina - $registros_por_pagina) : 0;

// Variables de búsqueda
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';

// Consulta SQL con filtros de búsqueda
$sql = "SELECT SQL_CALC_FOUND_ROWS v.*, 
               d.nombre AS nombre_distribuidor, 
               p.nombre AS nombre_producto,
               c.nombre AS nombre_cliente
        FROM ventas v
        JOIN distribuidores d ON v.id_distribuidor = d.id
        JOIN productos p ON v.id_producto = p.id
        JOIN clientes c ON v.id_cliente = c.id
        WHERE (d.nombre LIKE '%$busqueda%' OR 
               p.nombre LIKE '%$busqueda%' OR 
               c.nombre LIKE '%$busqueda%' OR 
               v.cedula LIKE '%$busqueda%')";

if(!empty($fecha)) {
    $sql .= " AND v.fecha = '$fecha'";
}

$sql .= " LIMIT $inicio, $registros_por_pagina";

$resultado = $conexion->query($sql);
$ventas = $resultado->fetch_all(MYSQLI_ASSOC);

// Obtener total de registros para paginación
$total_registros = $conexion->query("SELECT FOUND_ROWS()")->fetch_array()[0];
$total_paginas = ceil($total_registros / $registros_por_pagina);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .search-box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .table-actions {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Módulo de Ventas</h2>
        
        <!-- Barra de búsqueda -->
        <div class="search-box">
            <form method="get" class="row g-3">
                <div class="col-md-6">
                    <label for="busqueda" class="form-label">Buscar Venta</label>
                    <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Código, distribuidor, producto o cliente" value="<?= htmlspecialchars($busqueda) ?>">
                </div>
                <div class="col-md-4">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?= htmlspecialchars($fecha) ?>">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabla de ventas -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre de distribuidor</th>
                        <th>Producto Vendido</th>
                        <th>Nombre de cliente</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($ventas) > 0): ?>
                        <?php foreach($ventas as $venta): ?>
                            <tr>
                                <td><?= htmlspecialchars($venta['cedula']) ?></td>
                                <td><?= htmlspecialchars($venta['nombre_distribuidor']) ?></td>
                                <td><?= htmlspecialchars($venta['nombre_producto']) ?></td>
                                <td><?= htmlspecialchars($venta['nombre_cliente']) ?></td>
                                <td><?= htmlspecialchars($venta['cantidad']) ?></td>
                                <td><?= date('d/m/Y', strtotime($venta['fecha'])) ?></td>
                                <td class="table-actions">
                                    <a href="editar_venta.php?id=<?= $venta['id'] ?>" class="btn btn-sm btn-warning" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="eliminar_venta.php?id=<?= $venta['id'] ?>" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Está seguro de eliminar esta venta?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <a href="detalle_venta.php?id=<?= $venta['id'] ?>" class="btn btn-sm btn-info" title="Ver detalle">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No se encontraron ventas</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <?php if($total_paginas > 1): ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php if($pagina > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?= $pagina-1 ?>&busqueda=<?= urlencode($busqueda) ?>&fecha=<?= urlencode($fecha) ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for($i = 1; $i <= $total_paginas; $i++): ?>
                        <li class="page-item <?= ($i == $pagina) ? 'active' : '' ?>">
                            <a class="page-link" href="?pagina=<?= $i ?>&busqueda=<?= urlencode($busqueda) ?>&fecha=<?= urlencode($fecha) ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if($pagina < $total_paginas): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?= $pagina+1 ?>&busqueda=<?= urlencode($busqueda) ?>&fecha=<?= urlencode($fecha) ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>