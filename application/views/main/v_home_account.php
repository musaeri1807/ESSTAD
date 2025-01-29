<!-- ........... -->
<?php
$message = 1;
?>

<?php if ($message == 1): ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Alert! Data Belum Update</h4>
  </div>
<?php elseif ($message == 2): ?>
  <div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>
    Info alert preview. This alert is dismissable.
  </div>
<?php elseif ($message == 3): ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
    Warning alert preview. This alert is dismissable.
  </div>
<?php elseif ($message == 4): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Alert!</h4>
    Success alert preview. This alert is dismissable.
  </div>
<?php endif; ?>

<?php echo $user['email'] ?>
<div class="row">
  <div class="col-md-12">
    <!-- Input data -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h1 class="box-title"><b>Informasi</b></h1>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label>Daftar di Bank Sampah:</label>
          <div class="input-group ">
            <div class="input-group-addon">
              <i class="fa fa-university"></i>
            </div>
            <select name="" id="" class="form-control">
              <option value="">-Pilih Bank Sampah -</option>
              <?php foreach ($bspid as $bsp) { ?>
                <option value="<?= $bsp->id ?>"><?= 'Bank Sampah ' . $bsp->branch . '-' . $bsp->alamat; ?></option>
              <?php } ?>
            </select>
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <label>Nik:</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-credit-card"></i>
            </div>
            <input type="tel" name="NIK" class="form-control" value="" data-inputmask="'mask': '999999 9999999999'" data-mask>
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
          <label>Tempat Lahir:</label>
          <div class="input-group ">
            <div class="input-group-addon">
              <i class="fa fa-map-marker"></i>
            </div>
            <input type="text" class="form-control pull-right" id="">
          </div>
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
            <textarea name="address" class="form-control" rows="2" placeholder="Address"><?php echo isset($user['address']) ? htmlspecialchars($user['address']) : ''; ?></textarea>
          </div>
          <!-- /.input group -->
        </div>

        <div class="form-group">
          <label>Provinsi</label>
          <div class="input-group ">
            <div class="input-group-addon">
              <i class="fa fa-sitemap"></i>
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
              <i class="fa fa-sitemap"></i>
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
              <i class="fa fa-sitemap"></i>
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
              <i class="fa fa-sitemap"></i>
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