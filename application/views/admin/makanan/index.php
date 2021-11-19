<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Makanan & Minuman</li>
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
                    <h3 class="mb-0">Makanan & Minuman</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahmakananmodal"><i class="fa fa-plus"></i> Tambah Menu</button>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>Nama Menu</th>
                                    <th>Detail Menu</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($makanan as $mk) {
                                ?>
                                    <tr>
                                        <td><?= $mk['nama_menu'] ?></td>
                                        <td><?= $mk['detail_menu'] ?></td>
                                        <td><?= $mk['kategori'] ?></td>
                                        <td><?= $mk['stok'] ?></td>
                                        <td>Rp. <?= number_format($mk['harga'], 0, ',', '.')  ?></td>
                                        <td>
                                            <a href="<?php base_url() ?>makanan/gambar/<?= $mk['id_menu'] ?>" class="btn btn-sm btn-info"> Gambar</a>
                                            <a href="<?php base_url() ?>makanan/edit/<?= $mk['id_menu'] ?>" class="btn btn-sm btn-warning"> Edit</a>
                                            <a href="<?php base_url() ?>makanan/delete/<?= $mk['id_menu'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus menu <?= $mk['nama_menu'] ?>? Jika anda menghapus menu ini maka gambar menu ini ikut terhapus.')" class="btn btn-sm btn-danger"> Hapus</a>
                                        </td>
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

    <!-- Modal -->
    <div class="modal fade" id="tambahmakananmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>makanan/tambah" method="POST">
                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text" class="form-control" placeholder="" name="nama_menu" required>
                            <label>Detail Menu</label>
                            <input type="text" class="form-control" placeholder="" name="detail_menu" required>
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                <option>Makanan</option>
                                <option>Minuman</option>
                            </select>
                            <label for="exampleFormControlSelect1">Stok</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="stok">
                                <option>Tersedia</option>
                                <option>Tidak Tersedia</option>
                            </select>
                            <label>Harga</label>
                            <input type="number" class="form-control" placeholder="" name="harga" required|numeric>
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