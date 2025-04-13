<div class="card-body">
  <!-- <?= $this->session->flashdata('message'); ?> -->

  <!-- <span class="text-danger">
    <p class="login-box-msg"><?= validation_errors(); ?></p>
  </span> -->
  <!-- <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p> -->
  <form action="<?= base_url('authorization/signinOTP'); ?>" method="post">
    <div class="row mb-2">
      <div class="col-8">
        <div class="icheck-primary">
          <span> <b>Masuk dg OTP</b></span>
        </div>
      </div>
      <div class="col-4">
        <a href="<?= base_url('register'); ?>" type="submit" class="btn btn-block btn-outline-primary">Daftar</a>
      </div>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-phone"></span>
        </div>
      </div>
      <input type="tel" inputmode="numeric" name="username" class="form-control" placeholder="Masukan nomor HP 08xxx" required>

    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <?php echo $widget; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" name="OTP" class="btn btn-block bg-gradient-primary" value="signin">Kirim Kode OTP</button>
      </div>
    </div>
  </form>
  <p class="mt-3">
    <a href="<?= base_url('login'); ?>" class="btn btn-block btn-outline-primary">Kembali</a>
  </p>
</div>
<!-- /.login-card-body -->