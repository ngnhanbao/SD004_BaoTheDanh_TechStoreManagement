<?php
require_once 'config/database.php';
$db = new database();
$sql = "SELECT * FROM products ORDER BY id ASC LIMIT 10";
$products = $db->select($sql);
// Cắt lấy 10 phần tử đầu tiên của mảng
$products = is_array($products) ? array_slice($products, 0, 10) : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tech Store</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="bootstrap-5.3.8/css/bootstrap.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php require_once 'includes/top_bar.php'; ?>
    <?php require_once 'includes/header.php'; ?>
    <?php require_once 'includes/navbar.php'; ?>
    <?php require_once 'includes/section.php'; ?>
    <!-- Section-->
    <section class="py-4">
        <div class="container px-4 px-lg-5 mt-4">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-5 justify-content-center" id="productContainer">
                <?php
                $count = 0; // Khởi tạo biến đếm
                foreach ($products as $pr) {
                    if ($count >= 10) break; // Nếu đủ 10 thì thoát khỏi vòng lặp
                ?>
                    <div class="col mb-5">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="./assets/img/<?= $pr['image']; ?>" alt="<?= $pr['name']; ?>" />
                            </div>

                            <h5 class="product-name"><?= $pr['name']; ?></h5>
                            <div class="product-price"><?= number_format($pr['price'], 0, ',', '.') ?> VNĐ</div>

                            <div class="mt-auto pt-3">
                                <div class="d-grid gap-2">
                                    <a href="products_detail.php?id=<?= $pr['id']; ?>" class="btn btn-outline-primary">View detail</a>
                                    <a href="cart.php" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $count++; // Tăng biến đếm lên 1 sau mỗi lần lặp
                }
                ?>
            </div>
        </div>
    </section>
    <?php require_once 'includes/pagination.php'; ?>
    <?php require_once 'includes/footer.php'; ?>
</body>

</html>