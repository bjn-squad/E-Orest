<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit My Profile</li>
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
                    <h3 class="mb-0">Edit My Profile</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url() ?>admin/prosesEditMyProfile" method="post" enctype="multipart/form-data">
                        <?php
                        foreach ($det as $mk) { ?>
                            <input type="hidden" value="<?= $mk['id_pegawai'] ?>" name="id_pegawai">
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Nama Pegawai</label>
                                <input value="<?= $mk['nama'] ?>" type="text" required class="form-control" name="nama" placeholder="Nama Anda">
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Email</label>
                                <input disabled value="<?= $mk['email'] ?>" type="text" required class="form-control" name="email" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Alamat</label>
                                <input value="<?= $mk['alamat'] ?>" type="text" required class="form-control" name="alamat" placeholder="Alamat Anda">
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Nomor Telepon</label>
                                <input value="<?= $mk['telepon'] ?>" type="text" required class="form-control" name="telepon" placeholder="Nomor Telepon Anda">
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Jenis Kelamin</label>
                                <input disabled value="<?= $mk['jenis_kelamin'] ?>" type="text" required class="form-control" name="jenis_kelamin" placeholder="">
                            </div>
                            <div class="text-center mb-3">
                                <a href="<?= base_url() ?>admin" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                            </div>
                        <?php }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>