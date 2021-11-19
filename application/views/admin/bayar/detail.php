<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>makanan">Riwayat Pemesanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail & Konfirmasi</li>
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
                    <h3 class="mb-0">Detail & Konfirmasi</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url() ?>pembayaran/prosesEdit" method="post" enctype="multipart/form-data">
                        <?php
                        foreach ($booking as $b) { ?>
                            <input type="hidden" value="<?= $b['id_booking'] ?>" name="id_booking">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Kode Pembayaran : </label></div>
                                <div class="col-12 col-md-9"> <label><?= $b['id_detail_menu'] ?></label></div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nomor Meja : </label></div>
                                <div class="col-12 col-md-9"> <label><?= $b['id_meja'] ?></label></div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Pemesan : </label></div>
                                <div class="col-12 col-md-9"> <label><?= $b['nama_pemesan'] ?></label></div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nomor HP : </label></div>
                                <div class="col-12 col-md-9"> <label><?= $b['nomor_hp'] ?></label></div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Tanggal Pemesanan : </label></div>
                                <div class="col-12 col-md-9"> <label><?= $b['tanggal_pesan'] ?></label></div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"> <label for="textarea-input" class=" form-control-label">Tanggal Reservasi : </label></div>
                                <div class="col-12 col-md-9"> <label><?= $b['tanggal_reservasi'] ?></label></div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Total Pembayaran : </label></div>
                                <div class="col-12 col-md-9"> <label><?= $b['total_pembayaran'] ?></label></div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Batas Pembayaran DP : </label></div>
                                <div class="col-12 col-md-9"> <label><?= $b['batas_pembayaran_dp'] ?></label></div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Jumlah DP Terbayar : </label></div>
                                <div class="col-12 col-md-9"><input type="number" min="0" class="form-control" placeholder="" name="total_sudah_dibayar" required>
                                    <small>* Jika gambar salah/dp kurang isi jumlah DP terbayar dengan angka 0</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="exampleFormControlSelect1">Status Pembayaran : </label></div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" id="exampleFormControlSelect1" name="status_pembayaran">
                                        <option <?php if ($b['status_pembayaran'] == "Sudah Bayar DP") { ?>selected<?php } ?>>Sudah Bayar DP</option>
                                        <option value="Belum Bayar DP" <?php if ($b['status_pembayaran'] == "Belum Bayar DP") { ?>selected<?php } ?>>Belum Bayar DP (Gambar Salah/DP Kurang)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center mb-3">
                                    <a href="<?= base_url() ?>pembayaran" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>