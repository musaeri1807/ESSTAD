<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
  <div class="left">
  </div>
  <div class="pageTitle"></div>
  <div class="right">
  </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

  <div class="section mt-2 text-center">
    <h1>Change Password now</h1>
    <h4>your to account <b><?= $this->session->userdata('UserName'); ?></b></h4>
  </div>
  <div class="section mb-5 p-2">
    <form action="<?= base_url('change-password'); ?>" method="post">
      <div class="card">
        <div class="card-body">
          <div class="form-group basic">
            <div class=" input-wrapper">
              <label class="label" for="password1" onclick="password_show_hide();">Password</label>
              <input type="password" name="password1" class="form-control" id="password" placeholder="Password" required>
              <!-- show password -->
              <i class="fas fa-eye" id="show_eye"></i>
              <i class="fas fa-eye-slash d-none" id="hide_eye"></i>

              <!-- show password -->

              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>

            </div>
          </div>
          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="password2" onclick="password_show_hidee();">Password Again</label>
              <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm Password" required>
              <!-- show password -->

              <i class="fas fa-eye" id="show_eyee"></i>
              <i class="fas fa-eye-slash d-none" id="hide_eyee"></i>

              <!-- show password -->

              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
            </div>
          </div>
          <div class="custom-control custom-checkbox mt-2 mb-1">
            <span class="text-danger ">
              <p class="login-box-msg small">Minimum password length of 7 characters.</p>
            </span>
          </div>
        </div>
      </div>
      <div class="form-button-group transparent">
        <button type="submit" class="btn btn-success btn-block btn-lg">Save Password</button>
      </div>
    </form>
  </div>

</div>
<!-- * App Capsule -->