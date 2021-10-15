<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Daftar Kritik & Saran</li>
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
          <h3 class="mb-0">Daftar Kritik & Saran</h3>
        </div>
        <div class="col-lg-12">
          <?= $this->session->flashdata('message'); ?>
          <div class="table-responsive">
            <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
              <thead class="thead-dark">
                <tr role="row">
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>E-mail</th>
                  <th>Tanggal</th>
                  <!-- <th>Kritik & Saran</th> -->
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($saran_kritik as $s) {
                ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $s['nama_pelanggan'] ?></td>
                    <td><?= $s['email'] ?></td>
                    <td><?= $s['tanggal'] ?></td>
                    <!-- <td><?= $s['saran'] ?></td> -->
                    <td>
                      <a href="<?php base_url() ?>saran/detail/<?= $s['id_saran'] ?>" class="btn btn-sm btn-warning">Detail</a>
                      <?php
                      if ($this->session->userdata('jabatan') == "admin") {
                      ?>
                        <a href="<?php base_url() ?>saran/delete/<?= $s['id_saran'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>