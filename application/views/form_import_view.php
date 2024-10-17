<!-- form_import_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import Data Karyawan dari Excel</title>
</head>
<body>
    <h3>Import Data Karyawan</h3>
    
    <?php echo form_open_multipart('import/do_import'); ?>
    
    <label for="file">Pilih File Excel:</label>
    <input type="file" name="file" accept=".xls,.xlsx">
    
    <br><br>
    
    <input type="submit" value="Import">
    
    <?php echo form_close(); ?>
</body>
</html>
