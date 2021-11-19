<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">POS (Point of Sale)</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Pembelian</h6>
    </div>
    <div class="card-body">
        <b style="color: red;"><?= validation_errors(); ?></b>
        <div class="form-group">
            <?php foreach ($pemesan as $b) { ?>
                <label style="font-weight: bold;">Nama Pemesan : </label>
                <label id="date"><?= $b['nama_pemesan'] ?></label><br>
                <label style="font-weight: bold;">Tanggal Pesan : </label>
                <label id="date"><?= $b['tanggal_pesan'] ?></label><br>
                <label style="font-weight: bold;">Tanggal Reservasi : </label>
                <label id="date"><?= $b['tanggal_reservasi'] ?></label><br>
                <label style="font-weight: bold;">Nama Makanan & Minuman</label>
            <?php } ?>
            <select class="js-example-basic-single form-control" id="id_menu" name="id_menu" required>
                <option value="Pilih Barang">Pilih Menu</option>
                <?php foreach ($menu as $s) {
                ?>
                    <option value="<?= $s['id_menu'] ?>"><?= $s['nama_menu'] ?></option>
                <?php              } ?>
            </select>
            <label style="font-weight: bold;">Jumlah Menu</label>
            <input type="number" min="0" id="jumlah_beli" name="jumlah_beli" class="form-control mb-2" placeholder="0" required>
        </div>
        <a href="<?= base_url() ?>transaksi" class="btn btn-sm btn-info shadow-sm mb-3"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        <button class="btn btn-sm btn-primary shadow-sm mb-3" onclick="tambahBarang()"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang</button>
        <!-- Tabel Total Transaksi -->
        <div class="table-responsive">
            <form method="POST" id="transaksi_form">
                <table class="table table-striped table-bordered" id="table_pembelian">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_transaksi">
                        <?php
                        $no = 1;
                        foreach ($book as $mk) {
                        ?>
                            <tr>
                                <td><?= $mk['nama_makanan'] ?></td>
                                <td><?= $mk['jumlah'] ?></td>
                                <td><?= $mk['harga'] ?></td>
                                <td><?= $mk['sub_total'] ?></td>
                                <td>
                                    <?php if ($mk['status_order'] !== "success") { ?>
                                        <a href="<?php base_url() ?>makanan/edit/<?= $mk['id_menu'] ?>" class="btn btn-sm btn-warning"> Edit</a>
                                        <a href="<?php base_url() ?>makanan/delete/<?= $mk['id_menu'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus menu <?= $mk['nama_menu'] ?>? Jika anda menghapus menu ini maka gambar menu ini ikut terhapus.')" class="btn btn-sm btn-danger"> Hapus</a>
                                    <?php } else {
                                        echo "Anda tidak bisa mengubah pesanan ini!";
                                    } ?>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                    <!-- btn submit disini dan total tagihan disini -->
                </table>
                <input type="hidden" name="total_harga_form" id="total_harga_form" value="">
                <button class="btn btn-sm btn-success shadow-sm mb-3 float-right" type="submit"><i class="fas fa-download fa-sm text-white-50"></i>Bayar & Cetak Transaksi</button>
            </form>
            <span class="float-left" style="font-weight: bold;font-size: 30px">
                Total Harga : Rp. <span id="total_harga">0</span>
            </span>
        </div>
    </div>
</div>