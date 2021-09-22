<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Makanan</strong>
                    </div>
                    <?php
                    foreach ($makanan as $mk) {
                    ?>
                        <div class="card-body card-block">
                            <a href="<?= base_url() ?>makanan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                            <center>
                                <h1><?= $mk['nama_makanan'] ?></h1>
                                <br>
                                <?php
                                if ($mk['gambar'] != 'Tidak Ada Gambar') {
                                ?>
                                    <img src="<?php echo base_url('assets/dataresto/makanan/' . $mk['gambar']) ?>" width="40%" />
                                <?php
                                } else {
                                ?>
                                    <img src="<?php echo base_url('assets/dataresto/makanan/imgnotav.png') ?>" width="20%" />
                                <?php
                                } ?>
                            </center>
                            <p style="white-space: pre-line;color:black; text-align: justify;">
                                <?= $mk['nama_makanan'] ?>
                            </p>
                            <hr>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>