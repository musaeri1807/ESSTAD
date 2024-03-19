<?php $title = "EMPLOYEE SELF SERVICE TAD" ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">

  <!-- <body class="hold-transition skin-red-light login-page"> -->
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="<?= base_url(); ?>/assets/images/signin.png" alt="" height="90">
      </div>
      <div class="card-body">
        <?php if ($this->session->flashdata('message') == null) {
          echo '<span class="text-primary  pt-1 fw-bold"><p class="login-box-msg">Sign in to start your session</p></span>';
        } else {
          echo  $this->session->flashdata('message');
        }
        ?>
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->

        <form action="<?= base_url('Authorization'); ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Email Or Phone" value="<?php if (isset($_COOKIE['loginUsername'])) {
                                                                                                          echo $_COOKIE['loginUsername'];
                                                                                                        } else {
                                                                                                          echo set_value('username');
                                                                                                        }
                                                                                                        ?>" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if (isset($_COOKIE['loginPassword'])) {
                                                                                                        echo $_COOKIE['loginPassword'];
                                                                                                      } else {
                                                                                                        echo set_value('password');
                                                                                                      }
                                                                                                      ?>" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-append">
              <?php echo $widget; ?>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="rememberMe" <?php if (isset($_COOKIE['loginUsername'])) {
                                                                          echo "checked";
                                                                        }
                                                                        ?>>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-1">Don't have account..? <a href="<?= base_url('Authorization/signup'); ?>">Create an account</a><br><a href="<?= base_url('Authorization/forgot'); ?>">I forgot my password</a>
        <p class="mb-1">
          <!-- <a href="forgot-password.html">I forgot my password</a> -->
        </p>
        <p class="mb-0">
          <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src='https://www.google.com/recaptcha/api.js'></script>

  <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
</body>

</html>