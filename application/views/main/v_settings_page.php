<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="pull-left">
          <div class="box-title">
            <h4><?php echo $judul ?></h4><code><?php echo $this->session->flashdata('message'); ?></code>
          </div>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#umum" data-toggle="tab" aria-expanded="false">Umum</a></li>
                <li class=""><a href="#smtp" data-toggle="tab" aria-expanded="false">SMTP</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="umum">
                  <div class="row">
                    <div class="col-md-6">
                      <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <img src="<?= base_url('assets/images/') . $settings['sitelogo'] ?>" width="150">
                        </div>
                        <div class="form-group <?php if (form_error('logo')) echo 'has-error' ?>">
                          <label for="logo">Logo</label>
                          <input type="file" id="sitelogo" name="sitelogo" class="form-control logo " placeholder="Logo" value="<?php echo $settings['sitelogo'] ?>">
                          <?php echo form_error('sitelogo', '<small style="color:red">', '</small>') ?>
                        </div>
                        <div class="form-group <?php if (form_error('name_application')) echo 'has-error' ?>">
                          <label for="name_application">Name Application</label>
                          <input type="text" id="name_application" name="name_application" class="form-control name_application " placeholder="name_application" value="<?php echo $settings['name_application'] ?>">
                          <?php echo form_error('name_application', '<small style="color:red">', '</small>') ?>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="smtp">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group <?php if (form_error('smtp_host')) echo 'has-error' ?>">
                        <label for="smtp_host">SMTP Host</label>
                        <input type="text" id="smtp_host" name="smtp_host" class="form-control smtp_host " placeholder="SMTP Host" value="<?php echo $settings['smtp_host'] ?>">
                        <?php echo form_error('smtp_host', '<small style="color:red">', '</small>') ?>
                      </div>
                      <div class="form-group <?php if (form_error('smtp_port')) echo 'has-error' ?>">
                        <label for="smtp_port">SMTP Port</label>
                        <input type="number" id="smtp_port" name="smtp_port" class="form-control smtp_port " placeholder="SMTP Port" value="<?php echo $settings['smtp_port'] ?>">
                        <?php echo form_error('smtp_port', '<small style="color:red">', '</small>') ?>
                      </div>
                      <div class="form-group <?php if (form_error('smtp_email')) echo 'has-error' ?>">
                        <label for="smtp_email">SMTP Email</label>
                        <input type="text" id="smtp_email" name="smtp_email" class="form-control smtp_email " placeholder="SMTP Email" value="<?php echo $settings['smtp_email'] ?>">
                        <?php echo form_error('smtp_email', '<small style="color:red">', '</small>') ?>
                      </div>
                      <div class="form-group <?php if (form_error('smtp_username')) echo 'has-error' ?>">
                        <label for="smtp_username">SMTP Username</label>
                        <input type="text" id="smtp_username" name="smtp_username" class="form-control smtp_username " placeholder="SMTP Username" value="<?php echo $settings['smtp_username'] ?>">
                        <?php echo form_error('smtp_username', '<small style="color:red">', '</small>') ?>
                      </div>
                      <div class="form-group <?php if (form_error('smtp_password')) echo 'has-error' ?>">
                        <label for="smtp_password">SMTP Password</label>
                        <input type="password" id="smtp_password" name="smtp_password" class="form-control smtp_password " placeholder="SMTP Password" value="<?php echo $settings['smtp_password'] ?>">
                        <?php echo form_error('smtp_password', '<small style="color:red">', '</small>') ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>