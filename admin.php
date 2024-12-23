<?php
session_start();

// Basit bir giriş kontrolü
$admin_username = "admin";
$admin_password = "admin1234";

// Çıkış işlemi
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); // Ana sayfaya yönlendir
    exit;
}

// Giriş kontrolü
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === $admin_username && $password === $admin_password) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin.php");
            exit;
        } else {
            $error_message = "Hatalı kullanıcı adı veya şifre!";
        }
    }

    // Eğer giriş yapılmamışsa, giriş formunu göster
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        include('admin_login.php');
        exit;
    }
}

// Geri bildirim verilerini oku
$messages = [];
if (file_exists('messages.txt')) {
    $content = file_get_contents('messages.txt');
    $entries = explode("\n\n", $content);

    foreach ($entries as $entry) {
        if (empty(trim($entry))) continue;

        $lines = explode("\n", $entry);
        $messageData = [];
        
        foreach ($lines as $line) {
            if (strpos($line, 'Ad:') === 0) {
                $messageData['name'] = trim(substr($line, 3));
            }
            if (strpos($line, 'E-posta:') === 0) {
                $messageData['email'] = trim(substr($line, 8));
            }
            if (strpos($line, 'Mesaj:') === 0) {
                $messageData['message'] = trim(substr($line, 6));
            }
        }

        if (!empty($messageData)) {
            $messages[] = $messageData;
        }
    }
}

// Ürün ekleme ve çıkarma işlemleri
$products = [];
if (file_exists('products.txt')) {
    $products = json_decode(file_get_contents('products.txt'), true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'] ?? '';
    $product_price = $_POST['product_price'] ?? '';
    $product_description = $_POST['product_description'] ?? '';

    if ($product_name && $product_price && $product_description) {
        $new_product = [
            'id' => count($products) + 1,
            'name' => $product_name,
            'price' => $product_price,
            'description' => $product_description
        ];
        $products[] = $new_product;
        file_put_contents('products.txt', json_encode($products));
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_product'])) {
    $product_index = $_POST['product_index'] ?? '';
    if (isset($products[$product_index])) {
        unset($products[$product_index]);
        file_put_contents('products.txt', json_encode(array_values($products)));
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - TeknoDükkan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(37, 117, 252, 0.25);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-laptop"></i> TeknoDükkan - Admin Panel</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=1"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Admin Paneli</h1>
        
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Geri Bildirimler</h2>
            </div>
            <div class="card-body">
                <?php if (empty($messages)): ?>
                    <div class="alert alert-info">Henüz geri bildirim bulunmamaktadır.</div>
                <?php else: ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>İsim</th>
                                <th>E-posta</th>
                                <th>Mesaj</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $data): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($data['name'] ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($data['email'] ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($data['message'] ?? ''); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Ürün Ekle</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Ürün Adı</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="form-label">Ürün Fiyatı</label>
                        <input type="text" class="form-control" id="product_price" name="product_price" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Açıklama</label>
                        <textarea class="form-control" id="product_description" name="product_description" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="add_product" class="btn btn-primary">Ürün Ekle</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Ürünleri Yönet</h2>
            </div>
            <div class="card-body">
                <?php if (empty($products)): ?>
                    <div class="alert alert-info">Henüz ürün bulunmamaktadır.</div>
                <?php else: ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Ürün Adı</th>
                                <th>Fiyat</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $index => $product): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                                    <td><?php echo htmlspecialchars($product['price']); ?></td>
                                    <td>
                                        <form action="" method="POST" style="display:inline;">
                                            <input type="hidden" name="product_index" value="<?php echo $index; ?>">
                                            <button type="submit" name="remove_product" class="btn btn-danger btn-sm">Ürünü Kaldır</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>