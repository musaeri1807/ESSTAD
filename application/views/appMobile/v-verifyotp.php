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
    <h1>Masukkan Kode WhatsApp</h1>
    <h4>Masukkan 6 digit WhatsApp <?= $this->session->userdata('NumberPhone'); ?> Kode Verifikasi</h4>
  </div>
  <div class="section mb-5 p-2">
    <form action="<?= base_url('verify-otp'); ?>" method="POST">
      <div class="form-group basic">
        <input type="tel" inputmode="numeric" name="smscode" class="form-control verification-input" id="smscode" placeholder="•••••"
          maxlength="6" required>
        <input type="hidden" name="token" class="form-control" value="<?= $token; ?>" required>
      </div>

      <div class="form-button-group transparent">
        <button type="submit" class="btn btn-success btn-block btn-lg">Verify</button>
      </div>

    </form>
  </div>

</div>
<!-- * App Capsule -->