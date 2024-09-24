<div class="row">
  <div class="col-sm-4">
    <div class="box box-solid">
      <div class="box-header bg-yellow">
        <h3 class="box-title">account_creation_successful</h3>
      </div>
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?= base_url(); ?>/AdminLTE-2.4.13/dist/img/user2-160x160.jpg" alt="User profile picture">
        <h3 class="profile-username text-center">Musaeri</h3>
        <p class="text-muted text-center">
          <?= $user["Role"];
          ?>
        </p>

        <ul class="list-group list-group-unbordered">
          <!-- <li class="list-group-item">
            <b>Followers</b> <a class="pull-right">1,322</a>
          </li>
          <li class="list-group-item">
            <b>Following</b> <a class="pull-right">543</a>
          </li>
          <li class="list-group-item">
            <b>Friends</b> <a class="pull-right">13,287</a>
          </li> -->
        </ul>

        <a href="#" class="btn btn-primary btn-block"><b>Change Password</b></a>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <div class="col-sm-8">
    <div class="box box-solid">
      <div class="box-header bg-yellow">
        <h3 class="box-title">update_successful</h3>
      </div>
      <div class="box-body">

        <ul class="pl-4">
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">
                  <?= date('d F Y H:i:s'); ?>
                </span>
              </li>
              <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header"><a href="#"><?= $user['Email']; ?></a> </h3>
                </div>
              </li>
              <li>
                <i class="fa fa-user bg-aqua"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border"><a href="#"><?= $user['Name']; ?></a>
                  </h3>
                </div>
              </li>
              <li>
                <i class="fa fa-comments bg-yellow"></i>

                <div class="timeline-item">
                  <h3 class="timeline-header"><a href="#"><?= $user['Company']; ?></a> </h3>
                  <div class="timeline-body">
                    <?= $user['Alamat']; ?>
                  </div>
                </div>
              </li>
              <li class="time-label">
                <span class="bg-green">

                  <?= date('d F Y H:i:s'); ?>
                </span>
              </li>
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div>
          <!-- /.tab-pane -->
          <!-- <li></li>-->
        </ul>
      </div>
    </div>
  </div>
</div>