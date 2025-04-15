<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?= @$_head; ?>

<body class="hold-transition login-page " style="background-image: url(<?= base_url('/assets/images/' . $background); ?>);
    background-size: 100vw 100vh;
    background-repeat: no-repeat;
    background-position: center center;">
    <!-- <body class="hold-transition login-page "> -->
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="<?= base_url('/assets/images/' . $sitelogo); ?>" alt="Logo" height="100">
                <br> <?php echo $_SERVER['HTTP_HOST']; ?>
            </div>
            <!-- content -->
            <?= @$_content; ?>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <?= @$_jquery; ?>
</body>
<?php echo (ENVIRONMENT === 'development') ?  '<strong>' . CI_VERSION . '</strong>' : '' ?>

</html>