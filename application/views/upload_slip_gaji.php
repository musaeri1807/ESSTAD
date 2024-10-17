<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Slip Gaji Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Upload Slip Gaji Karyawan</h2>
        <p>Unggah file slip gaji (format PDF) untuk 100 karyawan, dan kirim secara bersamaan.</p>

        <!-- Form untuk upload slip gaji -->
        <form action="<?= base_url('slip_gaji/upload_process'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="slipGaji">Pilih File Slip Gaji (Maks 100 file PDF):</label>
                <input type="file" class="form-control" id="slipGaji" name="slip_gaji[]" accept="application/pdf" multiple required>
                <small class="form-text text-muted">Pastikan setiap file slip gaji memiliki nama yang sesuai dengan karyawan yang bersangkutan.</small>
            </div>

            <button type="submit" class="btn btn-primary">Upload dan Kirim</button>
        </form>

        <!-- Area untuk menampilkan pesan berhasil atau gagal -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success mt-3"><?= $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger mt-3"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>