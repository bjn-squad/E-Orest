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
        <h2><?= $nama_usaha ?></h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <img src="<?= base_url() ?>assets/home/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
          </ul>
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <a href="our-story.html" class="btn-learn-more">Learn More</a>
        </div>
      </div>

    </div>
  </section><!-- End My & Family Section -->

  <!-- ======= Features Section ======= -->
  <section id="features" class="features">
    <div class="container">

      <div class="row">
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-laptop"></i></div>
          <h4 class="title"><a href="">Lorem Ipsum</a></h4>
          <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-bar-chart"></i></div>
          <h4 class="title"><a href="">Dolor Sitema</a></h4>
          <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-bounding-box"></i></div>
          <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
          <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-broadcast"></i></div>
          <h4 class="title"><a href="">Magni Dolores</a></h4>
          <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-camera"></i></div>
          <h4 class="title"><a href="">Nemo Enim</a></h4>
          <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="bi bi-diagram-3"></i></div>
          <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
          <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
        </div>
      </div>

    </div>
  </section><!-- End Features Section -->

  <!-- ======= Recent Photos Section ======= -->
  <section id="recent-photos" class="recent-photos">
    <div class="container">

      <div class="section-title">
        <h2>Recent Photos</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="recent-photos-slider swiper-container">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><a href="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-1.jpg" class="glightbox"><img src="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-1.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-2.jpg" class="glightbox"><img src="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-2.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-3.jpg" class="glightbox"><img src="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-3.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-4.jpg" class="glightbox"><img src="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-4.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-5.jpg" class="glightbox"><img src="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-5.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-6.jpg" class="glightbox"><img src="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-6.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-7.jpg" class="glightbox"><img src="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-7.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-8.jpg" class="glightbox"><img src="<?= base_url() ?>assets/home/img/recent-photos/recent-photos-8.jpg" class="img-fluid" alt=""></a></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Recent Photos Section -->

</main><!-- End #main -->