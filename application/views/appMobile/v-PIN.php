<!-- App Header -->
<div class="appHeader">
  <div class="left">
    <a href="<?= base_url('user-settings'); ?>" class="headerButton goBack">
      <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
  </div>
  <div class="pageTitle">
    Verifikasi
  </div>
  <div class="right">

  </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

  <div class="section mt-2 text-center">
    <h1><?= $Title; ?></h1><!-- PIN -->
    <h4>Masukkan 6 digit PIN Anda</h4><!-- Masukkan 6 digit PIN Anda -->

  </div>
  <div class="section mb-5 p-2">
    <form action="<?= base_url('verify-pin'); ?>" method="POST">
      <div class="form-group basic">
        <input type="tel" inputmode="numeric" name="pincode" class="form-control verification-input" id="pincode" placeholder="••••••"
          maxlength="6" required>
        <input type="hidden" name="token" class="form-control" value="<?= $token; ?>" required>
      </div>
      <div class="form-button-group transparent">
        <button type="submit" class="btn btn-success btn-block btn-lg">verify</button>
      </div>

    </form>
  </div>

</div>
<!-- * App Capsule -->