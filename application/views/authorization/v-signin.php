<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <?= $this->session->userdata('email'); ?>
            <div class="d-flex justify-content-center py-4">
              <a href="<?= base_url('Authorization/logout'); ?>" class="logo d-flex align-items-center w-auto">
                <img src="<?= base_url(); ?>niceadmin/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block"><?= $Title; ?></span>
              </a>

            </div><!-- End Logo -->

            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4"><?= $CardTitle; ?> </h5>
                  <?php if ($this->session->flashdata('message') == null) {
                    echo '<span class="text-danger small pt-1 fw-bold"><p class="text-center small">Enter your username & password to login</p></span>';
                  } else {
                    echo  $this->session->flashdata('message');
                  }
                  ?>
                </div>
                <form class="row g-3 needs-validation" method="post" action="<?= base_url('Authorization'); ?>" novalidate>
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" placeholder="Email Or Phone" value="<?php if (isset($_COOKIE['loginUsername'])) {
                                                                                                                                      echo $_COOKIE['loginUsername'];
                                                                                                                                    } else {
                                                                                                                                      echo set_value('username');
                                                                                                                                    }
                                                                                                                                    ?>" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Password" value="<?php if (isset($_COOKIE['loginPassword'])) {
                                                                                                                                  echo $_COOKIE['loginPassword'];
                                                                                                                                } else {
                                                                                                                                  echo set_value('password');
                                                                                                                                }
                                                                                                                                ?>" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="rememberMe" value="true" id="rememberMe" <?php if (isset($_COOKIE['loginUsername'])) {
                                                                                                                        echo "checked";
                                                                                                                      }
                                                                                                                      ?>>
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="<?= base_url('Authorization/signup'); ?>">Create an account</a><br><a href="<?= base_url('Authorization/forgot'); ?>">Forgot Password</a>
                    </p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->