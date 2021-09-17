<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
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
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Dashboard Admin</h3>
        </div>
        <?php foreach ($pegawai as $data) {
        ?>
          <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <h4>Selamat Datang, <?= $data['nama'] ?></h4><br>
            <h5>Profil Anda</h5><br>
            <label class="font-weight-bold">Nama :</label> <?= $data['nama'] ?><br>
            <label class="font-weight-bold">Email :</label> <?= $data['email'] ?><br>
            <label class="font-weight-bold">Alamat :</label> <?= $data['alamat'] ?><br>
            <label class="font-weight-bold">Jenis Kelamin :</label> <?= $data['telepon'] ?><br>
            <label class="font-weight-bold">No. Telpon :</label> <?= $data['telepon'] ?><br>
            <?= $this->session->userdata('jabatan') ?>
            <br>
          <?php
        } ?>
          </div>
      </div>
    </div>
  </div>