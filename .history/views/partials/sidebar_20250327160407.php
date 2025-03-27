<?php
// Simulación de rol (esto vendría de la sesión de usuario en PHP)
$rol = "distribuidor"; // Cambiar a "distribuidor" según el usuario logueado
// Definir los elementos del menú según el rol
$menuItems = [
    "administrador" => [
        ["href" => "../admin/productos.php", "img" => "../../assets/images/Icon-Productos.png", "alt" => "Productos", "text" => "Productos"],
        ["href" => "../admin/ventas.php", "img" => "../../assets/images/Icon-PedidoVentas.png", "alt" => "Ventas", "text" => "Ventas"],
        ["href" => "../admin/distribuidores.php", "img" => "../../assets/images/Icon-ClienteDistribuidor.png", "alt" => "Distribuidores", "text" => "Distribuidores"],
    ],
    "distribuidor" => [
        ["href" => "../distribuidor/productos.php", "img" => "../../assets/images/Icon-Productos.png", "alt" => "Productos", "text" => "Productos"],
        ["href" => "../distribuidor/pedidos.php", "img" => "../../assets/images/Icon-PedidoVentas.png", "alt" => "Pedidos", "text" => "Pedidos"],
        ["href" => "../distribuidor/clientes.php", "img" => "../../assets/images/Icon-ClienteDistribuidor.png", "alt" => "Clientes", "text" => "Clientes"],
    ]
];
?>

<aside class="sidebar">
    <!-- Logo con redirección condicional -->
    <div class="logo">
        <?php if ($rol === "distribuidor") : ?>
            <a href="../distribuidor/bienvenida.php">
                <img src="../../assets/images/bebidas.png" alt="Distribución Express">
            </a>
        <?php else : ?>
            <img src="../../assets/images/bebidas.png" alt="Distribución Express">
        <?php endif; ?>
        <h2>Distribución Express</h2>
    </div>
    <!-- Esto evita el cache  ?v=<?php echo time(); ?> -->
    <link rel="stylesheet" href="../../assets/css/sidebar.css?v=<?php echo time(); ?>">

    <div class="menu">
        <ul>
            <?php foreach ($menuItems[$rol] as $item) : ?>
                <li>
                    <a href="<?= $item['href']; ?>">
                        <img src="<?= $item['img']; ?>" alt="<?= $item['alt']; ?>">
                        <?= $item['text']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Botón de Cerrar Sesión -->
    <div class="logout">
        <button id="logout-btn">Cerrar Sesión</button>
    </div>
</aside>

<script>
    document.getElementById("logout-btn").addEventListener("click", function() {
        window.location.href = "../auth/login.php"; // Asegúrate de que la ruta es correcta
    });
</script>