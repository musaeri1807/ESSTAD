<div class="card-body">
  <?php if ($this->session->flashdata('message') == null) {
    echo '<span class="text-primary"><p class="login-box-msg">Enter your username | email to reset</p></span>';
  } else {
    echo  $this->session->flashdata('message');
  }
  ?>
  <!-- <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p> -->
  <form action="<?= base_url('authorization/forgot'); ?>" method="post">
    <div class="input-group mb-3">
      <input type="text" name="username" class="form-control" placeholder="Email" required>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
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
        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
  <p class="mt-3">
    Already have an account? <a href="<?= base_url('authorization'); ?>">Login</a>
  </p>
</div>
<!-- /.login-card-body -->