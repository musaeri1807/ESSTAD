<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $titale; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bank Sampah Pintar" name="keywords">
    <meta content="Digitalikasi" name="description">

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
                    <h2 class="mb-0">085780390850</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-center">
                    <img height="100" src="<?php echo base_url(); ?>assets/frontend/img/icon_bspid.png" alt="">
                    <a href="<?php echo base_url(); ?>" class="navbar-brand ms-lg-3">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Bank Sampah</span> Pintar
                        </h1>
                        <h3>Digitalisasi Sampah </h3>
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
                <a href="<?php echo base_url(); ?>" class="nav-item nav-link active">Home</a>
                <a href="<?php echo base_url('Frontend/tentangkami'); ?>" class="nav-item nav-link">Tentang Kami</a>
                <a href="<?php echo base_url('Frontend/layanan'); ?>" class="nav-item nav-link">Layanan</a>
                <!-- <a href="product.html" class="nav-item nav-link">Produk</a> -->
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Halaman Lain</a>
                    <div class="dropdown-menu m-0">
                        <a href="blog.html" class="dropdown-item">Karir</a>
                        <a href="detail.html" class="dropdown-item">Layanan Bank</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
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


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?php echo base_url(); ?>assets/frontend/img/carousel/header-web_pages-to-jpg-0001.jpg" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <!-- <div class="text-start p-5" style="max-width: 900px;">
                            <h3 class="text-white">#</h3>
                            <h1 class="display-1 text-white mb-md-4">#</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Login Unit</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5">Login Personal</a>
                        </div> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo base_url(); ?>assets/frontend/img/carousel/header-web_pages-to-jpg-0002.jpg" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <!-- <div class="text-start p-5" style="max-width: 900px;">
                            <h3 class="text-white">#</h3>
                            <h1 class="display-1 text-white mb-md-4">#</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Login Unit</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5">Login Personal</a>
                        </div> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo base_url(); ?>assets/frontend/img/carousel/header-web_pages-to-jpg-0003.jpg" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <!-- <div class="text-start p-5" style="max-width: 900px;">
                            <h3 class="text-white">#</h3>
                            <h1 class="display-1 text-white mb-md-4">#</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Login Unit</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5">Login Personal</a>
                        </div> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo base_url(); ?>assets/frontend/img/carousel/header-web_pages-to-jpg-0004.jpg" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <!-- <div class="text-start p-5" style="max-width: 900px;">
                            <h3 class="text-white">#</h3>
                            <h1 class="display-1 text-white mb-md-4">#</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Login Unit</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5">Login Personal</a>
                        </div> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo base_url(); ?>assets/frontend/img/carousel/header-web_pages-to-jpg-0005.jpg" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <!-- <div class="text-start p-5" style="max-width: 900px;">
                            <h3 class="text-white">#</h3>
                            <h1 class="display-1 text-white mb-md-4">#</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Login Unit</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5">Login Personal</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Banner Start -->
    <div class="container-fluid banner mb-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-md-6">
                    <div class="bg-primary bg-vegetable d-flex flex-column justify-content-center p-5" style="height: 150px;">
                        <h3 class="text-white mb-3">Daftar Sebagai Nasabah</h3>
                        <!-- <p class="text-white">Dolor magna ipsum elitr sea erat elitr amet ipsum stet justo dolor, amet
                            lorem diam no duo sed dolore amet diam</p> -->
                        <!-- <a class="text-white fw-bold" href="">Read More<i class="bi bi-arrow-right ms-2"></i></a> -->
                        <a href="<?php echo base_url('Frontend/layanannasabah') ?>" class="btn btn-secondary py-md-3 px-md-5">Daftar Personal</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-secondary bg-fruit d-flex flex-column justify-content-center p-5" style="height: 150px;">
                        <h3 class="text-white mb-3">Daftar Sebagai Unit</h3>
                        <!-- <p class="text-white">Dolor magna ipsum elitr sea erat elitr amet ipsum stet justo dolor, amet
                            lorem diam no duo sed dolore amet diam</p> -->
                        <!-- <a class="text-white fw-bold" href="">Read More<i class="bi bi-arrow-right ms-2"></i></a> -->
                        <a href="<?php echo base_url('Frontend/layananunit') ?>" class="btn btn-primary py-md-3 px-md-5 me-3">Daftar Unit </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->


    <!-- About Start -->
    <div class="container-fluid about pt-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="d-flex h-100 border border-5 border-primary border-bottom-0 pt-4">
                        <img class="img-fluid mt-auto mx-auto" src="<?php echo base_url(); ?>assets/frontend/img/about.png">
                    </div>
                </div>
                <div class="col-lg-6 pb-5">
                    <div class="mb-3 pb-2">
                        <h6 class="text-primary text-uppercase">Tentang Kami</h6>
                        <h1 class="display-5">Bank Sampah Pintar</h1>
                    </div>
                    <p class="mb-4">Dalam menjalankan aktivitasnya, PT ANTAM Tbk UBPP Logam Mulia berkomitmen untuk tidak sekadar memprioritaskan profit,
                        namun juga benefit yang dapat dinikmati oleh lingkungan dan masyarakat sekitar.
                    </p>
                    <div class="row gx-5 gy-4">
                        <div class="col-sm-6">
                            <i class="fa fa-seedling display-1 text-secondary"></i>
                            <h4>BACA BUKU KAMI</h4>
                            <p class="mb-0">Sejarah baru dalam pengelolaan lingkungan berbasis digitalisasi dan pengembangan masyarakat.
                                Baca selengkapnya BUKU DARI BIASA MENJADI PINTAR secara GRATIS <a href="https://www.antam.com/id/csr-activities-detail/dari-biasa-menjadi-pintar">disini</a>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <i class="fa fa-award display-1 text-secondary"></i>
                            <h4>PENGHARGAAN</h4>
                            <p class="mb-0">- Award (ISDA) 2022 PLATINUM <br>
                                - Award (ISDA) 2021 GOLD<br>
                                - CSR Awards 2020 <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid bg-primary facts py-5 mb-5">
        <div class="container py-5">
            <div class="row gx-5 gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-star fs-4 text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white">Unit Bank Sampah</h5>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up"><?php echo $totalunit; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-users fs-4 text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white">Nasabah</h5>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up"><?php echo $N->TOTAL_NASABAH; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check fs-4 text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white">Terkelolah (Kg)</h5>
                            <h5 class="display-5 text-white mb-0" data-toggle="counter-up"><?php echo round($S->TOTAL_SAMPAH,2) ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-mug-hot fs-4 text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white">Total Emas (gr)</h5>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up"><?php echo round($D->TOTAL_ED,2);?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Services Start -->
    <!-- <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <h6 class="text-primary text-uppercase">Services</h6>
                        <h1 class="display-5">Layanan Bank Sampah Pintar</h1>
                    </div>
                    <p class="mb-4">Apabila ingin Tahu Terkait Bank Sampah Pintar Bisa Chat melalui whatsapp</p>
                    <a href="" class="btn btn-primary py-md-3 px-md-5">Contact Us</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-carrot display-1 text-primary mb-3"></i>
                        <h4>Fresh Vegetables</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna
                            dolor vero</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-apple-alt display-1 text-primary mb-3"></i>
                        <h4>Fresh Fruits</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna
                            dolor vero</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-dog display-1 text-primary mb-3"></i>
                        <h4>Healty Cattle</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna
                            dolor vero</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-tractor display-1 text-primary mb-3"></i>
                        <h4>Modern Truck</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna
                            dolor vero</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-seedling display-1 text-primary mb-3"></i>
                        <h4>Farming Plans</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna
                            dolor vero</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Services End -->


    <!-- Features Start -->
    <!-- <div class="container-fluid bg-primary feature py-5 pb-lg-0 my-5">
        <div class="container py-5 pb-lg-0">
            <div class="mx-auto text-center mb-3 pb-2" style="max-width: 500px;">
                <h6 class="text-uppercase text-secondary">Features</h6>
                <h1 class="display-5 text-white">Mengapa Memilih Kami!!!</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-3">
                    <div class="text-white mb-5">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-seedling fs-4 text-white"></i>
                        </div>
                        <h4 class="text-white">100% Organic</h4>
                        <p class="mb-0">Salah Satu Bank Sampah yang terbaik di Jakarta</p>
                    </div>
                    <div class="text-white">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-award fs-4 text-white"></i>
                        </div>
                        <h4 class="text-white">Award Winning</h4>
                        <p class="mb-0">Menjuarai Ibu kota Awards tahun 2021</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-block bg-white h-70 text-center p-5 pb-lg-0">
                        <p>Jadikan Sampah anda menjadi Emas Bantangan Hanya di Bank Sampah Pintar</p>
                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/frontend/img/feature1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-white mb-5">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-tractor fs-4 text-white"></i>
                        </div>
                        <h4 class="text-white">Antar Jemput</h4>
                        <p class="mb-0">Kami Siap menjemput sampah anda di tempat</p>
                    </div>
                    <div class="text-white">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt fs-4 text-white"></i>
                        </div>
                        <h4 class="text-white">24/7 Support</h4>
                        <p class="mb-0">Siap membantu memlalui chat whatsapp</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Features Start -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">Produk</h6>
                <h1 class="display-5">Harga Sampah</h1>
            </div>
            <div class="owl-carousel product-carousel px-5">
                <?php
                // foreach ($produk as $item){
                //     echo $item->image;
                // }


                foreach($P AS $Produck){
               
                ?>
                    <div class="pb-5">
                        <div class="product-item position-relative bg-white d-flex flex-column text-center">
                            <img class="img-fluid mb-4" src="<?php echo base_url(); ?>assets/frontend/img/produk/<?php  echo $Produck->field_image; ?>" alt="">
                            <h6 class="mb-3"><?php  echo $Produck->field_product_name; ?></h6> 
                            <h5 class="text-primary mb-0"><?php  echo "Rp. ".$Produck->field_price; ?></h5>
                            <div class="btn-action d-flex justify-content-center">
                                <a class="btn bg-primary py-2 px-3" href=""><i class="bi bi-cart text-white"></i></a>
                                <a class="btn bg-secondary py-2 px-3" href=""><i class="bi bi-eye text-white"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="pb-5">
                        <div class="product-item position-relative bg-white d-flex flex-column text-center">
                            <img class="img-fluid mb-4" src="<?php echo base_url(); ?>assets/frontend/img/produk/kardus-01.png" alt="">
                            <h6 class="mb-3">Kardus Bekas</h6>
                            <h5 class="text-primary mb-0">Rp 2.000 <?php echo $x; ?></h5>
                            <div class="btn-action d-flex justify-content-center">
                                <a class="btn bg-primary py-2 px-3" href=""><i class="bi bi-cart text-white"></i></a>
                                <a class="btn bg-secondary py-2 px-3" href=""><i class="bi bi-eye text-white"></i></a>
                            </div>
                        </div>
                    </div> -->
                <?php

                } ?>

                <!-- looping -->
                <!-- <div class="pb-5">
                    <div class="product-item position-relative bg-white d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="<?php echo base_url(); ?>assets/frontend/img/product-2.png" alt="">
                        <h6 class="mb-3">Organic Vegetable</h6>
                        <h5 class="text-primary mb-0">Rp 1.000</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn bg-primary py-2 px-3" href=""><i class="bi bi-cart text-white"></i></a>
                            <a class="btn bg-secondary py-2 px-3" href=""><i class="bi bi-eye text-white"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-white d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="<?php echo base_url(); ?>assets/frontend/img/product-1.png" alt="">
                        <h6 class="mb-3">Organic Vegetable</h6>
                        <h5 class="text-primary mb-0">Rp 1.000</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn bg-primary py-2 px-3" href=""><i class="bi bi-cart text-white"></i></a>
                            <a class="btn bg-secondary py-2 px-3" href=""><i class="bi bi-eye text-white"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-white d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="<?php echo base_url(); ?>assets/frontend/img/product-2.png" alt="">
                        <h6 class="mb-3">Organic Vegetable</h6>
                        <h5 class="text-primary mb-0">Rp 1.000</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn bg-primary py-2 px-3" href=""><i class="bi bi-cart text-white"></i></a>
                            <a class="btn bg-secondary py-2 px-3" href=""><i class="bi bi-eye text-white"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-white d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="<?php echo base_url(); ?>assets/frontend/img/product-1.png" alt="">
                        <h6 class="mb-3">Organic Vegetable</h6>
                        <h5 class="text-primary mb-0">Rp 1.000</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn bg-primary py-2 px-3" href=""><i class="bi bi-cart text-white"></i></a>
                            <a class="btn bg-secondary py-2 px-3" href=""><i class="bi bi-eye text-white"></i></a>
                        </div>
                    </div>
                </div> -->
                <!-- looping -->
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-testimonial py-5 my-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel p-5">
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto p-2 border border-5 border-secondary rounded-circle mb-4" src="<?php echo base_url(); ?>assets/frontend/img/testimonial-1.jpg" alt="">
                            <p class="fs-5">Alhamdulillah ya selama 2 tahun lebih menjadi bank sampah unit di Bank Sampah Pintar pelayanannya bagus.
                                Penjemputan ke unit juga lancar. Kami juga mendapatkan banyak manfaat salah satunya bisa mengikuti banyak seminar dan pelatihan.
                                Selain itu, kami juga merasakan dampak positif terhadap lingkungan.
                                Sampah yang terbuang ke TPA semakin sedikit dan lebih meringankan beban petugas pengangkut sampah.</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Fatimah</h4>
                            <h7 class="text-white mb-0">Bank Sampah Unit 01</h7>
                        </div>
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto p-2 border border-5 border-secondary rounded-circle mb-4" src="<?php echo base_url(); ?>assets/frontend/img/testimonial-2.jpg" alt="">
                            <p class="fs-5">Alhamdulillah ya selama 2 tahun lebih menjadi bank sampah unit di Bank Sampah Pintar pelayanannya bagus.
                                Penjemputan ke unit juga lancar. Kami juga mendapatkan banyak manfaat salah satunya bisa mengikuti banyak seminar dan pelatihan.
                                Selain itu, kami juga merasakan dampak positif terhadap lingkungan.
                                Sampah yang terbuang ke TPA semakin sedikit dan lebih meringankan beban petugas pengangkut sampah.</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Mas Slamet</h4>
                            <h7 class="text-white mb-0">Bank Sampah Unit 02</h7>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">The Team</h6>
                <h1 class="display-5">CSR ANTAM Logammulia</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <!-- <div class="row g-0">
                        <div class="col-10">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="<?php echo base_url(); ?>assets/frontend/img/team-1.jpg" alt="">
                                <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4" style="background: rgba(52, 173, 84, .85);">
                                    <h4 class="text-white"></h4>
                                    <span class="text-white">CSR</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="<?php echo base_url(); ?>assets/frontend/img/team-2.jpg" alt="">
                                <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4" style="background: rgba(52, 173, 84, .85);">
                                    <h4 class="text-white"></h4>
                                    <span class="text-white">CSR</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- <div class="row g-0">
                        <div class="col-10">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="<?php echo base_url(); ?>assets/frontend/img/team-3.jpg" alt="">
                                <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4" style="background: rgba(52, 173, 84, .85);">
                                    <h4 class="text-white"></h4>
                                    <span class="text-white">CSR</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Blog Start -->
    <!-- <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">Our Blog</h6>
                <h1 class="display-5">Latest Articles From Our Blog Post</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/frontend/img/blog-1.jpg" alt="">
                        <a class="blog-overlay" href="">
                            <h4 class="text-white">Lorem elitr magna stet eirmod labore amet</h4>
                            <span class="text-white fw-bold">Jan 01, 2050</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/frontend/img/blog-2.jpg" alt="">
                        <a class="blog-overlay" href="">
                            <h4 class="text-white">Lorem elitr magna stet eirmod labore amet</h4>
                            <span class="text-white fw-bold">Jan 01, 2050</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/frontend/img/blog-3.jpg" alt="">
                        <a class="blog-overlay" href="">
                            <h4 class="text-white">Lorem elitr magna stet eirmod labore amet</h4>
                            <span class="text-white fw-bold">Jan 01, 2050</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Blog End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-footer bg-primary text-white mt-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <h4 class="text-white mb-4">Kantor Pusat Bank Sampah</h4>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-white me-2"></i>
                                <p class="text-white mb-0">Jl Raya Jatinegara Kau Jakarta Timur<br>Jam Operasional pelayanan 09.00-15.00 WIB</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-white me-2"></i>
                                <p class="text-white mb-0">info@bspid.id</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-white me-2"></i>
                                <p class="text-white mb-0">62857-8039-0850 CS 01</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-white me-2"></i>
                                <p class="text-white mb-0">62812-8193-686 CS 02</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-secondary btn-square rounded-circle me-2" href="https://api.whatsapp.com/send?phone=6281380451211"><i class="fab fa-whatsapp"></i></a>
                                <a class="btn btn-secondary btn-square rounded-circle me-2" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-square rounded-circle me-2" href="https://id-id.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-square rounded-circle me-2" href="https://www.linkedin.com/in/miga-informatika-71b407257/"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-square rounded-circle" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-white mb-4">Bank Sampah Pintar</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Home</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Tentang Kami</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Layanan</a>
                                <!-- <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Meet The Team</a> -->
                                <!-- <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Latest Blog</a> -->
                                <a class="text-white" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Kontak
                                    Us</a>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-white mb-4">Popular Links</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Home</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>About Us</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Our
                                    Services</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Meet The Team</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Latest Blog</a>
                                <a class="text-white" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Contact
                                    Us</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-n5">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                        <!-- <h4 class="text-white">Newsletter</h4>
                        <h6 class="text-white">Subscribe Our Newsletter</h6>
                        <p>Amet justo diam dolor rebum lorem sit stet sea justo kasd</p> -->
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; <a class="text-secondary fw-bold" href="#">BSPID</a>. All Rights Reserved.
                Designed by <a class="text-secondary fw-bold" href="https://miga.co.id">IT</a></p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/lib/counterup/counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url(); ?>assets/frontend/js/main.js"></script>
</body>

</html>