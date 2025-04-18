<div class="card-body">
  <span">
    <p class="login-box-msg ">Silakan periksa kode OTP di WhatsApp!!!</p>
    </span>
    <!-- <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p> -->
    <p class="login-box-msg"><b><?= $this->session->userdata('NumberPhone'); ?></b></p>
    <form action="<?= base_url('verify-otp'); ?>" method="post">
      <div class="input-group mb-3">
        <div class="row">
          <div class="col-2">
            <input type="tel" inputmode="numeric" name="1" class="form-control" maxlength="1" id="input1" oninput="moveToNext(this, 'input2')" onkeydown="moveToPrevious(event, 'input1')" required>
          </div>
          <div class="col-2">
            <input type="tel" inputmode="numeric" name="2" class="form-control" maxlength="1" id="input2" oninput="moveToNext(this, 'input3')" onkeydown="moveToPrevious(event, 'input1')" required>
          </div>
          <div class="col-2">
            <input type="tel" inputmode="numeric" name="3" class="form-control" maxlength="1" id="input3" oninput="moveToNext(this, 'input4')" onkeydown="moveToPrevious(event, 'input2')" required>
          </div>
          <div class="col-2">
            <input type="tel" inputmode="numeric" name="4" class="form-control" maxlength="1" id="input4" oninput="moveToNext(this, 'input5')" onkeydown="moveToPrevious(event, 'input3')" required>
          </div>
          <div class="col-2">
            <input type="tel" inputmode="numeric" name="5" class="form-control" maxlength="1" id="input5" oninput="moveToNext(this, 'input6')" onkeydown="moveToPrevious(event, 'input4')" required>
          </div>
          <div class="col-2">
            <input type="tel" inputmode="numeric" name="6" class="form-control" maxlength="1" id="input6" onkeydown="moveToPrevious(event, 'input5')" required>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-append">
          <!-- <?php echo $widget; ?> -->
          <input type="hidden" name="token" class="form-control" value="<?= $token; ?>" required>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-block bg-gradient-primary"><b>Kirim</b></button>
        </div>
      </div>
    </form>
    <p class="mt-3">
    </p>
</div>
<!-- /.login-card-body -->
<script>
  // Pindah ke input berikutnya
  function moveToNext(current, nextFieldID) {
    if (current.value.length >= current.maxLength) {
      const nextField = document.getElementById(nextFieldID);
      if (nextField) {
        nextField.focus();
      }
    }
  }
  // Pindah ke input sebelumnya saat tombol Backspace ditekan
  function moveToPrevious(event, previousFieldID) {
    if (event.key === "Backspace" && event.target.value === "") {
      const previousField = document.getElementById(previousFieldID);
      if (previousField) {
        previousField.focus();
      }
    }
  }
</script>