<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="bank sampah pintar" content="yes" />
    <meta name="bank sampah pintar" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>BSP</title>
    <meta name="description" content="layanan digital Bank Sampah Pintar BPSID untuk nasabah">
    <meta name="keywords"
        content="Akses layanan digital Bank Sampah Pntar BPSID untuk nasabah. Login, registrasi, dan kelola akun Anda." />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/appmobile/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/appmobile/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/appmobile/assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?= base_url() ?>/assets/appmobile/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Transaksi</div>
        <div class="right">
            <!-- <a href="#" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a> -->
        </div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->
    <!-- <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="input-icon icon ion-ios-search"></i>
                <a href="#" class="ms-1 close toggle-searchbox"><i class="icon ion-ios-close-circle"></i></a>
            </div>
        </form>
    </div> -->
    <!-- * Search Component -->

    <!-- Extra Header -->
    <div class="extraHeader">
        <form class="search-form">
            <div class="form-group searchbox mt ">
                <input type="date" name="awal" class="form-control">
                <input type="date" name="akhir" class="form-control">
                <!-- <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i> -->
                
            </div>
            <div class="form-group mt 2">
                
            </div>
        </form>
    </div>
    <!-- * Extra Header -->

    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active full-height">


        <div class="section mt-1 mb-2">
            <a href="#" class="btn btn-block btn-success">cari</a>
            <div class="section-title">Found 43 results for "<span class="text-primary">Deposit</span>"</div>
            <div class="card">
                
                <ul class="listview image-listview media transparent flush">
                    <li>
                        <a href="#" class="item">
                            <div class="imageWrapper">
                                <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w64">
                            </div>
                            <div class="in">
                                <div>
                                    What will be the value of bitcoin in the next...
                                    <div class="text-muted">Lorem ipsum dolor sit amet...</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="imageWrapper">
                                <img src="assets/img/sample/photo/2.jpg" alt="image" class="imaged w64">
                            </div>
                            <div class="in">
                                <div>
                                    Rules you need to know in business
                                    <div class="text-muted">Lorem ipsum dolor sit amet...</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="imageWrapper">
                                <img src="assets/img/sample/photo/3.jpg" alt="image" class="imaged w64">
                            </div>
                            <div class="in">
                                <div>
                                    10 easy ways to save your money
                                    <div class="text-muted">Lorem ipsum dolor sit amet...</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="imageWrapper">
                                <img src="assets/img/sample/photo/4.jpg" alt="image" class="imaged w64">
                            </div>
                            <div class="in">
                                <div>
                                    Follow the financial agenda with...
                                    <div class="text-muted">Lorem ipsum dolor sit amet...</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="imageWrapper">
                                <img src="assets/img/sample/photo/5.jpg" alt="image" class="imaged w64">
                            </div>
                            <div class="in">
                                <div>
                                    Does it make sense to invest in cryptocurrencies
                                    <div class="text-muted">Lorem ipsum dolor sit amet...</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- <div class="section mb-2">
            <a href="#" class="btn btn-block btn-secondary">Load More</a>
        </div> -->




    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">


        <a href="app-components.html" class="item">
            <div class="col">
                <ion-icon name="apps-outline"></ion-icon>
                <strong>menu</strong>
            </div>
        </a>


    </div>
    <!-- * App Bottom Menu -->


    <!--load swal js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/assets/appmobile/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?= base_url() ?>/assets/appmobile/assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?= base_url() ?>/assets/appmobile/assets/js/base.js"></script>

    <script>
        // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tipeSelect = document.getElementById('tipeTransaksi');
            const inputRupiah = document.getElementById('inputRupiah');
            const inputGram = document.getElementById('inputGram');

            function toggleInput() {
                const tipe = tipeSelect.value;

                if (tipe === "202") { // Buyback
                    inputRupiah.style.display = "block";
                    inputGram.style.display = "none";
                } else if (tipe === "1") { // Pembelian
                    inputRupiah.style.display = "block";
                    inputGram.style.display = "none";
                } else if (tipe === "201") { // Cetak Fisik
                    inputRupiah.style.display = "none";
                    inputGram.style.display = "block";
                } else {
                    // Default jika tidak dikenali
                    inputRupiah.style.display = "none";
                    inputGram.style.display = "none";
                }
            }

            tipeSelect.addEventListener('change', toggleInput);
            toggleInput(); // Panggil saat halaman pertama kali load
        });
    </script>


    <!-- Pesan Error -->
    <?php if ($this->session->flashdata('message_error')): ?>
        <script>
            Swal.fire({
                title: 'Kesalahan...!!!',
                text: '<?= $this->session->flashdata('message_error'); ?>',
                icon: 'error',
                // showConfirmButton: false,
                // confirmButtonText: 'Try Again',
                // timer: 1500
            });
        </script>
    <?php endif; ?>
    <!-- Pesan warning -->
    <?php if ($this->session->flashdata('message_warning')): ?>
        <script>
            Swal.fire({
                title: 'Peringatan...!!!',
                text: '<?= $this->session->flashdata('message_warning'); ?>',
                icon: 'warning',
                // showConfirmButton: false,
                // confirmButtonText: 'Try Again',
                // timer: 1500
            });
        </script>
    <?php endif; ?>

    <!-- Pesan info -->
    <?php if ($this->session->flashdata('message_info')): ?>
        <script>
            Swal.fire({
                title: 'Informasi...!!!',
                text: '<?= $this->session->flashdata('message_info'); ?>',
                icon: 'info'
                // confirmButtonText: 'Lanjutkan'
            });
        </script>
    <?php endif; ?>
    <!-- Pesan success login -->
    <?php if ($this->session->flashdata('message_success')): ?>
        <script>
            Swal.fire({
                title: 'Success...!!!',
                text: '<?= $this->session->flashdata('message_success'); ?>',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500 // Durasi dalam milidetik
            });
            // Arahkan setelah timer selesai
            setTimeout(() => {
                window.location.href = '<?= site_url("login"); ?>'; // Arahkan ke Home Page
            }, 1500); // Sesuaikan dengan timer SweetAlert
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('clear_all_session_msg_success')): ?>
        <script>
            Swal.fire({
                title: 'Success...!!!',
                text: '<?= $this->session->flashdata('clear_all_session_msg_success'); ?>',
                icon: 'success'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('Authorization/clear_all_session') ?>";
                }
            });
        </script>
    <?php endif; ?>

    <!-- Pesan success -->
    <?php if ($this->session->flashdata('msg_success')): ?>
        <script>
            Swal.fire({
                title: 'Success...!!!',
                text: '<?= $this->session->flashdata('msg_success'); ?>',
                icon: 'success',
                // confirmButtonText: 'Lanjutkan'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         window.location.href = ''; // Arahkan ke Authorization
                //     }
            });
        </script>
    <?php endif; ?>

    <!-- Pesan form validation -->
    <?php if (validation_errors()): ?>
        <script>
            Swal.fire({
                title: 'Error validation...!!!',
                text: <?= json_encode(strip_tags(validation_errors())); ?>,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

</body>

</html>