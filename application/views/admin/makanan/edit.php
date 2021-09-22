<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Pengumuman</strong>
                    </div>
                    <div class="card-body card-block">
                        <?php if (validation_errors()) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        <?php
                        } ?>
                        <form action="<?= base_url() ?>pengumuman/prosesEdit" method="post" enctype="multipart/form-data">
                            <?php
                            foreach ($pengumuman as $item) { ?>
                                <input type="hidden" value="<?= $item['id_pengumuman'] ?>" name="id_pengumuman">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Judul</label></div>
                                    <div class="col-12 col-md-9"><input value="<?= $item['judul'] ?>" type="text" required class="form-control" name="judul" placeholder="Judul Pengumuman"></div>

                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Deskripsi</label></div>
                                    <div class="col-12 col-md-9"><textarea rows="9" class="form-control" name="isi" placeholder="Deskripsi Pengumuman" required><?= $item['isi'] ?></textarea></div>

                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Gambar :</label></div>
                                    <div class="col-12 col-md-9">
                                        <?php
                                        if ($item['header_gambar'] != 'Tidak Ada Gambar') {
                                        ?>
                                            <br>
                                            <img src="<?php echo base_url('assets/datakoperasi/pengumuman/' . $item['header_gambar']) ?>" width="40%" />

                                        <?php
                                        } else {
                                            echo "Tidak Ada Gambar";
                                        } ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"></div>
                                    <div class="col-12 col-md-9"><input class="form-control-file" type="file" name="header_gambar" />
                                        <small>* Jika ingin ganti gambar upload file, jika tidak biarkan kosong.</small>
                                    </div>

                                </div>
                                <div class="text-center">
                                    <a href="<?= base_url() ?>pengumuman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                    <button type="submit" name="submit" class="btn btn-success btn-sm">Edit Pengumuman</button>
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