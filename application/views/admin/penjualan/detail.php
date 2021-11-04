<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>penjualan">Riwayat Pemesanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
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
                    <h3 class="mb-0">Detail Pemesanan</h3>
                </div>
                <div class="col-lg-12">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Kode Pembayaran : </label></div>
                        <div class="col-12 col-md-9"> <label><?= $book->id_detail_menu ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Pemesan : </label></div>
                        <div class="col-12 col-md-9"> <label><?= $book->nama_pemesan ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nomor HP : </label></div>
                        <div class="col-12 col-md-9"> <label><?= $book->nomor_hp ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nomor Meja : </label></div>
                        <div class="col-12 col-md-9"> <label><?= $book->nomor_meja ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Tanggal Transaksi : </label></div>
                        <div class="col-12 col-md-9"> <label><?= date("d-m-Y", strtotime($book->tanggal_reservasi))  ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Jam Transaksi : </label></div>
                        <div class="col-12 col-md-9"> <label><?php date_default_timezone_set('Asia/Jakarta');
                                                                echo date('H:i:s'); ?></label></div>

                    </div>
                    <div class="col-lg-12">
                        <div class="row form-group">
                            <table class="table table-flush">
                                <thead class="thead-light">
                                    <tr role="row">
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th>Harga Menu(Satuan)</th>
                                        <th>Jumlah Menu</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($menu as $m) {
                                        $no++;
                                        $harga_satuan = $m['sub_total'] / $m['jumlah'];
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $m['nama_makanan'] ?></td>
                                            <td>Rp. <?= number_format($harga_satuan, 0, ',', '.') ?></td>
                                            <td><?= $m['jumlah'] ?></td>
                                            <td>Rp. <?= number_format($m['sub_total'], 0, ',', '.') ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TOTAL</td>
                                        <td>Rp. <?= number_format($book->total_pembayaran, 0, ',', '.') ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>