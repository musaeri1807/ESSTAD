<div class="card-body">
  <?php if (!empty(form_error('terms'))) {
    $this->session->set_flashdata('message', '<span class="text-danger"><p class="login-box-msg">Checkbox is unchecked.!</p></span>');
    echo $this->session->flashdata('message');
  } elseif ($this->session->flashdata('message') == 'recaptcha') {
    echo  '<span class="text-danger "><p class="login-box-msg">Checkbox is unchecked in Recaptcha</p></span>';
  } elseif ($this->session->flashdata('message') == 'false') {
    echo  '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha.!</p></span>';
  } else {
    echo '<span class="text-primary"> <p class="login-box-msg">Register a new membership</p></span>';
  }
  ?>
  <form action="<?= base_url('authorization/signup'); ?>" method="post">
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
      </div>
      <input type="text" name="name" class="form-control" placeholder="Full name" value="<?= set_value('name'); ?>" required>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone"></i></span>
      </div>
      <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="<?= set_value('phone'); ?>" required>
    </div>
    <span class="text-danger small"><?= form_error('phone'); ?></span>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text"> <i class="fas fa-envelope"></i></span>
      </div>
      <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>" required>
    </div>
    <span class="text-danger small"><?= form_error('email'); ?></span>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
      </div>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?= set_value('password'); ?>" required>
      <!-- show password -->
      <div class="input-group-append">
        <span class="input-group-text" onclick="password_show_hide();">
          <i class="fas fa-eye" id="show_eye"></i>
          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
        </span>
      </div>
      <!-- show password -->
    </div>
    <span class="text-danger small"><?= form_error('password'); ?></span>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <?php echo $widget; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="agreeTerms" name="terms" value="agree">
          <label for="agreeTerms">
            I agree to the <a href="#">terms</a>
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Register</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <a href="<?= base_url('authorization'); ?>" class="text-center">I already have a membership</a>
</div>