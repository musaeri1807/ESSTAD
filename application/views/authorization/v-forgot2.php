<div class="card-body">
  <p class="login-box-msg"><b>Reset Password Akun Anda</b></p>
  <form action="<?= base_url('forgot'); ?>" method="post">
    <div class="input-group mb-3">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-users"></span>
        </div>
      </div>
      <input type="text" name="username" class="form-control" placeholder="Masukan  Email atau WhatsApp (08)" required>
      <!-- <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div> -->
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <?php echo $widget; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" name="reset" class="btn btn-block bg-gradient-primary" value="reset">Minta password baru</button>
      </div>
    </div>
  </form>
  <p class="mt-3">
    <a href="<?= base_url('login'); ?>" class="btn btn-block btn-outline-primary">Login</a>
  </p>
</div>
<!-- /.login-card-body -->