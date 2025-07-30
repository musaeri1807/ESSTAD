<!-- App Header -->
<div class="appHeader">
  <div class="left">
    <a href="<?= base_url('settings'); ?>" class="headerButton goBack">
      <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
  </div>
  <div class="pageTitle">
    Settings
  </div>
  <div class="right">
    <!-- <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a> -->
  </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
  <div class="section mt-1 text-center">
    <h1><?= $Title; ?></h1>
    <h3></h3>
  </div>
  <div class="section mb-5 p-2">
    <form action="<?= base_url('change-nomor'); ?>" method="POST">
      <div class="card">
        <div class="card-body pb-1">
          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="email1">Nomor</label>
              <input type="tel" inputmode="numeric" name="nomor" class="form-control" placeholder="Masukan Nomor WhatApp (08)" required>

              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
              <input type="hidden" name="token" class="form-control" value="<?= $token; ?>" required>
            </div>
          </div>
        </div>
      </div>

      <div class="form-links mt-2">
      </div>
      <div class="form-button-group  transparent">
        <button type="submit" name="OTP_account" class="btn btn-success btn-block btn-lg" value="account_verification">Simpan</button>
      </div>
    </form>
  </div>
</div>
<!-- * App Capsule -->