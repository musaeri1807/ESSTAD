<!-- import_result_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hasil Import Data Karyawan</title>
</head>

<body>
    <h3>Hasil Import Data Karyawan</h3>

    <?php if (!empty($imported_data)): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($imported_data as $row): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['jabatan']; ?></td>
                        <td><?php echo $row['jabatan']; ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data yang diimpor.</p>
    <?php endif; ?>

    <br>
    <a href="<?php echo site_url('import'); ?>">Kembali ke Form Import</a>
</body>

</html>