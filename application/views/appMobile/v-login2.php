<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
  <div class="left">
    <a href="<?= base_url('login'); ?>" class="headerButton goBack">
      <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
  </div>
  <div class="pageTitle"></div>
  <div class="right">
    <a href="<?= base_url('register'); ?>" type="submit" class="btn btn-block btn-outline-success">Daftar</a>
  </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
  <div class="section mt-1 text-center">
    <!-- <img src="<?= base_url('/assets/images/' . $sitelogo); ?>" alt="Logo" height="70"> -->
    <h1><?= $Title; ?></h1>
    <h3><?= $description; ?></h3>
  </div>
  <div class="section mb-5 p-2">
    <form action="<?= base_url('login'); ?>" method="POST">
      <div class="card">
        <div class="card-body pb-1">
          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="email1">Pengguna</label>
              <input type="text" name="username" class="form-control" placeholder="Masukan e-mail atau WhatApp (08)" value="<?php if (isset($_COOKIE['loginUsername'])) {
                                                                                                                              echo $_COOKIE['loginUsername'];
                                                                                                                            } else {
                                                                                                                              echo set_value('username');
                                                                                                                            }
                                                                                                                            ?>" required>
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
            </div>
          </div>
          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="password1" onclick="password_show_hide();">Kata Sandi</label>
              <!-- <input type="password" class="form-control" id="password1" autocomplete="off"
                placeholder="Your password"> -->
              <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Kata sandi Anda" value="<?php if (isset($_COOKIE['loginPassword'])) {
                                                                                                                                        echo $_COOKIE['loginPassword'];
                                                                                                                                      } else {
                                                                                                                                        echo set_value('password');
                                                                                                                                      }
                                                                                                                                      ?>" required>
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
              <!-- show password -->
              <i class="fas fa-eye" id="show_eye"></i>
              <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
              <!-- show password -->
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-1">
        <div class="card-body">
          <?= $widget; ?>
          <div class="custom-control custom-checkbox mt-2 mb-1">
            <div class="form-check">
              <!-- <input type="checkbox" class="form-check-input" id="customCheckb1"> -->
              <input type="checkbox" class="form-check-input" id="customCheckb1" name="rememberMe" <?php if (isset($_COOKIE['loginUsername'])) {
                                                                                                      echo "checked";
                                                                                                    }
                                                                                                    ?>>
              <label class="form-check-label" for="customCheckb1">
                Ingat Saya
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-links mt-2">
        <div>
          <!-- <a href="app-register.html">Log in OTP</a> -->
          <a href="<?= base_url('otp'); ?>" type="submit" class="btn btn-block btn-outline-success">Masuk OTP</a>
        </div>
        <div><a href="<?= base_url('forgot'); ?>" class="text-muted">Lupa Kata Sandi?</a></div>
        <!-- app-forgot-password.html -->
      </div>
      <div class="form-button-group  transparent">
        <button type="submit" class="btn btn-success btn-block btn-lg">Masuk</button>
      </div>
    </form>
  </div>
</div>
<!-- * App Capsule -->