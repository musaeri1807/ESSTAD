<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Captcha Example</title>
</head>
<body>
    <h3>Captcha Example</h3>
    <form action="<?= site_url('captcha/validate') ?>" method="POST">
        <label for="captcha">Masukkan kode di bawah ini:</label><br>
        <img src="<?= $captcha_image ?>" alt="Captcha"><br><br>
        <input type="text" name="captcha" id="captcha" required><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
