<div class="card-body">

  <?php if ($this->session->flashdata('message') == null) {
    echo '<span class="text-primary  pt-1 fw-bold"><p class="login-box-msg">Sign in to start your session</p></span>';
  } else {
    echo  $this->session->flashdata('message');
  }
  ?>

  <form action="<?= base_url('Authorization'); ?>" method="post">

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
      </div>
      <input type="text" name="username" class="form-control" placeholder="Email Or Phone" value="<?php if (isset($_COOKIE['loginUsername'])) {
                                                                                                    echo $_COOKIE['loginUsername'];
                                                                                                  } else {
                                                                                                    echo set_value('username');
                                                                                                  }
                                                                                                  ?>" required>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
      </div>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php if (isset($_COOKIE['loginPassword'])) {
                                                                                                                echo $_COOKIE['loginPassword'];
                                                                                                              } else {
                                                                                                                echo set_value('password');
                                                                                                              }
                                                                                                              ?>" required>
      <!-- show password -->
      <div class="input-group-append">
        <span class="input-group-text" onclick="password_show_hide();">
          <i class="fas fa-eye" id="show_eye"></i>
          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
        </span>
      </div>
      <!-- show password -->
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


</div>
<!-- /.card-body -->