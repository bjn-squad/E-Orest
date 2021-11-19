<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="3000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(<?= base_url() ?>assets/dataresto/foto_usaha/<?= $foto_usaha_1 ?>)">

      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url(<?= base_url() ?>assets/dataresto/foto_usaha/<?= $foto_usaha_2 ?>)">
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url(<?= base_url() ?>assets/dataresto/foto_usaha/<?= $foto_usaha_3 ?>)">
      </div>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

<main id="main">

  <section id="about" class="about">
    <div class="container">

      <div class="section-title">
        <h2>TENTANG <?= $nama_usaha ?></h2>
      </div>

      <div class="row content">
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            <?= $deskripsi ?>
          </p><br>
        </div>
        <div class="col-lg-6">
          <img style="width: 100%;" src="<?php echo base_url('assets/dataresto/foto_usaha/' . $foto_usaha_1) ?>" />
        </div>
      </div>

    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <div class="section-title">
        <h2>Informasi <?= $nama_usaha ?></h2>
        <p>Selamat Datang di Restoran kami</p>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <?php
          if ($maps_link !== "") {
          ?>
            <iframe src="<?= $maps_link ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          <?php
          } else {
          ?>
            <h3><?= $nama_usaha ?> belum menambahkan google maps</h3>
          <?php
          }
          ?>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Informasi Mengenai <?= $nama_usaha ?>
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i>Alamat : <?= $alamat ?></li>
            <li><i class="ri-check-double-line"></i>No Telepon : <?= $nomor_telepon ?></li>
            <li><i class="ri-check-double-line"></i>Instagram : <a href="https://instagram.com/<?= $instagram ?>">@<?= $instagram ?></a></li>
            <li><i class="ri-check-double-line"></i>Facebook : <a href="https://facebook.com/<?= $instagram ?>"><?= $facebook ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </section><!-- End My & Family Section -->

  <!-- ======= Features Section ======= -->
  <section id="features" class="features">
    <div class="container">
      <div class="section-title">
        <h2>PELAYANAN ONLINE</h2>

      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-laptop"></i></div>
          <h4 class="title"><a href="">Pemesanan</a></h4>
          <p class="description">Layanan pemesanan meja dan menu secara online bisa anda lakukan dari rumah.</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-bar-chart"></i></div>
          <h4 class="title"><a href="">Pembayaran</a></h4>
          <p class="description">Pembayaran dapat dibayar melalui E-Money atau tranfer antar bank.</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-hand-thumbs-up"></i></div>
          <h4 class="title"><a href="">Easy to Use</a></h4>
          <p class="description">Anda dapat memesan dan melihat tentang profil kami secara mudah dan cepat.</p>
        </div>

      </div>

    </div>
  </section><!-- End Features Section -->

  <!-- ======= Recent Photos Section ======= -->
  <section id="recent-photos" class="recent-photos">
    <div class="container">

      <div class="section-title">
        <h2>MENU SPESIAL</h2>
        <p>Menyediakan menu makanan dan minuman yang berkualitas, siapapun kini bisa berwisata kuliner hanya dengan mengunjungi <?= $nama_usaha ?>. Semua yang anda cari ada disini!</p>
      </div>

      <div class="recent-photos-slider swiper-container">
        <div class="swiper-wrapper align-items-center">
          <?php
          foreach ($gambar_menu as $m) {
            // $id_menu = $m['id_menu'];
          ?>
            <div class="swiper-slide" style="height: 100px;"><a href="<?php echo base_url('assets/dataresto/menu/' . $m['gambar']) ?>" class="glightbox"><img src="<?php echo base_url('assets/dataresto/menu/' . $m['gambar']) ?>" style="object-fit: cover;" class="img-fluid" alt=""></a></div>

          <?php
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Recent Photos Section -->

</main><!-- End #main -->