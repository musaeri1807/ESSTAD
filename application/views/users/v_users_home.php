<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users3 | Top Navigation</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url('Users'); ?>" class="navbar-brand">
                    <img src="<?= base_url(); ?>/assets/images/users/icon_bspid.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">BSP</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a href="<?= base_url('Users'); ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Mutasi</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Akun</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Password</a> -->
                        </li>

                    </ul>

                    <!-- SEARCH FORM -->
                    <!-- <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->

                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="<?= base_url('login') ?>" role="button">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="far fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Saldo </span>
                                    <span class="info-box-number"><?= $saldo['saldo'] ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->

            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-primary">
                                    <h2 class="widget-user-username"> <?= $userlogin['name_users']; ?></h2>
                                    <h5 class="widget-user-desc"><?= $saldo['account_id'] ?></h5>
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2" src="<?= base_url(); ?>/assets/images/users/users.png" alt="User Avatar">
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <!-- <div class="col-sm-6 border-right"> -->
                                        <!-- <div class="description-block">
                                                <h5 class="description-header">3,200</h5>
                                                <span class="description-text">Harga Emas</span>
                                            </div> -->
                                        <!-- /.description-block -->
                                        <!-- </div> -->
                                        <!-- /.col -->
                                        <!-- <div class="col-sm-6 border-left"> -->
                                        <!-- <div class="description-block">
                                                <h5 class="description-header">13,000</h5>
                                                <span class="description-text">Harga Buyback</span>
                                            </div> -->
                                        <!-- /.description-block -->
                                        <!-- </div> -->
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->

                            <div class="row">

                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?= number_format($gold['sell']); ?></h3>
                                            <p>Harga Beli <br>update Tanggal <?= $gold['date'] ?></p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3><?= number_format($gold['buyback']); ?></h3>

                                            <p>Harga Buyback <br>update Tanggal <?= $gold['date'] ?></p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>

                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link " id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  " id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Mutasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade " id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                                            <div class="card-header">
                                                <h3 class="card-title"><b>Home</b></h3>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade " id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                            <!-- Bts -->
                                            <div class="card-header">
                                                <h3 class="card-title"><b>Profil</b></h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?= base_url('users/changepassword'); ?>" method="post">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                        </div>
                                                        <input type="text" name="name" class="form-control" id="name" value="<?= $userlogin['name_users']; ?>" placeholder="Nama" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                                        </div>
                                                        <input type="tel" inputmode="numeric" name="phone" class="form-control" id="phone" value="<?= $userlogin['phone']; ?>" placeholder="Whatsapp" required disabled>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                        </div>
                                                        <input type="email" name="email" class="form-control" id="email" value="<?= $userlogin['email']; ?>" placeholder="Email" required disabled>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                        </div>
                                                        <input type="text" name="cabang" class="form-control" id="cabang" value="<?= $userlogin['branch_id']; ?>" placeholder="Cabang" required disabled>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary btn-block">Mengubah</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.card-body -->
                                            <!-- Bts -->
                                            <!-- Bts -->
                                            <div class="card-header">
                                                <h3 class="card-title"><b>Data</b></h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?= base_url('users/changeprofile'); ?>" method="post">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-address-card "></i></span>
                                                        </div>
                                                        <input type="tel" inputmode="numeric" name="nik" class="form-control" id="nik" placeholder="NIK" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-address-card "></i></span>
                                                        </div>
                                                        <input type="tel" inputmode="numeric" name="npwp" class="form-control" id="npwp" placeholder="NPWP" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                                        </div>
                                                        <select class="form-control" name="JK" id="JK">
                                                            <option value="">Pilih Jenis Kelamin</option>
                                                            <option value="">Laki-Laki</option>
                                                            <option value="">Perempuan</option>
                                                        </select>

                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                        </div>
                                                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                        </div>
                                                        <select name="provinsi" class="form-control" id="provinsi">
                                                            <option value="<?= ""; ?>">-Pilih Provinsi-</option>
                                                            <?php
                                                            foreach ($provinsi as $prov) {
                                                                echo '<option value="' . $prov->id . '">' . $prov->nama . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                        </div>
                                                        <select name="kabupaten" class="form-control" id="kabupaten">
                                                            <option value='<?= "ID"; ?>'><?= "database"; ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                        </div>
                                                        <select name="kecamatan" class="form-control" id="kecamatan">
                                                            <option value="<?= ""; ?>"><?= ""; ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                        </div>
                                                        <select name="desa" class="form-control" id="desa">
                                                            <option value="<?= ""; ?>"><?= ""; ?></option>
                                                        </select>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary btn-block">Mengubah</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.card-body -->
                                            <!-- Bts -->
                                        </div>
                                        <div class="tab-pane fade " id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                            <div class="card-header">
                                                <h3 class="card-title"><b>Mutasi</b></h3>
                                            </div>
                                            <div class="card-body">

                                                <form action="#" method="GET">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                        </div>

                                                        <input type="date" name="dari" class="form-control" value="<?= $this->input->get('dari') ?>">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                        </div>
                                                        <input type="date" name="sampai" class="form-control" value="<?= $this->input->get('sampai') ?>">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-body">

                                                <?php if (isset($mutasi)) { ?>

                                                    <?php
                                                    // Grouping data berdasarkan tanggal
                                                    $grouped = [];
                                                    foreach ($mutasi as $row) {
                                                        $tanggal = date('d-m-Y', strtotime($row->tanggal));
                                                        $grouped[$tanggal][] = $row;
                                                    }
                                                    ?>

                                                    <table class="table table-bordered table-sm">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <!-- <th>Keterangan</th>
                                                                 <th>Type</th> -->
                                                                <!-- <th>-Debit+Kredit</th> -->
                                                                <!-- <th>+Kredit</th> -->
                                                                <!-- <th>Saldo</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($grouped as $tanggal => $transaksis): ?>
                                                                <!-- Baris Tanggal sebagai Row -->
                                                                <tr style="background-color: #f0f0f0; font-weight: bold;">
                                                                    <td colspan="4"> <?= date('d F Y', strtotime($tanggal)) ?></td>

                                                                </tr>
                                                                <?php foreach ($transaksis as $row): ?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?= $row->noreferensi ?></td>
                                                                        <td>
                                                                            <?php if ($row->type == '300') {
                                                                                echo "<b>+ " . $row->kredit . "<br>" . "<small>" . $row->time . " WIB" . "<small>";
                                                                            } elseif ($row->type == '200') {
                                                                                echo "<b>- " . $row->debit . "<br>" . "<small> " . $row->time . " WIB" . "<small>";
                                                                            } elseif ($row->type == '100') {
                                                                                echo "<b>+ " . $row->kredit . "<br>" . "<small>" . $row->time . " WIB" . "<small>";
                                                                            }

                                                                            ?>
                                                                        </td>

                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } elseif (!empty($mutasi)) { ?>
                                                    <div class="alert alert-info">Tidak ada data mutasi untuk rentang tanggal ini.</div>
                                                <?php } else { ?>
                                                    <div class="alert alert-info">Tidak ada data mutasi untuk rentang tanggal ini.</div>
                                                <?php } ?>



                                            </div>



                                        </div>
                                        <div class="tab-pane fade show active" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">

                                            <!-- Bts -->
                                            <div class="card-header">
                                                <h3 class="card-title"> <b>Change Password</b></h3>
                                            </div>
                                            <div class="card-body">

                                                <form action="<?= base_url('users/changepassword'); ?>" method="post">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                        </div>
                                                        <input type="password" name="password1" class="form-control" id="password" placeholder="Password" required>
                                                        <!-- show password -->
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" onclick="password_show_hide();">
                                                                <i class="fas fa-eye" id="show_eye"></i>
                                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                                            </span>
                                                        </div>
                                                        <!-- show password -->
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                        </div>
                                                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm Password" required>
                                                        <!-- show password -->
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" onclick="password_show_hidee();">
                                                                <i class="fas fa-eye" id="show_eyee"></i>
                                                                <i class="fas fa-eye-slash d-none" id="hide_eyee"></i>
                                                            </span>
                                                        </div>
                                                        <!-- show password -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary btn-block">Mengubah Password</button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <!-- <h4>With icons</h4>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </div> -->
                                            </div>
                                            <!-- /.card-body -->
                                            <!-- Bts -->
                                            <!-- Bts -->
                                            <div class="card-header">
                                                <h3 class="card-title"> <b>PIN Password</b></h3>
                                            </div>
                                            <div class="card-body">

                                                <form action="<?= base_url('users/pinpassword'); ?>" method="post">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                        </div>
                                                        <input type="password" inputmode="numeric" name="pin1" class="form-control" id="pin" placeholder="PIN" required>
                                                        <!-- show password -->
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" onclick="pin_show_hide();">
                                                                <i class="fas fa-eye" id="pin_show_eye"></i>
                                                                <i class="fas fa-eye-slash d-none" id="pin_hide_eye"></i>
                                                            </span>
                                                        </div>
                                                        <!-- show password -->
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                        </div>
                                                        <input type="password" inputmode="numeric" name="pin2" class="form-control" id="pin2" placeholder="Confirm PIN" required>
                                                        <!-- show password -->
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" onclick="pin_show_hidee();">
                                                                <i class="fas fa-eye" id="pin_show_eyee"></i>
                                                                <i class="fas fa-eye-slash d-none" id="pin_hide_eyee"></i>
                                                            </span>
                                                        </div>
                                                        <!-- show password -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary btn-block">Mengubah PIN</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <!-- /.card-body -->
                                            <!-- Bts -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <a href="<?php echo base_url('logout')  ?>" class="card-link">Logout</a>
                                </div>
                            </div><!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->



                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>


    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
    <!--load swal js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- wilayah -->
    <script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                var url = "<?php echo site_url('settings/add_ajax_kab'); ?>/" + $(this).val();
                $('#kabupaten').load(url);
                return false;
            })

            $("#kabupaten").change(function() {
                var url = "<?php echo site_url('settings/add_ajax_kec'); ?>/" + $(this).val();
                $('#kecamatan').load(url);
                return false;
            })

            $("#kecamatan").change(function() {
                var url = "<?php echo site_url('settings/add_ajax_des'); ?>/" + $(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    </script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }

        function password_show_hidee() {
            var y = document.getElementById("password2");
            var show = document.getElementById("show_eyee");
            var hide = document.getElementById("hide_eyee");
            hide.classList.remove("d-none");
            if (y.type === "password") {
                y.type = "text";
                show.style.display = "none";
                hide.style.display = "block";
            } else {
                y.type = "password";
                show.style.display = "block";
                hide.style.display = "none";
            }
        }
    </script>
    <!-- PIN -->
    <script>
        function pin_show_hide() {
            var x = document.getElementById("pin");
            var show_eye = document.getElementById("pin_show_eye");
            var hide_eye = document.getElementById("pin_hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "tel";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }

        function pin_show_hidee() {
            var y = document.getElementById("pin2");
            var show = document.getElementById("pin_show_eyee");
            var hide = document.getElementById("pin_hide_eyee");
            hide.classList.remove("d-none");
            if (y.type === "password") {
                y.type = "tel";
                show.style.display = "none";
                hide.style.display = "block";
            } else {
                y.type = "password";
                show.style.display = "block";
                hide.style.display = "none";
            }
        }
    </script>

    <!-- Pesan Error -->
    <?php if ($this->session->flashdata('message_error')): ?>
        <script>
            Swal.fire({
                title: 'Error...!!!',
                text: '<?= $this->session->flashdata('message_error'); ?>',
                icon: 'error',
                // showConfirmButton: false,
                // confirmButtonText: 'Try Again',
                // timer: 1500
            });
        </script>
    <?php endif; ?>
    <!-- Pesan warning -->
    <?php if ($this->session->flashdata('message_warning')): ?>
        <script>
            Swal.fire({
                title: 'Warning...!!!',
                text: '<?= $this->session->flashdata('message_warning'); ?>',
                icon: 'warning',
                // showConfirmButton: false,
                // confirmButtonText: 'Try Again',
                // timer: 1500
            });
        </script>
    <?php endif; ?>

    <!-- Pesan info -->
    <?php if ($this->session->flashdata('message_info')): ?>
        <script>
            Swal.fire({
                title: 'Info...!!!',
                text: '<?= $this->session->flashdata('message_info'); ?>',
                icon: 'info'
                // confirmButtonText: 'Lanjutkan'
            });
        </script>
    <?php endif; ?>
    <!-- Pesan success login -->
    <?php if ($this->session->flashdata('message_success')): ?>
        <script>
            Swal.fire({
                title: 'Success...!!!',
                text: '<?= $this->session->flashdata('message_success'); ?>',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500 // Durasi dalam milidetik
            });
            // Arahkan setelah timer selesai
            setTimeout(() => {
                window.location.href = '<?= site_url("login"); ?>'; // Arahkan ke Home Page
            }, 1500); // Sesuaikan dengan timer SweetAlert
        </script>
    <?php endif; ?>

    <!-- Pesan success -->
    <?php if ($this->session->flashdata('msg_success')): ?>
        <script>
            Swal.fire({
                title: 'Success...!!!',
                text: '<?= $this->session->flashdata('msg_success'); ?>',
                icon: 'success',
                // confirmButtonText: 'Lanjutkan'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         window.location.href = ''; // Arahkan ke Authorization
                //     }
            });
        </script>
    <?php endif; ?>

    <!-- Pesan form validation -->
    <?php if (validation_errors()): ?>
        <script>
            Swal.fire({
                title: 'Error validation...!!!',
                text: <?= json_encode(strip_tags(validation_errors())); ?>,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>
</body>

</html>