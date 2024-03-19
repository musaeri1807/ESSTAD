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
                <span class="d-none d-lg-block">NiceAdmin</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  <?php if (!empty(form_error('email'))) {
                    $this->session->set_flashdata('message', '<span class="text-danger small pt-1 fw-bold"><p class="text-center small">This email has already registered!</p></span>');
                    echo  $this->session->flashdata('message');
                  } else {
                    echo '<span class="text-warning small pt-1 fw-bold"><p class="text-center small">Enter your personal details to create account</p></span>';
                  }

                  ?>
                </div>

                <form class="row g-3 needs-validation" method="post" action="<?= base_url('Authorization/signup'); ?>" novalidate>
                  <div class="col-12">
                    <label for="yourName" class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" id="yourName" placeholder="Enter your name!" required>
                    <div class="invalid-feedback">Please, enter your name!</div>
                  </div>

                  <div class="col-12">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="email" class="form-control" id="yourEmail" placeholder="Enter a valid Email" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Phone Number</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">+62</span>
                      <input type="text" name="phone" class="form-control" id="yourUsername" placeholder="Enter a valid Phone" required>
                      <div class="invalid-feedback">Please choose a Phone active.</div>
                    </div>
                  </div>
                  <?= form_error('phone') ?>
                  <!-- <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Enter your password!" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div> -->

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                      <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                      <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="<?= base_url('Authorization'); ?>">Log in</a></p>
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