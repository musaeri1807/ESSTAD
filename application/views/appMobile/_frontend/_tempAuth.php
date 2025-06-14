<!doctype html>
<html lang="en">

<?= @$_head; ?>

<body>
    <!-- loader -->
    <div id="loader">
        <img src="<?= base_url() ?>assets/appmobile/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <?= @$_content; ?>


    <?= @$_jquery; ?>

</body>

</html>