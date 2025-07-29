<!-- App Header -->
<div class="appHeader">
  <div class="left">
    <a href="<?= base_url('Users/settings'); ?>" class="headerButton goBack">
      <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
  </div>
  <div class="pageTitle">
    Settings
  </div>
  <div class="right">
    <!-- <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a> -->
  </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

  <div class="section mt-2 text-center">
    <h1><?= $Title; ?></h1>
    <h3></h3>
  </div>
  <div class="section mb-5 p-2">
    <form action="<?= base_url('users/updateEmail'); ?>" method="POST">
      <div class="card">
        <div class="card-body pb-1">

          <div class="form-group basic">
            <div class="input-wrapper">
              <label class="label" for="email1">E-mail</label>
              <input type="email" name="email" class="form-control" id="email1" placeholder="Masukan e-mail" value="musaeri999@gmail.com" required>
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
              <input type="text" name="token" class="form-control" value="<?= $token; ?>" required>
            </div>
          </div>
        </div>
      </div>
      <div class="form-button-group transparent">
        <button type="submit" class="btn btn-success btn-block btn-lg">Simpan</button>
      </div>

    </form>
  </div>

</div>
<!-- * App Capsule -->