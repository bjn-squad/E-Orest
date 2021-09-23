<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Menu</strong>
                    </div>
                    <div class="card-body card-block">
                        <?php if (validation_errors()) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        <?php
                        } ?>
                        <form action="<?= base_url() ?>makanan/prosesEdit" method="post" enctype="multipart/form-data">
                            <?php
                            foreach ($makanan as $mk) { ?>
                                <input type="hidden" value="<?= $mk['id_menu'] ?>" name="id_menu">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Menu</label></div>
                                    <div class="col-12 col-md-9"><input value="<?= $mk['nama_menu'] ?>" type="text" required class="form-control" name="nama_menu" placeholder="Nama Menu"></div>

                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Detail Menu</label></div>
                                    <div class="col-12 col-md-9"><textarea rows="9" class="form-control" name="isi" placeholder="Detail Menu" required><?= $mk['detail_menu'] ?></textarea></div>

                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Gambar :</label></div>
                                    <div class="col-12 col-md-9">
                                        <?php
                                        if ($mk['gambar'] != 'Tidak Ada Gambar') {
                                        ?>
                                            <br>
                                            <img src="<?php echo base_url('assets/dataresto/menu/' . $mk['gambar']) ?>" width="40%" />

                                        <?php
                                        } else {
                                            echo "Tidak Ada Gambar";
                                        } ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"></div>
                                    <div class="col-12 col-md-9"><input class="form-control-file" type="file" name="gambar" />
                                        <small>* Jika ingin ganti gambar upload file, jika tidak biarkan kosong.</small>
                                    </div>

                                </div>
                                <div class="text-center">
                                    <a href="<?= base_url() ?>makanan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                    <a href="<?= base_url() ?>makanan" class="btn btn-success btn-sm">Edit Pengumuman</button>
                                </div>
                            <?php }
                            ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>