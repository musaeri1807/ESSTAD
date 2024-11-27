<!-- ........... -->
<?php if ($user['company'] !== ''): ?>
  <div class="alert alert-success">Condition is true!</div>
  <div class="row">
    <div class="col-md-12">
      <!-- Input data -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h2 class="box-title">Input Info</h2>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Nik:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-credit-card"></i>
              </div>
              <input type="text" name="NIK" class="form-control" value="" data-inputmask="'mask': '999999 9999999999'" data-mask>
            </div>
          </div>
          <!-- Date -->
          <div class="form-group">
            <label>Tanggal lahir:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="tanggal" class="form-control pull-right" id="datepicker">
            </div>
          </div>
          <div class="form-group">
            <label>Nama:</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-user"></i>
              </div>
              <input type="text" class="form-control pull-right" id="">
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>Jenis Kelamin:</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-venus-mars"></i>
              </div>
              <select name="" id="" class="form-control">
                <option value="O">Lain</option>
                <option value="L">Pria</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-address-book"></i>
              </div>
              <textarea name="address" class="form-control" rows="3" placeholder="Address"><?php echo isset($user['address']) ? htmlspecialchars($user['address']) : ''; ?></textarea>
            </div>
            <!-- /.input group -->
          </div>

          <div class="form-group">
            <label>Provinsi</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-location-arrow"></i>
              </div>
              <select name="provinsi" id="provinsi" class="form-control">
                <option value=""><b>-Pilih Provinsi-</b></option>
                <?php foreach ($provinsi as $prov) { ?>
                  <option value="<?= $prov->id ?>"><?= $prov->nama; ?></option>
                <?php } ?>

              </select>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>Kota / Kabupaten</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-location-arrow"></i>
              </div>
              <select name="kota" id="kota" class="form-control">
                <option value="">-Pilih Kota /kabupaten-</option>

              </select>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>Kecamatan</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-location-arrow"></i>
              </div>
              <select name="kecamatan" id="kecamatan" class="form-control">
                <option value="">-Pilih Kecamatan-</option>

              </select>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>Kelurahan / Desa:</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-location-arrow"></i>
              </div>
              <select name="desa" id="desa" class="form-control">
                <option value="">-Pilih Kelurahan-</option>

              </select>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>RW:</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-location-arrow"></i>
              </div>
              <select name="rw" id="rw" class="form-control">
                <option value="000">-Pilih RW-</option>
                <?php foreach ($RW as $rw) { ?>
                  <option value="<?= $rw->id ?>"><?= $rw->number; ?></option>
                <?php } ?>
              </select>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>RT:</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-location-arrow"></i>
              </div>
              <select name="" id="rt" class="form-control">
                <option value="000">-Pilih RT-</option>
                <?php foreach ($RT as $rt) { ?>
                  <option value="<?= $rt->id ?>"><?= $rt->number; ?></option>
                <?php } ?>
              </select>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>Bank Sampah:</label>
            <div class="input-group ">
              <div class="input-group-addon">
                <i class="fa fa-university"></i>
              </div>
              <select name="" id="" class="form-control">
                <option value="">-Pilih Bank Sampah -</option>
                <?php foreach ($bspid as $bsp) { ?>
                  <option value="<?= $bsp->id ?>"><?= $bsp->branch . '->' . $bsp->alamat; ?></option>
                <?php } ?>
              </select>
            </div>
            <!-- /.input group -->
          </div>
          <br>
          <div class="box-body">
            <!-- <span class="input-group-addon"></span> -->
            <a href="#" type="sumbit" class="btn btn-success btn-block"><i class="fa fa-save"></i><b> Simpan</b></a>
          </div>
          <div class="input-group">

          </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
