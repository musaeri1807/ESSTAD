    <!-- jQuery_ recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!--load swal js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets/appmobile/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?= base_url() ?>assets/appmobile/assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?= base_url() ?>assets/appmobile/assets/js/base.js"></script>

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

    <?php if ($this->session->flashdata('clear_all_session_msg_success')): ?>
        <script>
            Swal.fire({
                title: 'Success...!!!',
                text: '<?= $this->session->flashdata('clear_all_session_msg_success'); ?>',
                icon: 'success'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('Authorization/clear_all_session') ?>";
                }
            });
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