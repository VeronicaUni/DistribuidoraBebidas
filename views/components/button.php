<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../assets/css/button.css?v=<?php echo time(); ?>">
</head>

<body>
    <button id="btn" class="btn <?= $color ?> action-btn" 
        data-action="<?= isset($action) ? $action : '' ?>" 
        data-module="<?= isset($module) ? $module : '' ?>"
        data-product='<?= isset($productData) ? json_encode($productData) : "{}" ?>'>
        <?= $texto ?>
    </button>
</body>

</html>