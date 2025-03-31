<?php
// Número de filas por página
$rowsPerPage = 9;

// Total de filas
$totalRows = count($datos);

// Número total de páginas
$totalPages = ceil($totalRows / $rowsPerPage);

// Página actual (desde GET, si no está, es 1)
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$page = max(1, min($page, $totalPages)); // Evita páginas inválidas

// Índices de inicio y fin de datos a mostrar
$start = ($page - 1) * $rowsPerPage;
$end = min($start + $rowsPerPage, $totalRows);
$datosPagina = array_slice($datos, $start, $rowsPerPage);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../assets/css/table.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <?php foreach ($columnas as $columna): ?>
                        <th><?= $columna ?></th>
                    <?php endforeach; ?>
                    <th>Acciones</th> <!-- Columna de botones -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosPagina as $fila): ?>
                    <tr>
                        <?php foreach ($fila as $dato): ?>
                            <td><?= $dato ?></td>
                        <?php endforeach; ?>
                        <td>
                            <?php foreach ($actions as $action => $icon): ?>
                                <button class="action-btn"
                                    data-action="<?= $action ?>"
                                    data-product="<?= htmlspecialchars(json_encode($fila), ENT_QUOTES, 'UTF-8') ?>"
                                    data-module="<?= isset($module) ? $module : '' ?>">
                                    <img src="<?= $icon ?>" alt="<?= $action ?>">
                                </button>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    </div>

    <!-- Controles de paginación -->
    <div class="pagination">
        <button id="prevPage" <?= $page == 1 ? 'disabled' : '' ?> onclick="changePage(<?= $page - 1 ?>)">Anterior</button>
        <span id="pageInfo">Página <?= $page ?> de <?= $totalPages ?></span>
        <button id="nextPage" <?= $page == $totalPages ? 'disabled' : '' ?> onclick="changePage(<?= $page + 1 ?>)">Siguiente</button>
    </div>

    <script>
        function changePage(page) {
            window.location.href = "?page=" + page;
        }
    </script>

</body>

</html>