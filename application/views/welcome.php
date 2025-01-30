<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Digital Banking Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .cta-button {
            background-color: #2ecc71;
            border: none;
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            background-color: #27ae60;
            transform: scale(1.05);
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .btn-login {
            background-color: #dc3545;
            color: white;
        }

        .btn-login:hover {
            background-color: #c82333;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-bank2 me-2"></i>DigitalBank
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Admin Portal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Staff Portal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Client Portal</a></li>
                </ul>
                <a href="<?= base_url('authorization'); ?>" class="btn btn-login ms-3">Masuk</a>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-4 mb-4">Kesuksesan Finansial dalam Genggaman</h1>
                    <p class="lead mb-4">Nikmati kemudahan bertransaksi, investasi, dan kelola keuangan dengan teknologi tercanggih.</p>
                    <a href="#" class="btn btn-lg cta-button text-white px-4 py-2">Mulai Sekarang</a>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card p-4 text-center">
                        <i class="bi bi-shield-lock display-4 text-primary mb-3"></i>
                        <h3>Keamanan Terjamin</h3>
                        <p>Sistem keamanan terdepan melindungi setiap transaksi Anda.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card p-4 text-center">
                        <i class="bi bi-phone display-4 text-primary mb-3"></i>
                        <h3>Mobile Banking</h3>
                        <p>Kelola keuangan kapan pun, di mana pun melalui aplikasi kami.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card p-4 text-center">
                        <i class="bi bi-graph-up display-4 text-primary mb-3"></i>
                        <h3>Investasi Cerdas</h3>
                        <p>Analitik canggih untuk keputusan investasi yang lebih baik.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>