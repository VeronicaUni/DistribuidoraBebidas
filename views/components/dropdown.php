<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../assets/css/dropdown.css?v=<?php echo time(); ?>">
</head>

<body>
    <select class="dropdown">
        <?php foreach ($opciones as $opcion): ?>
            <option><?= $opcion ?></option>
        <?php endforeach; ?>
    </select>
</body>

</html>