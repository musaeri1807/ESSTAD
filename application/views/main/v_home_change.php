<?php if (!empty(form_error('passwordnew'))) : ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Alert! </h4>
  </div>
<?php else : ?>
<?php endif; ?>
<?php if ($this->session->flashdata('message') == 1): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Alert! berhasil diubah!</h4>
  </div>
<?php elseif ($this->session->flashdata('message') == 2): ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Alert! gagal diubah!</h4>
  </div>
<?php elseif ($this->session->flashdata('message') == 3): ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Alert! Password lama tidak sesuai</h4>
  </div>
<?php endif; ?>
<!-- /.modal -->
<div class="modal fade" id="modal-password">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><b>Ubah Password</b></h3>
      </div>
      <form action="<?= site_url('security') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Password Lama:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-unlock"></i>
              </div>
              <input type="password" name="passwordold" class="form-control" id="passwordold" value="" required>
              <div class="input-group-addon" style="cursor: pointer;" onclick="togglePassword('passwordold')">
                <i class="fa fa-eye" id="eye-passwordold"></i>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Password Baru:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-unlock-alt"></i>
              </div>
              <input type="password" name="passwordnew" class="form-control pull-right" id="passwordnew" value="" required>
              <div class="input-group-addon" style="cursor: pointer;" onclick="togglePassword('passwordnew')">
                <i class="fa fa-eye" id="eye-passwordnew"></i>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Konfirmasi Password:</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-lock"></i>
              </div>
              <input type="password" name="passwordnew1" class="form-control pull-right" id="passwordnew1" value="" required>
              <div class="input-group-addon" style="cursor: pointer;" onclick="togglePassword('passwordnew1')">
                <i class="fa fa-eye" id="eye-passwordnew1"></i>
              </div>
            </div>
          </div>
        </div> <!-- /.modal content -->
        <div class="modal-footer">
          <button type="submit" name="action" value="change_password" class="btn btn-success btn-block"><i class="fa fa-save"></i><b> Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal -->
<!-- /.modal -->
<div class="modal fade" id="modal-email">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><b>Ubah Email</b></h3>
      </div>
      <form action="<?= site_url('homepage/change_email') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Email lama :</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-envelope-o"></i>
              </div>
              <input type="email" name="emailold" class="form-control" id="emailold" value="<?= $user['email'];  ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label>Email Baru:</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
              </div>
              <input type="email" name="emailnew" class="form-control" id="emailnew" value="infomail17089@gmail.com" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="action" value="change_email" class="btn btn-success btn-block"><i class="fa fa-save"></i><b> Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal -->
<!-- /.modal -->
<div class="modal fade" id="modal-name">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><b>Ubah Nama</b></h3>
      </div>
      <form action="<?= site_url('homepage/change_name') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-user"></i>
              </div>
              <input type="text" name="nama" class="form-control" id="nama" value="Gavin" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="action" value="change_name" class="btn btn-success btn-block"><i class="fa fa-save"></i><b> Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal -->
<!-- /.modal -->
<div class="modal fade" id="modal-nomor">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><b>Ubah Nomor Whatsapp</b></h3>
      </div>
      <form action="<?= site_url('homepage/change_phone') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Whatsapp lama :</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-phone"></i>
              </div>
              <input type="number" name="phoneold" class="form-control" id="phoneold" value="<?= $user['phone'];  ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label>Whatsapp Baru:</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-phone-square"></i>
              </div>
              <input type="tel" name="phonenew" class="form-control" id="phonenew" placeholder="08xxx" required>
            </div>
          </div>
        </div> <!-- /.modal content -->
        <div class="modal-footer">
          <button type="submit" name="action" value="change_phone" class="btn btn-success btn-block"><i class="fa fa-save"></i><b> Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-PIN">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><b>PIN</b></h3>
      </div>
      <form action="<?= site_url('homepage/change_PIN') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <!-- <label>PIN</label> -->
            <div class="input-group ">
              <div class="input-group-addon">
                <i>PIN</i>
              </div>
              <input type="tel" inputmode="numeric" name="PIN" class="form-control" id="PIN" data-inputmask="'mask': '999999'" data-mask required>
            </div>
          </div>
        </div> <!-- /.modal content -->
        <div class="modal-footer">
          <button type="submit" name="action" value="change_pin" class="btn btn-success btn-block"><i class="fa fa-save"></i><b> Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal -->

<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h2 class="box-title"><b>Info Keamanan</b></h2>
      </div>
      <div class="box-body">
        <ul class="timeline">
          <li class="time-label">
            <span class="bg-red">
              <?= $user['last_login']; ?>
              <?= date('d-m-Y', strtotime($user['last_login'])) ?>
            </span>
          </li>
          <li>
            <i class="fa fa-envelope bg-yellow"></i>
            <div class="timeline-item">
              <span class="time"> <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-email">Ubah</a></span>
              <h3 class="timeline-header"><?php echo $user['email'] ?> </h3>
            </div>
          </li>
          <li>
            <i class="fa fa-user bg-aqua"></i>
            <div class="timeline-item">
              <span class="time"><a class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-name">Ubah</a></span>
              <h3 class="timeline-header no-border"><?php echo $user['name_users'] ?></h3>
            </div>
          </li>
          <li>
            <i class="fa fa-phone bg-green"></i>
            <div class="timeline-item">
              <span class="time"> <a class="btn btn-success btn-flat btn-xs" data-toggle="modal" data-target="#modal-nomor">Ubah</a></span>
              <h3 class="timeline-header"><?php echo $user['phone'] ?></h3>
            </div>
          </li>
          <li>
            <i class="fa fa-shield bg-blue"></i>
            <div class="timeline-item">
              <span class="time"><a href="#" class="btn btn-xs bg-blue" data-toggle="modal" data-target="#modal-PIN">Ubah</a></span>
              <h3 class="timeline-header"><a href="#">PIN</a> </h3>
            </div>
          </li>
          <li>
            <i class="fa fa-shield bg-maroon"></i>
            <div class="timeline-item">
              <span class="time"><a href="#" class="btn btn-xs bg-maroon" data-toggle="modal" data-target="#modal-password">Ubah</a></span>
              <h3 class="timeline-header"><a href="#">Password</a> </h3>
            </div>
          </li>
          <li class="time-label">
            <span class="bg-green">
              <?= $user['created_on']; ?>
              <?= date('d-m-Y', strtotime($user['created_on'])) ?>
            </span>
          </li>
          <li>
            <i class="fa fa-clock-o bg-gray"></i>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>



<script>
  function togglePassword(inputId) {
    var passwordInput = document.getElementById(inputId);
    var eyeIcon = document.getElementById('eye-' + inputId);

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    } else {
      passwordInput.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    }
  }
</script>