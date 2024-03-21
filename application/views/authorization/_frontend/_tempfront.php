<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?= @$_head; ?>

<body class="hold-transition login-page " style="background-image: url(<?= base_url(); ?>/assets/images/bg.jpg);">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="<?= base_url(); ?>/assets/images/signin.png" alt="Logo ESSTAD" height="90">
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

</html>