<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Events</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Events</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Event List Section ======= -->
  <section id="event-list" class="event-list">
    <div class="container">

      <div class="row">
        <?php
        foreach ($menu as $m) {
        ?>
          <div class="col-md-3 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="<?php echo base_url('assets/dataresto/menu/' . $gambar) ?>" />
              </div>
              <div class="card-body">
                <h5 class="card-title"><?= $m['nama_menu'] ?></h5>
                <p class="fst-italic text-center"><?= $m['detail_menu'] ?></p>
                <p class="card-text text-center">Rp.<?= $m['harga'] ?></p>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>

    </div>
  </section><!-- End Event List Section -->

</main><!-- End #main -->