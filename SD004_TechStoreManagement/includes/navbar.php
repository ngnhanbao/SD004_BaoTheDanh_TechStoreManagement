<?php
require_once 'config/database.php';
$db = new database();
$sql = "SELECT * FROM categories ";
$categories = $db->select($sql);
$sql_products = "SELECT * FROM products";
$products = $db->select($sql_products);


// Bước 1: Tạo mảng ánh xạ dựa trên tên chính xác trong DB
$icon_map = [
    'Điện thoại & Tablet'     => 'bi-phone',
    'Laptop & Computer'  => 'bi-laptop',
    'Thiết bị âm thanh'             => 'bi-headphones',
    'Phụ kiện'        => 'bi-mouse',
    'SThiết bị gia đình'          => 'bi-house-gear'
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>TechStore - Modern E-commerce</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="bootstrap-5.3.8/css/bootstrap.min.css">

    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation -->
    <nav class="nav-bar">
        <div class="container nav-content">
            <ul class="nav-menu">
                <li>
                    <a href="index.php">
                        <i class="bi bi-grid-fill"></i> All Products
                    </a>
                </li>

                <?php foreach ($categories as $cat) :
                    $icon_class = isset($icon_map[$cat['name']]) ? $icon_map[$cat['name']] : 'bi-box';
                ?>
                    <li>
                        <a href="index.php?category=<?= $cat['id']; ?>">
                            <i class="bi <?= $icon_class; ?>"></i>
                            <?= $cat['name']; ?>
                            
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>


        </div>
    </nav>
</body>

</html>