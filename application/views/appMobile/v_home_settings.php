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

    <!-- <div id="loader">
        <img src="assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div> -->

    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="<?= base_url('login') ?>" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Settings
        </div>
        <div class="right">
            <!-- <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a> -->
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#">
                    <img src="<?= base_url() ?>/assets/appmobile/assets/img/sample/avatar/default.svg" alt="avatar" class="imaged w100 rounded">
                    <span class="button">
                        <ion-icon name="camera-outline"></ion-icon>
                    </span>
                </a>
            </div>
        </div>

        <!-- <div class="listview-title mt-1">Theme</div>
        <ul class="listview image-listview text inset no-line">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Dark Mode
                        </div>
                        <div class="form-check form-switch  ms-2">
                            <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                            <label class="form-check-label" for="darkmodeSwitch"></label>
                        </div>
                    </div>
                </div>
            </li>
        </ul> -->

        <!-- <div class="listview-title mt-1">Notifications</div>
        <ul class="listview image-listview text inset">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Payment Alert
                            <div class="text-muted">
                                Send notification when new payment received
                            </div>
                        </div>
                        <div class="form-check form-switch  ms-2">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
                            <label class="form-check-label" for="SwitchCheckDefault1"></label>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Notification Sound</div>
                        <span class="text-primary">Beep</span>
                    </div>
                </a>
            </li>
        </ul> -->

        <div class="listview-title mt-1">Profile Settings</div>
        <ul class="listview image-listview text inset">
            <li>
                <a href="<?= base_url('change-nomor'); ?>" class="item">
                    <div class="in">
                        <div>WhatsApp</div>
                        <span class="listview-title mt-1"><?= $user['phone']; ?></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('change-email'); ?>" class="item">
                    <div class="in">
                        <div>E-mail</div>
                        <span class="listview-title mt-1"><?= $user['email']; ?></span>
                    </div>
                </a>
            </li>
            <!-- <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Address</div>
                        <span class="text-primary">Edit</span>
                    </div>
                </a>
            </li> -->
            <!-- <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Private Profile
                        </div>
                        <div class="form-check form-switch ms-2">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckDefault2">
                            <label class="form-check-label" for="SwitchCheckDefault2"></label>
                        </div>
                    </div>
                </div>
            </li> -->
        </ul>

        <div class="listview-title mt-1">Security</div>
        <ul class="listview image-listview text mb-2 inset">
            <li>
                <a href="<?= base_url('change-password'); ?>" class="item">
                    <div class="in">
                        <div>Update Password</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('change-pin'); ?>" class="item">
                    <div class="in">
                        <div>PIN</div>
                    </div>
                </a>
            </li>
            <!-- <li>
                <div class="item">
                    <div class="in">
                        <div>
                            2 Step Verification
                        </div>
                        <div class="form-check form-switch ms-2">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckDefault3" checked />
                            <label class="form-check-label" for="SwitchCheckDefault3"></label>
                        </div>
                    </div>
                </div>
            </li> -->
            <!-- <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Log out all devices</div>
                    </div>
                </a>
            </li> -->
        </ul>


    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <div class="appBottomMenu">


        <a href="<?= base_url() ?>" class="item active">
            <div class="col">
                <ion-icon name="apps-outline"></ion-icon>
                <strong>Menu</strong>
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