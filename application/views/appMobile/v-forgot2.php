<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
  <div class="left">
    <a href="<?= base_url('login'); ?>" class="headerButton goBack">
      <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
  </div>
  <div class="pageTitle"></div>
  <div class="right">
  </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

  <div class="section mt-2 text-center">
    <h1>Forgot password</h1>
    <h4></h4>
    <h3> <?= $Subtitle; ?> </h3>
  </div>
  <div class="section mb-5 p-2">
    <form action="<?= base_url('forgot'); ?>" method="POST">
      <div class="card">
        <div class="card-body pb-1">

          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="email1">Username</label>
              <input type="text" name="username" class="form-control" id="email1" placeholder="Your e-mail or WhatApp (08)" required>
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-1">
        <div class="card-body">
          <?= $widget; ?>
        </div>
      </div>

      <div class="form-button-group transparent">
        <button type="submit" class="btn btn-success btn-block btn-lg">Reset Password</button>
      </div>

    </form>
  </div>

</div>
<!-- * App Capsule -->