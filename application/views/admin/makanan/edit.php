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
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <h3 class="mb-0">Edit Makanan & Minuman</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url() ?>makanan/prosesEdit" method="post" enctype="multipart/form-data">
                        <?php
                        foreach ($makanan as $mk) { ?>
                            <input type="hidden" value="<?= $mk['id_menu'] ?>" name="id_menu">
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Nama Menu</label>
                                <input value="<?= $mk['nama_menu'] ?>" type="text" required class="form-control" name="nama_menu" placeholder="Nama Menu">

                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Detail Menu</label>
                                <textarea rows="9" class="form-control" name="detail_menu" placeholder="Detail Menu" required><?= $mk['detail_menu'] ?></textarea>

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kategori</label>

                                <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                    <option <?php if ($mk['kategori'] == "Makanan") { ?>selected<?php } ?>>Makanan</option>
                                    <option <?php if ($mk['kategori'] == "Minuman") { ?>selected<?php } ?>>Minuman</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Stok</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="stok">
                                    <option <?php if ($mk['stok'] == "Tersedia") { ?>selected<?php } ?>>Tersedia</option>
                                    <option <?php if ($mk['stok'] == "Tidak Tersedia") { ?>selected<?php } ?>>Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Harga</label>
                                <input value="<?= $mk['harga'] ?>" type="number" min="0" required class="form-control" name="harga" placeholder="Harga">
                            </div>
                            <div class="text-center mb-3">
                                <a href="<?= base_url() ?>makanan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <button type="submit" class="btn btn-success btn-sm">Edit Menu</button>
                            </div>
                        <?php }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>