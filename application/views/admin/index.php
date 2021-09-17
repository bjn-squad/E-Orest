<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Dashboard Admin</strong>
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
              <?php
              if ($data['jabatan'] == 1) {
                echo 'Admin';
              } else {
                echo 'Pegawai';
              }
              ?>
              <br>
            <?php
          } ?>
            </div>
        </div>
      </div>
    </div><!-- .animated -->
  </div><!-- .content -->