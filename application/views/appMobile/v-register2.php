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
    <h1><?= $Title; ?></h1>
    <h3><?= $description; ?></h3>
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
        <h5 class="modal-title">Syarat dan Ketentuan</h5>
        <a href="#" data-bs-dismiss="modal">Tutup</a>
      </div>
      <div class="modal-body" style="text-align: justify;">
        <p><strong>Harap membaca Syarat dan Ketentuan ini dengan saksama sebelum menggunakan layanan kami.</strong> Dengan mendaftar, mengakses, atau menggunakan layanan kami, Anda menyatakan bahwa Anda telah membaca, memahami, dan menyetujui semua ketentuan di bawah ini.</p>

        <p><strong>1. Pendaftaran Akun</strong><br>
          - Pengguna wajib memberikan data pribadi yang benar, lengkap, dan terbaru.<br>
          - Setiap pengguna hanya diperbolehkan memiliki satu akun aktif.<br>
          - Pengguna bertanggung jawab atas keamanan dan kerahasiaan akun miliknya.</p>

        <p><strong>2. Penggunaan Layanan</strong><br>
          - Layanan ini hanya digunakan untuk keperluan yang sah dan sesuai hukum.<br>
          - Pengguna dilarang menyalahgunakan layanan, termasuk tetapi tidak terbatas pada manipulasi data, spam, atau aktivitas ilegal lainnya.</p>

        <p><strong>3. Keamanan dan Privasi</strong><br>
          - Kami menjaga dan melindungi informasi pribadi Anda sesuai dengan kebijakan privasi kami.<br>
          - Pengguna wajib menjaga kerahasiaan password dan kode OTP yang diterima.</p>

        <p><strong>4. Kepemilikan dan Hak Cipta</strong><br>
          - Seluruh konten, fitur, dan layanan dalam platform ini adalah milik penyedia layanan dan dilindungi oleh hak cipta.<br>
          - Pengguna tidak diperbolehkan menggandakan, mendistribusikan, atau menggunakan tanpa izin tertulis.</p>

        <p><strong>5. Pembatasan Tanggung Jawab</strong><br>
          - Kami tidak bertanggung jawab atas kehilangan atau kerusakan akibat kelalaian pengguna atau penggunaan yang tidak sah.<br>
          - Kami berhak menghentikan layanan sementara atau permanen atas pelanggaran terhadap syarat ini.</p>

        <p><strong>6. Perubahan Syarat dan Ketentuan</strong><br>
          - Kami berhak mengubah Syarat dan Ketentuan ini sewaktu-waktu.<br>
          - Perubahan akan diinformasikan melalui platform dan berlaku sejak tanggal yang ditentukan.</p>

        <p><strong>7. Penerimaan</strong><br>
          Dengan mengakses atau menggunakan layanan kami, Anda dianggap telah menerima dan menyetujui seluruh isi dari Syarat dan Ketentuan ini.</p>
      </div>
    </div>
  </div>
</div>
<!-- * Terms Modal -->