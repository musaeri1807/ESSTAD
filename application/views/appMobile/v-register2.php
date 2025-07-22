<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
  <div class="left">
    <a href="<?= base_url('login'); ?>" class="headerButton goBack">
      <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
  </div>
  <div class="pageTitle"></div>
  <div class="right">
    <!-- <a href="app-login.html" class="headerButton">
      Login
    </a> -->
    <a href="<?= base_url('otp-account'); ?>" type="submit" class="btn btn-block btn-outline-success">Pengaktifan</a>
  </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

  <div class="section mt-1 text-center">
    <h1>Daftar Baru</h1>
    <h3> <?= $name_application  ?> </h3>
  </div>
  <div class="section mb-5 p-2">
    <form action="<?= base_url('register'); ?>" method="post" onsubmit="this.submit.disabled = true;">
      <div class="card">
        <div class="card-body">
          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="password2">Cabang</label>
              <select name="bspid" id="bspid" class="form-control">
                <option value="">- Pilih cabang B S P -</option>
                <?php foreach ($bspid as $bsp) { ?>
                  <option value="<?= $bsp->ID ?>"><?= 'B S P - ' . $bsp->CABANG; ?></option>
                <?php } ?>
              </select>
              <input type="hidden" name="token" class="form-control" value="<?= $token; ?>" required>
            </div>
          </div>

          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="email1">Nama Pengguna</label>
              <input type="text" name="name" class="form-control" placeholder="Masukan Nama" value="<?= set_value('name'); ?>" required>
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
            </div>
          </div>
          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="email1">WhatApp <span class="text-danger small"><?= form_error('phone'); ?></span></label>
              <input type="tel" inputmode="numeric" name="phone" id="phone" class="form-control" placeholder="Masukan WhatApp 08 xxx " value="<?= set_value('phone'); ?>" required>
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
            </div>
          </div>
          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="email1">E-mail <span class="text-danger small"><?= form_error('email'); ?></span></label>
              <input type="email" name="email" class="form-control" placeholder="Masukan E-mail" value="<?= set_value('email'); ?>" required>
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
            </div>
          </div>

          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="password1" onclick="password_show_hide();">Password <span class="text-danger small"><?= form_error('password'); ?></span></label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Kata Sandi" value="<?= set_value('password'); ?>" required>
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
              <!-- show password -->
              <i class="fas fa-eye" id="show_eye"></i>
              <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
              <!-- show password -->
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-1">
        <div class="card-body">
          <?= $widget; ?>
          <div class="custom-control custom-checkbox mt-2 mb-1">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="customCheckb1" name="terms" value="agree">

              <label class="form-check-label" for="customCheckb1">
                Saya setuju <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">syarat dan
                  ketentuan</a>
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-button-group transparent">
        <button type="submit" class="btn btn-success btn-block btn-lg">Register</button>
      </div>

    </form>
  </div>

</div>
<!-- * App Capsule -->


<!-- Terms Modal -->
<div class="modal fade modalbox" id="termsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Terms and Conditions</h5>
        <a href="#" data-bs-dismiss="modal">Close</a>
      </div>
      <div class="modal-body">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum, urna eget finibus
          fermentum, velit metus maximus erat, nec sodales elit justo vitae sapien. Sed fermentum
          varius erat, et dictum lorem. Cras pulvinar vestibulum purus sed hendrerit. Praesent et
          auctor dolor. Ut sed ultrices justo. Fusce tortor erat, scelerisque sit amet diam rhoncus,
          cursus dictum lorem. Ut vitae arcu egestas, congue nulla at, gravida purus.
        </p>
        <p>
          Donec in justo urna. Fusce pretium quam sed viverra blandit. Vivamus a facilisis lectus.
          Nunc non aliquet nulla. Aenean arcu metus, dictum tincidunt lacinia quis, efficitur vitae
          dui. Integer id nisi sit amet leo rutrum placerat in ac tortor. Duis sed fermentum mi, ut
          vulputate ligula.
        </p>
        <p>
          Vivamus eget sodales elit, cursus scelerisque leo. Suspendisse lorem leo, sollicitudin
          egestas interdum sit amet, sollicitudin tristique ex. Class aptent taciti sociosqu ad litora
          torquent per conubia nostra, per inceptos himenaeos. Phasellus id ultricies eros. Praesent
          vulputate interdum dapibus. Duis varius faucibus metus, eget sagittis purus consectetur in.
          Praesent fringilla tristique sapien, et maximus tellus dapibus a. Quisque nec magna dapibus
          sapien iaculis consectetur. Fusce in vehicula arcu. Aliquam erat volutpat. Class aptent
          taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
        </p>
      </div>
    </div>
  </div>
</div>
<!-- * Terms Modal -->