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

  <div class="section mt-2 text-center">
    <h1>PIN</h1>
    <h4>Masukkan 6 digit PIN <?= $this->session->userdata('NumberPhone'); ?> Anda</h4>
  </div>
  <div class="section mb-5 p-2">
    <form action="<?= base_url('users/updatePIN'); ?>" method="POST">
      <div class="form-group basic">
        <input type="tel" inputmode="numeric" name="smscode" class="form-control verification-input" id="smscode" placeholder="•••••"
          maxlength="6" required>
        <input type="hidden" name="token" class="form-control" value="<?= $token; ?>" required>
      </div>
      <div class="form-button-group transparent">
        <button type="submit" class="btn btn-success btn-block btn-lg">Simpan</button>
      </div>

    </form>
  </div>

</div>
<!-- * App Capsule -->