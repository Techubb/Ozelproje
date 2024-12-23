<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa | TeknoDükkan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #007bff 99%, #6610f2 97%);
            color: white;
            padding: 80px 0;
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #e67e22; /* Turuncu renk */
        }

        .card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.95);
        }

        .btn-custom {
            background: #e67e22;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        footer {
            background: #2c3e50;
            padding: 40px 0;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            margin: 0 10px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
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
            <h1 class="display-4 mb-4">TeknoDükkan'a Hoş Geldiniz</h1>
            <p class="lead mb-5">En yeni teknolojik ürünler burada!</p>
            <a href="#features" class="btn btn-custom btn-lg">Ürünlerimizi Gör <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </section>

    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Öne Çıkan Ürünler</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-mobile-alt feature-icon"></i>
                            <h5 class="card-title">Akıllı Telefon</h5>
                            <p class="card-text">Son teknoloji ile donatılmış akıllı telefonlar.</p>
                            <a href="#" class="btn btn-custom">Detaylar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-laptop feature-icon"></i>
                            <h5 class="card-title">Dizüstü Bilgisayar</h5>
                            <p class="card-text">Güçlü performans ve şık tasarım.</p>
                            <a href="#" class="btn btn-custom">Detaylar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-headphones-alt feature-icon"></i>
                            <h5 class="card-title">Kablosuz Kulaklık</h5>
                            <p class="card-text">Mükemmel ses kalitesi ile özgürce dinleyin.</p>
                            <a href="#" class="btn btn-custom">Detaylar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Müşteri Yorumları</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <p class="card-text">"TeknoDükkan'dan aldığım ürünler harika! Hızlı kargo ve kaliteli hizmet."</p>
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

    <footer class="bg-dark text-light text-center py-4">
        <div class="container">
            <p>&copy; 2023 TeknoDükkan. Tüm hakları saklıdır.</p>
            <div class="social-links mt-3">
                <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>