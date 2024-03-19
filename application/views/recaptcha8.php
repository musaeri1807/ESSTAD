<html>

<head>
    <title>reCAPTCHA Example</title>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form action="<?= base_url('Ztest/recaptcha')  ?>" method="post">
        <?php echo $widget; ?>
        <?php echo $script; ?>
        <br />
        <input type="submit" value="submit" />
    </form>
</body>

</html>