<?php
session_start();

// Mobil cihaz kontrolü için fonksiyon
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

// Ürün veritabanını simüle eden bir dizi
$products = [];
if (file_exists('products.txt')) {
    $products = json_decode(file_get_contents('products.txt'), true);
}

// Sepete ekleme işlemi
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog - TeknoDükkan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            background: linear-gradient(135deg, #007bff 99%, #6610f2 97%);
            color: white;
            padding: 80px 0;
        }
        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .navbar {
            background-color: #343a40;
        }
        .quantity-input {
            width: 60px;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-globe"></i> TeknoDükkan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><i class="fas fa-info-circle"></i> Hakkında</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php"><i class="fas fa-envelope"></i> İletişim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payment.php"><i class="fas fa-credit-card"></i> Ödeme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalog.php"> <i class="fas fa-store"></i> Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php"><i class="fas fa-user-shield"></i> Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section text-center">
        <div class="container <h1 class="display-4 mb-4">ÜRÜN KATALOG</h1>
            <p class="lead">ÜRÜNLERİMİZİ İNCELEMEYİ UNUTMAYIN</p>
        </div>
    </section>

    <div class="container mt-5">
        <h1 class="mb-4">Ürün Kataloğu</h1>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <?php if (isset($product['id'], $product['name'], $product['description'], $product['price'])): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                                <p class="card-text"><strong>Fiyat: <?php echo htmlspecialchars($product['price']); ?> TL</strong></p>
                                <form method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                                    <button type="submit" name="add_to_cart" class="btn btn-primary">Sepete Ekle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-4 mb-4">
                        <div class="alert alert-danger">Ürün bilgileri eksik!</div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Sepet</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ürün Adı</th>
                            <th>Adet</th>
                            <th>Fiyat</th>
                            <th>Toplam</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                            <?php foreach ($_SESSION['cart'] as $product_id => $quantity): ?>
                                <?php if (isset($products[$product_id - 1])): ?>
                                    <?php $product = $products[$product_id - 1]; ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                                        <td><?php echo $quantity; ?></td>
                                        <td><?php echo htmlspecialchars($product['price']); ?> TL</td>
                                        <td><?php echo htmlspecialchars($product['price'] * $quantity); ?> TL</td>
                                        <td><a href="#" class="btn btn-danger">Sil</a></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Sepetinizde ürün yok.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>