<?php else: ?>
  <div class="alert alert-danger">Condition is false!</div>
  <div class="row">
    <div class="col-md-12">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-blue-active">
          <h1 class="widget-user-username"><b>1234567890</b></h1>
          <h4 class="widget-user-desc"><b><?= $user['name_users']; ?></b> </h4>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="<?= base_url(); ?>/AdminLTE-2.4.13/dist/img/user2-160x160.jpg" alt="User Avatar">
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
        <span class="info-box-icon bg-aqua"><i class="fa fa-download"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Saldo Rupiah</span>
          <span class="info-box-number">1,000,000<small>.00</small></span>
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
          <span class="info-box-number">Rp 141,410</span>
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
          <span class="info-box-number">Rp 141,410</span>
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
          <span class="info-box-number">2,000</span>
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
        <?php

        $data = [
          ["ID" => 1, "Tanggal" => "2024-11-01", "Keterangan" => "Transfer masuk dari A12345", "Debit" => 0, "Kredit" => 1000000, "Saldo" => 1000000, "Status" => "Success"],
          ["ID" => 2, "Tanggal" => "2024-11-02", "Keterangan" => "Pembayaran listrik", "Debit" => 200000, "Kredit" => 0, "Saldo" => 800000, "Status" => "Complete"],
          ["ID" => 3, "Tanggal" => "2024-11-03", "Keterangan" => "Transfer ke B67890", "Debit" => 300000, "Kredit" => 0, "Saldo" => 500000, "Status" => "Pending"],
          ["ID" => 4, "Tanggal" => "2024-11-04", "Keterangan" => "Gaji bulan November", "Debit" => 0, "Kredit" => 5000000, "Saldo" => 5500000, "Status" => "Success"],
          ["ID" => 5, "Tanggal" => "2024-11-05", "Keterangan" => "Pembelian bahan makanan", "Debit" => 500000, "Kredit" => 0, "Saldo" => 5000000, "Status" => "Complete"],
          ["ID" => 6, "Tanggal" => "2024-11-06", "Keterangan" => "Transfer masuk dari C23456", "Debit" => 0, "Kredit" => 750000, "Saldo" => 5750000, "Status" => "Pending"],
          ["ID" => 7, "Tanggal" => "2024-11-07", "Keterangan" => "Pembayaran asuransi", "Debit" => 150000, "Kredit" => 0, "Saldo" => 5600000, "Status" => "Success"],
          ["ID" => 8, "Tanggal" => "2024-11-08", "Keterangan" => "Transfer ke D78901", "Debit" => 250000, "Kredit" => 0, "Saldo" => 5350000, "Status" => "Complete"],
          ["ID" => 9, "Tanggal" => "2024-11-09", "Keterangan" => "Top-up e-wallet", "Debit" => 100000, "Kredit" => 0, "Saldo" => 5250000, "Status" => "Pending"],
          ["ID" => 10, "Tanggal" => "2024-11-10", "Keterangan" => "Transfer masuk dari E34567", "Debit" => 0, "Kredit" => 1200000, "Saldo" => 6450000, "Status" => "Success"],
          ["ID" => 11, "Tanggal" => "2024-11-11", "Keterangan" => "Belanja online", "Debit" => 300000, "Kredit" => 0, "Saldo" => 6150000, "Status" => "Complete"],
          ["ID" => 12, "Tanggal" => "2024-11-12", "Keterangan" => "Transfer ke F89012", "Debit" => 500000, "Kredit" => 0, "Saldo" => 5650000, "Status" => "Pending"],
          ["ID" => 13, "Tanggal" => "2024-11-13", "Keterangan" => "Penarikan tunai", "Debit" => 1000000, "Kredit" => 0, "Saldo" => 4650000, "Status" => "Success"],
          ["ID" => 14, "Tanggal" => "2024-11-14", "Keterangan" => "Transfer masuk dari G45678", "Debit" => 0, "Kredit" => 1500000, "Saldo" => 6150000, "Status" => "Complete"],
          ["ID" => 15, "Tanggal" => "2024-11-15", "Keterangan" => "Bayar tagihan kartu kredit", "Debit" => 2000000, "Kredit" => 0, "Saldo" => 4150000, "Status" => "Pending"],
          ["ID" => 16, "Tanggal" => "2024-11-16", "Keterangan" => "Transfer ke H90123", "Debit" => 750000, "Kredit" => 0, "Saldo" => 3400000, "Status" => "Success"],
          ["ID" => 17, "Tanggal" => "2024-11-17", "Keterangan" => "Transfer masuk dari I56789", "Debit" => 0, "Kredit" => 500000, "Saldo" => 3900000, "Status" => "Complete"],
          ["ID" => 18, "Tanggal" => "2024-11-18", "Keterangan" => "Pembayaran langganan bulanan", "Debit" => 100000, "Kredit" => 0, "Saldo" => 3800000, "Status" => "Pending"],
          ["ID" => 19, "Tanggal" => "2024-11-19", "Keterangan" => "Transfer ke J23456", "Debit" => 400000, "Kredit" => 0, "Saldo" => 3400000, "Status" => "Success"],
          ["ID" => 20, "Tanggal" => "2024-11-20", "Keterangan" => "Transfer masuk dari K67890", "Debit" => 0, "Kredit" => 2000000, "Saldo" => 5400000, "Status" => "Complete"],
          ["ID" => 21, "Tanggal" => "2024-11-21", "Keterangan" => "Pembelian gadget", "Debit" => 1500000, "Kredit" => 0, "Saldo" => 3900000, "Status" => "Pending"],
          ["ID" => 22, "Tanggal" => "2024-11-22", "Keterangan" => "Transfer masuk dari L34567", "Debit" => 0, "Kredit" => 300000, "Saldo" => 4200000, "Status" => "Success"],
          ["ID" => 23, "Tanggal" => "2024-11-23", "Keterangan" => "Bayar sewa", "Debit" => 1000000, "Kredit" => 0, "Saldo" => 3200000, "Status" => "Complete"],
          ["ID" => 24, "Tanggal" => "2024-11-24", "Keterangan" => "Transfer ke M78901", "Debit" => 600000, "Kredit" => 0, "Saldo" => 2600000, "Status" => "Pending"],
          ["ID" => 25, "Tanggal" => "2024-11-25", "Keterangan" => "Transfer masuk dari N89012", "Debit" => 0, "Kredit" => 900000, "Saldo" => 3500000, "Status" => "Success"],
          ["ID" => 26, "Tanggal" => "2024-11-26", "Keterangan" => "Belanja supermarket", "Debit" => 300000, "Kredit" => 0, "Saldo" => 3200000, "Status" => "Complete"],
          ["ID" => 27, "Tanggal" => "2024-11-27", "Keterangan" => "Transfer ke O12345", "Debit" => 450000, "Kredit" => 0, "Saldo" => 2750000, "Status" => "Pending"],
          ["ID" => 28, "Tanggal" => "2024-11-28", "Keterangan" => "Transfer masuk dari P23456", "Debit" => 0, "Kredit" => 1200000, "Saldo" => 3950000, "Status" => "Success"],
          ["ID" => 29, "Tanggal" => "2024-11-29", "Keterangan" => "Pembayaran servis kendaraan", "Debit" => 500000, "Kredit" => 0, "Saldo" => 3450000, "Status" => "Complete"],
          ["ID" => 30, "Tanggal" => "2024-11-30", "Keterangan" => "Transfer ke Q34567", "Debit" => 300000, "Kredit" => 0, "Saldo" => 3150000, "Status" => "Pending"],
        ];
        ?>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tanggal Keterangan</th>
                <th>Mutasi</th>
                <th>Saldo</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $row): ?>
                <?php
                // Tanggal dari database
                $tanggal_db   = date($row['Tanggal']);
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
                  <td><?= $hari_ini . ',' . $tanggal . ' ' . $bulan_ini . ' ' . $tahun . '<br> <b>' . $row['Keterangan']; ?></td>
                  <td>
                    <?php if ($row['Debit'] == 0) {
                      echo number_format($row['Kredit']) . '<br><span class="label label-success"> Kredit</span>';
                    } elseif ($row['Kredit'] == 0) {
                      echo number_format($row['Debit']) . '<br><span class="label label-danger">Debit</span>';
                    } else {
                      echo "Saldo Awal";
                    }
                    ?>
                  </td>
                  <td>
                    <?= number_format($row['Saldo']);
                    if ($row['Status'] == 'Pending') {
                      echo '<br><span class="label label-warning"> Pending</span>';
                    } elseif ($row['Status'] == 'Success') {
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
                <th>Tanggal Keterangan</th>
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
<?php endif; ?>


<!-- ................................. -->


<?php
echo $_SERVER['HTTP_HOST']; ?>


<!-- PRODUCT LIST -->
<?php
$products = [
  ["id" => 1, "name" => "Laptop", "price" => 12000000, "category" => "Elektronik", "stock" => 5],
  ["id" => 2, "name" => "Smartphone", "price" => 8000000, "category" => "Elektronik", "stock" => 10],
  ["id" => 3, "name" => "Kursi Kantor", "price" => 1500000, "category" => "Furniture", "stock" => 7],
  ["id" => 4, "name" => "Sepatu Olahraga", "price" => 500000, "category" => "Fashion", "stock" => 15],
  ["id" => 5, "name" => "Buku Pemrograman", "price" => 200000, "category" => "Buku", "stock" => 20],
  ["id" => 6, "name" => "Monitor", "price" => 2500000, "category" => "Elektronik", "stock" => 8],
  ["id" => 7, "name" => "Headphone", "price" => 1000000, "category" => "Elektronik", "stock" => 12],
  ["id" => 8, "name" => "Tas Punggung", "price" => 300000, "category" => "Fashion", "stock" => 25],
  ["id" => 9, "name" => "Meja Belajar", "price" => 1800000, "category" => "Furniture", "stock" => 4],
  ["id" => 10, "name" => "Kamera DSLR", "price" => 7000000, "category" => "Elektronik", "stock" => 3],
  ["id" => 11, "name" => "T-Shirt", "price" => 100000, "category" => "Fashion", "stock" => 50],
  ["id" => 12, "name" => "Pensil Warna", "price" => 75000, "category" => "Alat Tulis", "stock" => 30],
  ["id" => 13, "name" => "Lampu LED", "price" => 25000, "category" => "Elektronik", "stock" => 100],
  ["id" => 14, "name" => "Komputer", "price" => 9000000, "category" => "Elektronik", "stock" => 6],
  ["id" => 15, "name" => "Sepeda Lipat", "price" => 2500000, "category" => "Olahraga", "stock" => 2],
  ["id" => 16, "name" => "Jaket Musim Dingin", "price" => 600000, "category" => "Fashion", "stock" => 9],
  ["id" => 17, "name" => "Bola Basket", "price" => 150000, "category" => "Olahraga", "stock" => 40],
  ["id" => 18, "name" => "Setrika", "price" => 300000, "category" => "Elektronik", "stock" => 20],
  ["id" => 19, "name" => "Bantal Leher", "price" => 100000, "category" => "Rumah Tangga", "stock" => 35]
  // ["id" => 20, "name" => "Sapu Lidi", "price" => 20000, "category" => "Rumah Tangga", "stock" => 60],
  // ["id" => 21, "name" => "Kopi Hitam", "price" => 50000, "category" => "Minuman", "stock" => 70],
  // ["id" => 22, "name" => "Sepatu Lari", "price" => 550000, "category" => "Fashion", "stock" => 13],
  // ["id" => 23, "name" => "Dispenser Air", "price" => 800000, "category" => "Elektronik", "stock" => 10],
  // ["id" => 24, "name" => "Minyak Goreng", "price" => 20000, "category" => "Bahan Pokok", "stock" => 100],
  // ["id" => 25, "name" => "Kaos Kaki", "price" => 20000, "category" => "Fashion", "stock" => 80],
  // ["id" => 26, "name" => "Cangkir Kopi", "price" => 15000, "category" => "Rumah Tangga", "stock" => 90],
  // ["id" => 27, "name" => "Panci", "price" => 70000, "category" => "Rumah Tangga", "stock" => 15],
  // ["id" => 28, "name" => "Mie Instan", "price" => 3000, "category" => "Makanan", "stock" => 500],
  // ["id" => 29, "name" => "Pasta Gigi", "price" => 12000, "category" => "Kesehatan", "stock" => 150],
  // ["id" => 30, "name" => "Sabun Mandi", "price" => 5000, "category" => "Kesehatan", "stock" => 200]
];
// Menampilkan data produk dalam tabel
?>

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

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Date picker</h3>
      </div>
      <div class="box-body">
        <!-- Date range -->
        <div class="form-group">
          <label>Date range:</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="reservation">
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <label>Date range button:</label>

          <div class="input-group">
            <button type="button" class="btn btn-default pull-right" id="daterange-btn">
              <span>
                <i class="fa fa-calendar"></i> Date range picker
              </span>
              <i class="fa fa-caret-down"></i>
            </button>
          </div>
        </div>
        <!-- /.form group -->

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col (right) -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-sm-12">
    <div class="box box-info">
      <div class="box-header with-border">
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
                  <?= "Register " . date('d F Y H:i:s', $user['created_on']); ?>
                </span>
              </li>
              <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header"><a href="#"><?= $user['email']; ?></a> </h3>
                </div>
              </li>
              <li>
                <i class="fa fa-user bg-aqua"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border"><a href="#"><?= $user['name_users']; ?></a>
                  </h3>
                </div>
              </li>
              <li>
                <i class="fa fa-comments bg-yellow"></i>

                <div class="timeline-item">
                  <h3 class="timeline-header"><a href="#"><?= $user['company']; ?></a> </h3>
                  <div class="timeline-body">
                    <?= $user['address']; ?>
                  </div>
                </div>
              </li>
              <li class="time-label">
                <span class="bg-green">

                  <?= "Terakhir Login " . date('d F Y H:i:s', $user['last_login']); ?>
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


<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
  $(document).ready(function() {
    $("#provinsi").change(function() {
      var url = "<?php echo site_url('Homepage/get_kabupaten'); ?>/" + $(this).val();
      $('#kota').load(url);
      return false;
    })

    $("#kota").change(function() {
      var url = "<?php echo site_url('Homepage/get_kecamatan'); ?>/" + $(this).val();
      $('#kecamatan').load(url);
      return false;
    })

    $("#kecamatan").change(function() {
      var url = "<?php echo site_url('Homepage/get_desa'); ?>/" + $(this).val();
      $('#desa').load(url);
      return false;
    })
  });
</script>