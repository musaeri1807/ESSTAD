<!-- ........... -->
<?php if ($user['company'] == ''): ?>
  <div class="alert alert-success">Condition is true!</div>
<?php else: ?>
  <div class="alert alert-danger">Condition is false!</div>
<?php endif; ?>

<?php ?>

<div class="row">
  <div class="col-md-12">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-blue-active">
        <h1 class="widget-user-username"><b><?= $saldo['account_id']; ?></b></h1>
        <h4 class="widget-user-desc"><b><?= $user['name_users']; ?></b> </h4>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="<?= base_url(); ?>/assets/images/users/userman.png" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <!-- content -->

          <!-- content -->
        </div>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  <!--  -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua">
        <?php
        if ($gold['rasio'] == 'Turun'): ?>
          <i class="fa fa-download"></i>
        <?php else: ?>
          <i class="fa fa-upload"></i>
        <?php endif; ?>

      </span>
      <div class="info-box-content">
        <span class="info-box-text"><?= (date('d m y', strtotime($gold['date'])) == date('d m y')) ? "Harga Memperbarui" : "Harga Belum Memperbarui";; ?></small></span>
        <span class="info-box-number"><?= 'Rp ' . number_format($gold['fluktuasi']) ?>
          <small>.00
            <?php if ($gold['rasio'] == 'Turun'): ?>
              <i class="fa fa-caret-down"></i> <?= $gold['rasio']; ?>
            <?php elseif ($gold['rasio'] == 'Naik'): ?>
              <i class="fa fa-caret-up"></i> <?= $gold['rasio']; ?>
            <?php else: ?>
              <i class="fa fa-unsorted (alias)"></i> <?= $gold['rasio']; ?>
            <?php endif; ?>
          </small>
        </span>
        <span class="info-box-number"> <small><?= date('d M Y', strtotime($gold['date'])); ?></small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-diamond "></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Buyback</span>
        <span class="info-box-number"><?= 'Rp ' . number_format($gold['buyback']); ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-diamond"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Harga Emas</span>
        <span class="info-box-number"><?= 'Rp ' . number_format($gold['sell']); ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-bank"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Saldo Emas</span>
        <span class="info-box-number"><?= $saldo['saldo']  ?> <small>gr</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Histori Transaksi</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Deskripsi</th>
              <th>Mutasi</th>
              <th>Saldo</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($mutasi as $row): ?>
              <?php
              // Tanggal dari database
              $tanggal_db   = date($row['tanggal']);
              // Ubah ke timestamp
              $timestamp    = strtotime($tanggal_db);
              // Array nama hari dan bulan dalam bahasa Indonesia
              $hari         = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
              $bulan        = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
              // Formatkan
              $hari_ini = $hari[date('w', $timestamp)];
              $tanggal = date('d', $timestamp);
              $bulan_ini = $bulan[date('n', $timestamp) - 1];
              $tahun = date('Y', $timestamp);
              // Output: Hari, Tanggal Bulan Tahun
              ?>
              <tr>
                <td><?= $hari_ini . ',' . $tanggal . ' ' . $bulan_ini . ' ' . $tahun . '<br> <b>' . $row['noreferensi']; ?></td>
                <td>
                  <?php if ($row['type'] == 300) {
                    echo "0" . '<br><span class="label label-warning">Balance</span>';
                  } elseif ($row['type'] == 200) {
                    echo $row['debit'] . '<br><span class="label label-danger">Debit</span>';
                  } elseif ($row['type'] == 100) {
                    echo $row['kredit'] . '<br><span class="label label-success"> Kredit</span>';
                  }
                  ?>
                </td>
                <td>
                  <?= $row['saldo'];
                  if ($row['status'] == 'Pending') {
                    echo '<br><span class="label label-warning"> Pending</span>';
                  } elseif ($row['status'] == 'Success') {
                    echo '<br><span class="label label-success"> Success</span>';
                  } else {
                    echo '<br><span class="label label-info"> Complate</span>';
                  }
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Deskripsi</th>
              <th>Mutasi</th>
              <th>Saldo</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>



<!-- ................................. -->


<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Daftar Harga Sampah/Kg</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sampah as $product) { ?>
              <tr>
                <td>
                  <div class="box-body">
                    <ul class="products-list product-list-in-box">
                      <li class="item">
                        <div class="product-img">
                          <img src="<?= base_url(); ?>/assets/images/produk/default-50x50.gif" alt="Product Image">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title"><?= $product['name']; ?>
                            <?php
                            $nilai = $product['price'];
                            if ($nilai < 1000) {
                              $warna = "success";
                            } elseif ($nilai < 2000) {
                              $warna = "danger";
                            } elseif ($nilai < 3000) {
                              $warna = "warning";
                            } elseif ($nilai < 4000) {
                              $warna = "info";
                            } else {
                              $warna = "primary";
                            }
                            ?>
                            <span class="label label-<?= $warna; ?> pull-right"><?= "Rp " . number_format($product['price'], 0, ',', '.'); ?></span></a>
                          <span class="product-description">
                            <?php echo $product['category']; ?>
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                    </ul>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <!-- <th>Harga</th> -->
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>