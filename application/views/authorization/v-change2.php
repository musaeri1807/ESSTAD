<div class="card-body">
  <?php if (!empty(form_error('password1'))) {
    $this->session->set_flashdata('message', '<span class="text-warning"><p class="login-box-msg">The Password field does not match the Repeat Password field.!</p></span>');
    echo  $this->session->flashdata('message');
  } else {
    echo '<span class="text-primary "><p class="login-box-msg">Change password new your to account</p></span>';
  }
  ?>

  <p class="login-box-msg"><?= $this->session->userdata('reset_email'); ?></p>
  <form action="<?= base_url('authorization/changepassword'); ?>" method="post">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
      </div>
      <input type="password" name="password1" class="form-control" id="password" placeholder="Password" required>
      <!-- show password -->
      <div class="input-group-append">
        <span class="input-group-text" onclick="password_show_hide();">
          <i class="fas fa-eye" id="show_eye"></i>
          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
        </span>
      </div>
      <!-- show password -->
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
      </div>
      <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm Password" required>
      <!-- show password -->
      <div class="input-group-append">
        <span class="input-group-text" onclick="password_show_hidee();">
          <i class="fas fa-eye" id="show_eyee"></i>
          <i class="fas fa-eye-slash d-none" id="hide_eyee"></i>
        </span>
      </div>
      <!-- show password -->
    </div>

    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Change password</button>
      </div>
      <!-- /.col -->

      <!-- /.col -->
    </div>
  </form>
  <br>
  <span class="text-danger ">
    <p class="login-box-msg small">Minimum password length of 7 characters.</p>
  </span>

</div>
<!-- /.login-card-body -->