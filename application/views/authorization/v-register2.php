<div class="card-body">
  <form action="<?= base_url('register'); ?>" method="post" onsubmit="this.submit.disabled = true;">
    <div class="row mb-2">
      <div class="col-12">
        <div class="icheck-primary">
          <span> <b>Daftar Nasabah BSP</b></span>
        </div>
      </div>
      <div class="col-4">
        <!-- <a href="<?= base_url('authorization/signup'); ?>" type="submit" class="btn btn-block btn-outline-primary">Masuk</a> -->
      </div>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-university"></i></span>
      </div>
      <select name="bspid" id="bspid" class="form-control">
        <option value="">- Pilih B S P -</option>
        <?php foreach ($bspid as $bsp) { ?>
          <option value="<?= $bsp->ID ?>"><?= 'B S P - ' . $bsp->CABANG; ?></option>
        <?php } ?>
      </select>
    </div>
    <input type="hidden" name="token" class="form-control" value="<?= $token; ?>" required>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
      </div>
      <input type="text" name="name" class="form-control" placeholder="Nama" value="<?= set_value('name'); ?>" required>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
      </div>
      <input type="tel" inputmode="numeric" name="phone" id="phone" class="form-control" placeholder="08 xxx " value="<?= set_value('phone'); ?>" required>
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
            Saya setuju dg <a href="<?= base_url('terms'); ?>">ketentuan</a>
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-block bg-gradient-primary">Daftar</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
  <p class="mt-3">
    <a href="<?= base_url('login'); ?>" class="btn btn-block btn-outline-primary">Login</a>
  </p>
</div>