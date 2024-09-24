<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?= @$_head; ?>

<body class="hold-transition login-page " style="background-image: url(<?= base_url('/assets/images/' . $background); ?>);">
    <!-- <body class="hold-transition login-page "> -->
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="<?= base_url('/assets/images/' . $sitelogo); ?>" alt="Logo Aplikasi" height="90">
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