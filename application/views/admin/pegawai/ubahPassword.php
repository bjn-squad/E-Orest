<script>
    function passwordShowUnshow() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/daftar_pegawai">Kelola Pegawai</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ganti Password</li>
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
                                <h3 class="mb-0">Ganti Password</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <?php if (validation_errors()) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        <?php
                        } ?>
                        <form action="<?= base_url() ?>admin/ubahPassword" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label class=" form-control-label">Masukan Password Baru</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></div>
                                    <input class="form-control" type="password" name="password" id="password" required autofocus>
                                </div>
                                <small class="form-text text-muted">Minimal memiliki 5 karakter, contoh : andi1</small>
                                <span onclick="passwordShowUnshow()" style="cursor: pointer;">
                                    <i class="fa fa-eye"></i> Tampilkan/Sembunyikan Password
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin ingin mengganti password?')"><i class="fa fa-lock"></i> Ganti Password</button>
                    </div>
                    </form>
                </div>
            </div>