<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">SPK SAW</li>
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
                    <h3 class="mb-0">Sistem Pendukung Keputusan SAW</h3>
                </div>
                <div class="col-lg-12 m-3">
                    <?= $this->session->flashdata('message'); ?>
                    <?php if ($this->session->flashdata('error')) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php
                    } ?>
                    <h2>Selamat datang pada Sistem Pendukung Keputusan Pegawai Teladan Terbaik dengan menggunakan metode SAW (Simple Additive Weighting)</h2>
                    <h3>Menu : </h3>
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahkriteriamodal"><i class="fa fa-clipboard-list"></i> Tambah Kriteria</button>
                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahpegawaimodal"><i class="fa fa-users"></i> Tambah Pegawai</button>
                    <a href="<?= base_url() ?>saw/hitung" class="btn btn-warning mb-3"><i class="fa fa-trophy"></i> Pilih Pegawai Terbaik</a><br>
                    <?php
                    if (!empty($kriteria)) {
                    ?>
                        <h3>Tabel Kriteria</h3>
                        <div class="table-responsive mb-5">
                            <table class="table table-bordered dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Penjelasan Kriteria</th>
                                        <th scope="col">Bobot Kriteria</th>
                                        <th scope="col">Kategori Bobot</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kriteria as $k) {
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $k['nama_kriteria'] ?></td>
                                            <td><?= $k['penjelasan_kriteria'] ?></td>
                                            <td><?= $k['bobot_kriteria'] ?></td>
                                            <td><?= $k['kategori_bobot'] ?></td>
                                            <td>
                                                <button class="badge badge-success">Edit</button>
                                                <button class="badge badge-danger">Delete</button>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else {
                    ?>
                        <h3>Kriteria masih kosong, silahkan tambah kriteria</h3>
                    <?php
                    }
                    if (!empty($pegawai)) {
                    ?>
                        <h3>Tabel Pegawai</h3>
                        <div class="table-responsive mb-5">
                            <table class="table table-bordered dataTable" id="datatable-id2" role="grid" aria-describedby="datatable-basic_info">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pegawai</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pegawai as $p) {
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['nama_pegawai'] ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>saw/hapus_pegawai/<?= $p['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Pegawai <?= $p['nama_pegawai'] ?>?');" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else {
                    ?>
                        <h3>Data Pegawai masih kosong, silahkan tambah pegawai</h3>
                    <?php
                    }
                    ?>
                    <h3>Tabel Riwayat Pegawai Terbaik</h3>
                    <div class="table-responsive mb-5">
                        <table class="table table-bordered dataTable" id="datatable-id3" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Penentuan</th>
                                    <th scope="col">Pegawai Terpilih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($riwayat as $r) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= date("d-m-Y", strtotime($r['tanggal_penghitungan'])) ?></td>
                                        <td><?= $r['pegawai_terpilih'] ?></td>
                                    </tr>
                                <?php
                                    $no++;
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

<div class="modal fade" id="tambahkriteriamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>saw/tambah_kriteria">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kriteria</label>
                        <input type="text" required name="nama_kriteria" class="form-control" placeholder="Masukan Kriteria"><br>
                        <textarea class="form-control" name="penjelasan_kriteria" rows="4" placeholder="Masukan Penjelasan Mengenai Kriteria Kriteria"></textarea>
                        <small id="deskripsi" class="form-text text-muted">Masukan kriteria untuk menentukan pembobotan.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bobot Kriteria</label>
                        <select class="form-control" name="bobot_kriteria" id="exampleFormControlSelect1" required>
                            <option selected disabled value="">Pilih Bobot Kriteria</option>
                            <option value="0.1">Rendah</option>
                            <option value="0.15">Cukup</option>
                            <option value="0.2">Tinggi</option>
                            <option value="0.25">Sangat Tinggi</option>
                        </select>
                        <small id="deskripsi" class="form-text text-muted">Kategori Bobot Kriteria Penjelasan:
                            <ol>
                                <li>0.1 = Rendah</li>
                                <li>0.15 = Cukup</li>
                                <li>0.2 = Tinggi</li>
                                <li>0.25 = Sangat Tinggi</li>
                            </ol>
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Kategori Bobot(Cost/Benefit)</label>
                        <select class="form-control" name="kategori_bobot" id="exampleFormControlSelect1" required>
                            <option selected disabled value="">Pilih Kategori Bobot</option>
                            <option>Cost</option>
                            <option>Benefit</option>
                        </select>
                        <small id="deskripsi" class="form-text text-muted">Jika cost maka semakin kecil nilai semakin bagus, jika benefit maka semakin besar nilai semakin bagus.</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Kriteria</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahpegawaimodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kandidat Pegawai Teladan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>saw/tambah_pegawai">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pegawai</label>
                        <input type="text" required name="nama_pegawai" class="form-control" placeholder="Masukan Nama Pegawai"><br>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Pegawai</button>
                </form>
            </div>
        </div>
    </div>
</div>