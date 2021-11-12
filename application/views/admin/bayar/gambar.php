<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url() ?>pembayaran">Bukti Pembayaran</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-12">
                <h3 class="mb-0">Detail Bukti Pembayaran </h3>
              </div>

            </div>
          </div>
          <div class="card-body">
            <div class="pl-lg-4">
              <?php
              foreach ($booking as $b) {
              ?>
                <div class="row">
                  <div class="col-lg-12">
                    <a href="<?= base_url() ?>assets/dataresto/bukti_bayar/<?= $b['bukti_pembayaran'] ?>" target="_blank">
                      <img style="display:block; margin:auto;" width="350px" src="<?= base_url() ?>assets/dataresto/bukti_bayar/<?= $b['bukti_pembayaran'] ?>" alt="Gambar <?= $b['bukti_pembayaran'] ?>">
                    </a>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>