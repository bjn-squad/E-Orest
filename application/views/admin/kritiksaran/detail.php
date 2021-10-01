<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url() ?>saran">Daftar Kritik & Saran</a></li>
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
                <h3 class="mb-0">Detail Kritik & Saran </h3>
              </div>

            </div>
          </div>
          <div class="card-body">
            <div class="pl-lg-4">
              <?php
              foreach ($saran_kritik as $i) {
              ?>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Nama Pelanggan :</label>
                      <label><?= $i['nama_pelanggan'] ?></label>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Email :</label>
                      <label><?= $i['email'] ?></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Kritik & Saran</label>
                      <p style="color:#696969; text-align: justify; border: 1px solid rgba(224,224, 224, 4); border-radius: 10px;">
                        <label style=" margin: 10px;"><?= $i['saran'] ?></label>
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Tanggal :</label>
                      <label><?= $i['tanggal'] ?></label>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>