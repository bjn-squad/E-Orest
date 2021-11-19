<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Penjualan</li>
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
                    <h3 class="mb-0">Laporan Penjualan</h3>
                </div>
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <form action="<?= base_url() ?>penjualan/filterLaporanPenjualan" method="POST">
                                    <label class=" form-control-label">Tanggal Awal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Start date" name="startDate" type="date" required>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Akhir</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="End date" name="endDate" type="date" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Filter</button>
                            </form>
                            <?php
                            if (!empty($startDate)) {
                            ?>
                                <form action="<?= base_url() ?>penjualan/filterCetakPenjualan" method="POST" target="_blank" style="display: inline-block;">
                                    <input type="hidden" name="startDate" value="<?= $startDate ?>">
                                    <input type="hidden" name="endDate" value="<?= $endDate ?>">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak Filter Data</button>
                                </form>
                            <?php
                            } else {
                            ?>

                                <a href="<?= base_url() ?>penjualan/cetakLaporanPenjualan" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak Semua Data</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>Kode Pembayaran</th>
                                    <th>Nama Pemesan</th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($booking as $mk) {
                                ?>
                                    <tr>
                                        <td><?= $mk['id_detail_menu'] ?></td>
                                        <td><?= $mk['nama_pemesan'] ?></td>
                                        <td><?= date("d-m-Y", strtotime($mk['tanggal_reservasi'])) ?></td>
                                        <td>Rp. <?= number_format($mk['total_pembayaran'], 0, ',', '.')  ?></td>
                                        <td><?= $mk['status_pembayaran'] ?></td>

                                        <td>
                                            <?php
                                            if ($mk['status_pembayaran'] == "Sudah Bayar DP") {
                                            ?>
                                                <a href="<?php base_url() ?>admin/pos/<?= $mk['id_detail_menu'] ?>" class="btn btn-sm btn-success"></i>Kasir</a>
                                            <?php
                                            }
                                            ?>
                                            <a href="<?php base_url() ?>penjualan/detail/<?= $mk['id_detail_menu'] ?>" class="btn btn-sm btn-warning"></i>Detail</a>
                                            <a href="<?php base_url() ?>penjualan/cetakNotaPenjualan/<?= $mk['id_detail_menu'] ?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-print"></i> Cetak Nota</a>
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
</div>