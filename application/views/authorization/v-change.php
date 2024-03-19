<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center py-4">
              <a href="<?= base_url(); ?>" class="logo d-flex align-items-center w-auto">
                <img src="<?= base_url(); ?>niceadmin/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block"><?= $Title; ?></span>
              </a>
            </div><!-- End Logo -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4"><?= $CardTitle; ?> </h5>
                  <?php if (!empty(form_error('password1'))) {
                    $this->session->set_flashdata('message', '<span class="text-danger small pt-1 fw-bold"><p class="text-center small">The Password field does not match the Repeat Password field.!</p></span>');
                    echo  $this->session->flashdata('message');
                  } else {
                    echo '<span class="text-warning small pt-1 fw-bold"><p class="text-center small">Change password new your to account</p></span>';
                  }

                  ?>
                </div>
                <form class="row g-3 needs-validation" method="post" action="<?= base_url('Authorization/changepassword'); ?>" novalidate>
                  <div class="col-12">
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" value="<?= $this->session->userdata('reset_email'); ?>" readonly>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <input type="password" name="password1" class="form-control" id="yourPassword" placeholder="Password" required>
                    <div class="invalid-feedback">Please enter your password!</div>

                  </div>
                  <div class="col-12">
                    <input type="password" name="password2" class="form-control" id="yourPassword" placeholder="Confirmation Password" required>
                    <div class="invalid-feedback">Please enter your Confirmation password!</div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Change</button>
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