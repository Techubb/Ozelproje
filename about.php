<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkında - TeknoDükkan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: white;
        }
        .hero-section {
            background: linear-gradient(135deg, #007bff 99%, #6610f2 97%);
            color: white;
            padding: 80px 0;
        }
        .feedback-section {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .img-fluid_rounded_mb-4 {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-laptop"></i> TeknoDükkan</a>
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
        <div class="container">
            <h1 class="display-4 mb-4">Hakkında</h1>
            <p class="lead">TeknoDükkan, en yeni teknolojik ürünleri en uygun fiyatlarla sunmayı hedefleyen bir e-ticaret platformudur.</p>
        </div>
    </section>

    <div class="container mt-5">
        <img src="https://egemeclisicom.teimg.com/crop/1280x720/egemeclisi-com/images/haberler/havali-insanlarin-havali-sozleri216b18ad437a266a8c44.jpg" alt="TeknoDükkan" class="img-fluid_rounded_mb-4">
    </div>

    <section class="feedback-section mt-5">
        <div class="container">
            <h2 class="text-center mb-4">Müşteri Yorumları</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <p class="card-text">"TeknoDükkan'dan aldığım ürünler harika! Hız lı kargo ve kaliteli hizmet."</p>
                            <h5 class="card-title">Ahmet Y.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <p class="card-text">"Müşteri hizmetleri çok yardımcı oldu. Ürünler tam zamanında geldi."</p>
                            <h5 class="card-title">Elif K.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <p class="card-text">"TeknoDükkan'dan alışveriş yapmak çok keyifli. Herkese tavsiye ederim!"</p>
                            <h5 class="card-title">Mehmet T.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center mt-5 mb-3">
        <p>&copy; <?php echo date("Y"); ?> TeknoDükkan. Tüm hakları saklıdır.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>