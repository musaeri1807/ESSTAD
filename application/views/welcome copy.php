<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link href="<?= base_url(); ?>/assets/dist/dist/css/robust.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-lg navbar-expand-lg navbar-transparant navbar-dark navbar-absolute w-100">
        <div class="container">
            <a class="navbar-brand" href="index.php"><?php echo 'Internet Banking'; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" target="_blank" href="<?= base_url('authorization'); ?>">Admin Portal</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" target="_blank" href="<?= base_url('authorization'); ?>">Staff Portal</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" target="_blank" href="<?= base_url('authorization'); ?>">Client Portal</a>
                    </li>
                </ul>
                <a class="btn btn-danger" href="<?= base_url('authorization/signup'); ?>" target="_blank">Join Us</a>
            </div>
        </div>
    </nav>

    <div class="intro py-5 py-lg-9 position-relative text-white">
        <div class="bg-overlay-gray">
            <img src="<?= base_url(); ?>/assets/dist/dist/bg.webp" class="img-fluid img-cover" />
        </div>
        <div class="intro-content py-6 text-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto text-center">
                        <h1 class="my-3 display-4 d-none d-lg-inline-block"><?php echo 'Internet Banking'; ?></h1>
                        <p class="lead mb-3">
                            <?php echo 'Kesuksesan finansial disetiap layanan yang kami tawarkan.'; ?>
                        </p>
                        <br>
                        <a class="btn btn-success btn-lg mr-lg-2 my-1" target="_blank" href="<?= base_url('authorization/signup'); ?>" role="button">Get started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>/assets/dist/dist/js/bundle.js"></script>
</body>

</html>