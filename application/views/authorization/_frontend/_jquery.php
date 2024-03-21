<!-- jQuery -->
<script src='https://www.google.com/recaptcha/api.js'></script>

<script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>

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
        var show= document.getElementById("show_eyee");
        var hide= document.getElementById("hide_eyee");
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