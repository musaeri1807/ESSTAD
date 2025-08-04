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

<body class="bg-white">

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
        <div class="pageTitle">
            Detil Transaksi
        </div>
        <!-- <div class="right">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#DialogBasic">
                <ion-icon name="trash-outline"></ion-icon>
            </a>
        </div> -->
    </div>
    <!-- * App Header -->

    <!-- Dialog Basic -->
    <!-- <div class="modal fade dialogbox" id="DialogBasic" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">CANCEL</a>
                        <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">DELETE</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- * Dialog Basic -->

    <!-- App Capsule -->
    <div id="appCapsule" class="full-height">

        <div class="section mt-2 mb-2">


            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <!-- <div class="iconbox">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div> -->
                </div>
                <h3 class="text-center mt-2"><?= $transaksi_detail['nomor_transaksi']; ?></h3>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Status</strong>
                    <?php if ($transaksi_detail['Status']     == 'S') {
                        echo '<span class="text-success">Sukses</span>';
                    } else if ($transaksi_detail['Status']    == 'P') {
                        echo '<span class="text-warning">Pending</span>';
                    } else if ($transaksi_detail['Status']    == 'C') {
                        echo '<span class="text-danger">Dibatalkan</span>';
                    } else if ($transaksi_detail['Status']    == 'R') {
                        echo '<span class="text-danger">Ditolak</span>';
                    } else if ($transaksi_detail['Status']    == 'W') {
                        echo '<span class="text-danger">Menunggu Persetujuan</span>';
                    }
                    ?>

                </li>
                <!-- <li>
                    <strong>To</strong>
                    <span>Jordi Santiago</span>
                </li> -->
                <!-- <li>
                    <strong>Nama BSP</strong>
                    <span></span>
                </li> -->
                <li>
                    <strong>Transaksi</strong>
                    <span>
                        <?php if ($transaksi_detail['W_tipe'] == '201') {
                            # cetak fisik...
                            echo "Cetak Fisik";
                        } else if ($transaksi_detail['W_tipe'] == '202') {
                            # buyback...
                            echo "Buyback";
                        } else {
                            # Deposit...
                            echo "Pemasukan";
                        }
                        ?>


                    </span>
                </li>
                <li>
                    <strong>Tanggal</strong>
                    <span><?= format_tanggal($transaksi_detail['tanggal']); ?></span>
                </li>
                <li>
                    <strong>Jumlah Rupiah</strong>
                    <span>
                        <?php if ($transaksi_detail['tipe'] == '100') {
                            echo number_format($transaksi_detail['D_rp']);
                        } else if ($transaksi_detail['tipe'] == '200') {
                            echo number_format($transaksi_detail['W_rp']);
                        } else if ($transaksi_detail['tipe'] == '300') {
                            echo number_format($transaksi_detail['kredit']);
                        }
                        ?>
                    </span>
                </li>
                <li>
                    <strong>Jumlah Emas</strong>
                    <span>
                        <?php if ($transaksi_detail['tipe'] == '100') {
                            echo $transaksi_detail['kredit'];
                        } else if ($transaksi_detail['tipe'] == '200') {
                            echo $transaksi_detail['debet'];
                        } else if ($transaksi_detail['tipe'] == '300') {
                            echo $transaksi_detail['kredit'];
                        }
                        ?>
                    </span>
                </li>
            </ul>


        </div>

    </div>
    <!-- * App Capsule -->




    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <!-- <a href="index.html" class="item">
            <div class="col">
                <ion-icon name="pie-chart-outline"></ion-icon>
                <strong>Overview</strong>
            </div>
        </a> -->
        <!-- <a href="app-pages.html" class="item">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>Pages</strong>
            </div>
        </a> -->
        <a href="<?= base_url() ?>" class="item">
            <div class="col">
                <ion-icon name="apps-outline"></ion-icon>
                <strong>Menu</strong>
            </div>
        </a>
        <!-- <a href="app-cards.html" class="item">
            <div class="col">
                <ion-icon name="card-outline"></ion-icon>
                <strong>My Cards</strong>
            </div>
        </a>
        <a href="app-settings.html" class="item">
            <div class="col">
                <ion-icon name="settings-outline"></ion-icon>
                <strong>Settings</strong>
            </div>
        </a> -->
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


</body>

</html>