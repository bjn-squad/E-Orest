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
        <h2>SEJARAH FLAMINGO CAFE & RESTO</h2>
      </div>

      <div class="row content">
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Flamingo Resto and Café sudah dikenal luas oleh pecinta kuliner di Indonesia sebagai restoran halal yang menghadirkan resep nasional yang terinspirasi oleh budaya-budaya yang beragam dari seluruh Indonesia, dari resep nusantara yang tak lekang oleh waktu.
            Tak hanya hidangan khas Nusantara, minuman dan menu mancanegara pun juga dapat ditemukan di Flamingo Resto and Café bagi pengunjung yang ingin duduk dan bersantai, mengadakan rapat kecil, atau berbaur dengan teman dan keluarga.
          </p>
        </div>
        <div class="col-lg-6">
          <img style="width: 40vw;height:25vw;" src="<?php echo base_url('assets/dataresto/foto_usaha/' . $foto_usaha_1) ?>" />
        </div>
      </div>

    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <div class="section-title">
        <h2><?= $nama_usaha ?></h2>
        <p>Selamat Datang di Restoran kami</p>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <?= $maps_link ?>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <ul>
            <li><i class="ri-check-double-line"></i><?= $alamat ?></li>
            <li><i class="ri-check-double-line"></i> <?= $nomor_telepon ?></li>
            <li><i class="ri-check-double-line"></i> <?= $instagram ?></li>
            <li><i class="ri-check-double-line"></i> <?= $facebook ?></li>
          </ul>
          <!-- <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
          </p> -->
          <!-- <a href="our-story.html" class="btn-learn-more">Learn More</a> -->
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
          <p class="description">Metode pembayaran dapat dilakukan melalui OVO, Gopay, Dana dan tranfer antar bank.</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-bounding-box"></i></div>
          <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
          <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
        </div>

      </div>

    </div>
  </section><!-- End Features Section -->

  <!-- ======= Recent Photos Section ======= -->
  <section id="recent-photos" class="recent-photos">
    <div class="container">

      <div class="section-title">
        <h2>MENU SPESIAL</h2>
        <p>Menyediakan makanan khas dari Indonesia, siapapun kini bisa berwisata kuliner nusantara hanya dengan mengunjungi Flamingo Resto & Cafe. Bakso? Mie Ayam? Mie Jamur? semua ada disini.</p>
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