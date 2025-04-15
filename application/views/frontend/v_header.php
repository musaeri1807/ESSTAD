<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $titale; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="BSP,Bank Sampah Pintar, BSP, pok lisa" name="keywords">
    <meta content="Digitalikasi Bank Sampah,bank sampah pintar,emas,gold,aplikasi,bersih" name="description">

    <!-- Favicon -->
    <link href="<?php echo base_url(); ?>assets/frontend/img/icon_bspid.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/frontend/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5 py-3 align-items-center">
            <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-start">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-2"></i>
                    <h2 class="mb-0"><?php echo $telpon; ?></h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-center">
                    <img height="100" src="<?php echo base_url(); ?>assets/frontend/img/icon_bspid.png" alt="">
                    <a href="<?php echo base_url(); ?>" class="navbar-brand ms-lg-3">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Bank Sampah</span> Pintar
                        </h1>
                        <h3><?php echo $tagline; ?></h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-end">
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="https://api.whatsapp.com/send?phone=6285780390850"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="https://www.linkedin.com/in/miga-informatika-71b407257/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex d-lg-none">
            <img height="50" src="<?php echo base_url(); ?>assets/frontend/img/icon_bspid.png" alt="">
            <h3 class="m-0 display-4 text-secondary"><span class="text-white">BS</span>P</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="<?php echo base_url('home'); ?>" class="nav-item nav-link <?php if ($this->uri->segment(1) == "home") {
                                                                                                    echo "active";
                                                                                                } ?>">Home</a>
                <a href="<?php echo base_url('aboutme'); ?>" class="nav-item nav-link <?php if ($this->uri->segment(1) == "aboutme") {
                                                                                                        echo "active";
                                                                                                    } ?>">Tentang Kami</a>
                <!-- <a href="<?php echo base_url('Frontend/layanan'); ?>" class="nav-item nav-link <?php if ($this->uri->segment(2) == "layanan") {
                                                                                                    echo "active";
                                                                                                } ?>">Layanan</a> -->
                <!-- <a href="<?php echo base_url('Frontend/tonase'); ?>" class="nav-item nav-link <?php if ($this->uri->segment(2) == "tonase") {
                                                                                                        echo "active";
                                                                                                    } ?>">Tonase</a> -->
                <!-- <a href="product.html" class="nav-item nav-link">Produk</a> -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?php echo base_url('service-bsp'); ?>" class="dropdown-item">Layanan Unit BSP</a>
                        <a href="<?php echo base_url('service-nasabah'); ?>" class="dropdown-item">Layanan Nasabah BSP</a>
                    </div>
                </div>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                    <div class="dropdown-menu m-0">
                        <a href="blog.html" class="dropdown-item">Blog</a>
                        <a href="<?php echo base_url('Frontend/unit'); ?>" class="dropdown-item">Layanan Bank Sampah</a>
                        <a href="feature.html" class="dropdown-item">Login Blog</a>
                        <a href="team.html" class="dropdown-item">The Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    </div>
                </div> -->
                <!-- <a href="contact.html" class="nav-item nav-link">Kontak</a> -->
                <a href="<?php echo base_url('auth') ?>" class="nav-item nav-link">Login</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->