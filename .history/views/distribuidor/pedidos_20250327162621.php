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
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Módulo de Ventas</h1>
        
        <!-- Barra de búsqueda -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="h5 mb-3">Buscar Código De venta</h2>
                <form class="row g-3">
                    <div class="col-md-4">
                        <label for="buscarProducto" class="form-label">Buscar Producto</label>
                        <input type="text" class="form-control" id="buscarProducto" placeholder="Nombre del producto">
                    </div>
                    <div class="col-md-4">
                        <label for="fecha" class="form-label">Fecha DD/MM/AAAA</label>
                        <input type="date" class="form-control" id="fecha">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                    </div>
                </form>
            </div>
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
                    <!-- Fila 1 -->
                    <tr>
                        <td>1003456548</td>
                        <td>José Eduardo Narváez</td>
                        <td>Aguardiente Caucano IL</td>
                        <td>Manuel Cordoba</td>
                        <td>20</td>
                        <td>10/05/2025</td>
                        <td>
                            <button class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Fila 2 -->
                    <tr>
                        <td>1003456548</td>
                        <td>José Eduardo Narváez</td>
                        <td>Manzana postobon 1.5 Lt</td>
                        <td>José Luis Manzano</td>
                        <td>15</td>
                        <td>10/05/2025</td>
                        <td>
                            <button class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Fila 3 -->
                    <tr>
                        <td>1003456548</td>
                        <td>José Eduardo Narváez</td>
                        <td>Manzana postobon 1.5 Lt</td>
                        <td>Manuel Cordoba</td>
                        <td>23</td>
                        <td>10/05/2025</td>
                        <td>
                            <button class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Paginación (simulada) -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Siguiente</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para acciones básicas -->
    <script>
        // Ejemplo de función para los botones de acción
        document.querySelectorAll('.btn-warning').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Función de editar: Aquí se abriría el formulario de edición');
            });
        });
        
        document.querySelectorAll('.btn-danger').forEach(btn => {
            btn.addEventListener('click', function() {
                if(confirm('¿Está seguro de eliminar esta venta?')) {
                    alert('Venta eliminada (esto es un prototipo)');
                    // En implementación real, aquí iría la lógica para eliminar
                }
            });
        });
    </script>
</body>
</html>