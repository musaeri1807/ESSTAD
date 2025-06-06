<!-- Footer Start -->
<div class="container-fluid bg-footer bg-primary text-white mt-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <h4 class="text-white mb-4">Bank Sampah</h4>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-white me-2"></i>
                            <p class="text-white mb-0">Jl Raya Jatinegara Kau Jakarta Timur<br>Jam Operasional pelayanan 09.00-15.00 WIB</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-white me-2"></i>
                            <p class="text-white mb-0">info@bspid.id</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-white me-2"></i>
                            <p class="text-white mb-0">62857-8039-0850 CS 01</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-white me-2"></i>
                            <p class="text-white mb-0">62812-8193-686 CS 02</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-secondary btn-square rounded-circle me-2" href="https://api.whatsapp.com/send?phone=6285780390850"><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-secondary btn-square rounded-circle me-2" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-secondary btn-square rounded-circle me-2" href="https://id-id.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-secondary btn-square rounded-circle me-2" href="https://www.linkedin.com/in/miga-informatika-71b407257/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-secondary btn-square rounded-circle" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-white mb-4">Bank Sampah Pintar</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Tentang Kami</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Layanan</a>
                            <!-- <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Meet The Team</a> -->
                            <!-- <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Latest Blog</a> -->
                            <a class="text-white" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Kontak
                                Us</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-white mb-4">Unit Cabang</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <?php foreach ($C as $Cabang) {  ?>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i> <?php echo $Cabang->NAMA_CABANG; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-lg-n5">
                <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                    <!-- <h4 class="text-white">Newsletter</h4>
                        <h6 class="text-white">Subscribe Our Newsletter</h6>
                        <p>Amet justo diam dolor rebum lorem sit stet sea justo kasd</p> -->
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark text-white py-4">
    <div class="container text-center">
        <p class="mb-0">&copy; <a class="text-secondary fw-bold" href="#">BSPID</a>. All Rights Reserved.
            Designed by <a class="text-secondary fw-bold" href="https://miga.co.id">IT</a></p>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-secondary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/lib/easing/easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/lib/waypoints/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/lib/counterup/counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="<?php echo base_url(); ?>assets/frontend/js/main.js"></script>
</body>

</html>