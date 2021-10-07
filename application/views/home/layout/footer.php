  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3><?= $nama_usaha ?></h3>
      <p>Alamat : <?= $alamat ?></p>
      <p>No Telepon : </i> <?= $nomor_telepon ?></p>
      <div class="social-links">
        <a href="https://instagram.com/<?= $instagram ?>" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
        <a href="https://facebook.com/<?= $facebook ?>" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Bjn Squad</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/home/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>assets/home/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/home/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>assets/home/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>assets/home/js/main.js"></script>
  <script src="<?= base_url() ?>assets/home/select2/js/select2.full.min.js"></script>
  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2();
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    });
  </script>
  </body>

  </html>