<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si la sesión está activa
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;

// Definir los elementos del menú según el rol
$menuItems = [
    "admin" => [
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

    <!-- Evitar cache del CSS -->
    <link rel="stylesheet" href="../../assets/css/sidebar.css?v=<?php echo time(); ?>">

    <!-- Menú según el rol -->
    <?php if (isset($menuItems[$rol])): ?>
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
    <?php else: ?>
        <p style="color: red; text-align: center; margin: 20px;">⚠️ Rol no autorizado</p>
    <?php endif; ?>

    <!-- Botón de Cerrar Sesión -->
    <div class="logout">
        <button id="logout-btn">Cerrar Sesión</button>
    </div>
</aside>

<script>
    document.getElementById("logout-btn").addEventListener("click", function () {
        window.location.href = "../auth/logout.php";
    });
</script>
