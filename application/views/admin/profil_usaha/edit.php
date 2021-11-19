<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profil Usaha</li>
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
                    <h3 class="mb-0">Edit Profil Usaha Anda</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <?php foreach ($profil_usaha as $ps) {
                    ?>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="form-group">
                                <form action="<?= base_url() ?>profilusaha/edit" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="current_id" required value="<?= $ps['id'] ?>">
                                    <label>Nama Usaha</label>
                                    <input type="text" class="form-control" name="nama_usaha" value="<?= $ps['nama_usaha'] ?>" required>
                                    <label>Deskripsi Singkat Usaha</label>
                                    <textarea type="text" rows="5" class="form-control" name="deskripsi" required="required"><?= $ps['deskripsi'] ?></textarea>
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?= $ps['alamat'] ?>" required>
                                    <label>Nomor Telepon</label>
                                    <input type="number" min="0" class="form-control" name="nomor_telepon" value="<?= $ps['nomor_telepon'] ?>" required>
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $ps['email'] ?>">
                                    <label>Instagram</label><small>* Tidak usah diberi @</small>
                                    <input type="text" class="form-control" name="instagram" value="<?= $ps['instagram'] ?>">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="<?= $ps['facebook'] ?>">
                                    <label>Maps Link</label><small>* Cara mengambil link maps? Klik disini</small>
                                    <textarea type="text" rows="5" class="form-control" name="maps_link"><?= $ps['maps_link'] ?></textarea>
                            </div>
                            <label class="font-weight-bold">Gambar Slide Show Restoran pada Homepage:</label><br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img class="m-3" src="<?= base_url() ?>assets/dataresto/foto_usaha/<?= $ps['foto_usaha_1'] ?>" width="100%"><br>
                                        Gambar 1
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img class="m-3" src="<?= base_url() ?>assets/dataresto/foto_usaha/<?= $ps['foto_usaha_2'] ?>" width="100%"><br>
                                        Gambar 2
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img class="m-3" src="<?= base_url() ?>assets/dataresto/foto_usaha/<?= $ps['foto_usaha_3'] ?>" width="100%"><br>
                                        Gambar 3
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <small>* Jika tidak ingin mengganti gambar silahkan kosongi.</small><br>
                                <label for="exampleFormControlFile1">Gambar 1</label>
                                <input type="file" class="form-control-file" name="foto_usaha_1" accept=".jpg, .jpeg, .png">
                                <label for="exampleFormControlFile1">Gambar 2</label>
                                <input type="file" class="form-control-file" name="foto_usaha_2" accept=".jpg, .jpeg, .png">
                                <label for="exampleFormControlFile1">Gambar 3</label>
                                <input type="file" class="form-control-file" name="foto_usaha_3" accept=".jpg, .jpeg, .png">
                                <button type="submit" class="btn btn-primary mt-3">Edit Profil Usaha</button>
                                </form>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>