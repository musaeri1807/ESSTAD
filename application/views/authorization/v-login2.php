<div class="card-body">

  <form action="<?= base_url('login'); ?>" method="post">
    <div class="row mb-2">
      <div class="col-8">
        <div class="icheck-primary">
          <span> <b>Masuk <?= $name_application  ?></b></span>
        </div>
      </div>
      <div class="col-4">
        <a href="<?= base_url('register'); ?>" type="submit" class="btn btn-block btn-outline-primary">Daftar</a>
      </div>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-users"></i></span>
      </div>
      <input type="text" name="username" class="form-control" placeholder="Email atau WhatsApp (08)" value="<?php if (isset($_COOKIE['loginUsername'])) {
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
        <?= $widget; ?>
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
            <!-- Remember Me -->
            Ingatkan
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-block bg-gradient-primary">Masuk</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
  <p class="mt-3">
    <a href="<?= base_url('forgot'); ?>" type="submit" class="btn btn-block btn-outline-primary">Saya lupa password</a>
    <a href="<?= base_url('otp'); ?>" type="submit" class="btn btn-block btn-outline-primary">Masuk dengan OTP</a>

  </p>
</div>
<!-- /.card-body -->