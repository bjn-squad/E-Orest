<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>makanan">Makanan & Minuman</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gambar <?= $nama_menu ?></li>
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
                    <h3 class="mb-0"> Gambar <?= $nama_menu ?> </h3>
                </div>
                <div class="col-lg-12">
                    <?php
                    if ($this->session->flashdata('error')) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php echo $this->session->flashdata('message');
                    if (count($gambar) < 3) {
                    ?>
                        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahgambarmodal"><i class="fa fa-plus"></i> Tambah Gambar</button>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="fa fa-info"></i> Anda telah mencapai batas upload gambar, yaitu 3 gambar. Jika ingin mengupload gambar silahkan hapus salah satu gambar dibawah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    }
                    ?>
                    <table class="table table-flush dataTable" role="grid" aria-describedby="datatable-basic_info">
                        <thead class="thead-dark">
                            <tr role="row">
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($gambar)) {
                                foreach ($gambar as $gb) {
                            ?>
                                    <tr>
                                        <td>
                                            <center>
                                                <img width="350px" src="<?= base_url() ?>assets/dataresto/menu/<?= $gb['gambar'] ?>" alt="Gambar <?= $gb['nama_menu'] ?>">
                                            </center>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('makanan/hapus_gambar/' . $gb['id_gambar'] . '/' . $id_menu) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus gambar ini?')" class="btn btn-sm btn-danger"> Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td>
                                        <h4>Gambar masih kosong, silahkan tambahkan gambar menu anda.</h4>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahgambarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar <?= $nama_menu ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>makanan/tambah_gambar" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="hidden" required name="id_menu" value="<?= $id_menu ?>">
                        <input type="file" name="gambar_menu" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>