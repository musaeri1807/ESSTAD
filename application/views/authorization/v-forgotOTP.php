<div class="card-body">
  <?php if ($this->session->flashdata('message') == null) {
    echo '<span class="text-primary"><p class="login-box-msg"><b>OTP</b></p></span>';
  } else {
    echo  $this->session->flashdata('message');
  }
  ?>
  <!-- <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p> -->
  <p class="login-box-msg"><?= $this->session->userdata('NumberPhone'); ?></p>
  <form action="<?= base_url('authorization/verifyOTP'); ?>" method="post">
    <div class="input-group mb-3">
      <input type="number" name="username" class="form-control" placeholder="xxxxxx" required>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <?php echo $widget; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-warning btn-block"><b>Submit</b></button>
      </div>
      <!-- /.col -->
    </div>
  </form>
  <p class="mt-3">
  </p>
</div>
<!-- /.login-card-body -->