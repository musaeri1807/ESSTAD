<!DOCTYPE html>
<html>

<head>
    <title>Mutasi Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Mutasi Transaksi</h2>

        <!-- Form Filter Tanggal -->
        <form method="GET" class="form-inline mb-4">

            <label class="mr-2">Dari Tanggal:</label>
            <input type="date" name="dari" class="form-control mr-3" value="<?= $this->input->get('dari') ?>">

            <label class="mr-2">Sampai Tanggal:</label>
            <input type="date" name="sampai" class="form-control mr-3" value="<?= $this->input->get('sampai') ?>">
            <input type="text" name="nomor" class="form-control mr-3" placeholder="Nomor Transaksi">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="<?= site_url('mutasi') ?>" class="btn btn-secondary ml-2">Reset</a>
        </form>
        <?php if (isset($mutasi) && !empty($mutasi)) { ?>

            <?php
            // Grouping data berdasarkan tanggal
            $grouped = [];
            foreach ($mutasi as $row) {
                $tanggal = date('d-m-Y', strtotime($row->field_tanggal_saldo));
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
                                <td><?= $row->field_no_referensi ?></td>
                                <td>
                                    <?php if ($row->field_type_saldo == '300') {
                                        echo "0";
                                    } elseif ($row->field_type_saldo == '200') {
                                        echo "<b>- " . $row->field_debit_saldo . "<br>" . "<small> " . $row->field_time . " WIB" . "<small>";
                                    } elseif ($row->field_type_saldo == '100') {
                                        echo "<b>+ " . $row->field_kredit_saldo . "<br>" . "<small>" . $row->field_time . " WIB" . "<small>";
                                    }

                                    ?>
                                </td>
                                <!-- <td><?= $row->field_kredit_saldo ?></td> -->
                                <!-- <td><?= $row->field_total_saldo ?></td> -->
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>




        <?php } else { ?>
            <div class="alert alert-info">Tidak ada data mutasi untuk rentang tanggal ini.</div>
        <?php } ?>

    </div>
</body>

</html>