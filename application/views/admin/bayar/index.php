<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
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
                    <h3 class="mb-0">Riwayat Pemesanan</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>Kode Pembayaran</th>
                                    <th>Nama Pemesan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Total Pembayaran</th>
                                    <th>Total Sudah Dibayar</th>
                                    <th>Status Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
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
                                        <td><?= $mk['tanggal_pesan'] ?></td>
                                        <td><?= $mk['tanggal_reservasi'] ?></td>
                                        <td><?= $mk['total_pembayaran'] ?></td>
                                        <td><?= $mk['total_sudah_dibayar'] ?></td>
                                        <td><?= $mk['status_pembayaran'] ?></td>
                                        <td>
                                            <?php
                                            if ($mk['bukti_pembayaran'] != 'Kosong') {
                                            ?>
                                                <a href="<?php base_url() ?>pembayaran/detail/<?= $mk['id_booking'] ?>" class="btn btn-sm btn-info btn-sm">Lihat Gambar</a>
                                                <!-- <button data-toggle="modal" data-target="#detailmodal" onclick="detail(<?= $mk['id_booking'] ?>)" class="btn btn-sm btn-warning">Detail</button> -->

                                            <?php
                                            } else {
                                            ?>
                                                Belum Dilampirkan
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($mk['status_pembayaran'] === "Belum Bayar DP") {
                                            ?>
                                                <a href="<?php base_url() ?>pembayaran/edit/<?= $mk['id_booking'] ?>" class="btn btn-sm btn-warning">Verifikasi</a>
                                                <!-- <button data-toggle="modal" data-target="#konfirmasimodal" onclick="konfirmasi(<?= $mk['id_booking'] ?>)" class="btn btn-sm btn-warning">Konfirmasi</button> -->
                                                <a href="<?php base_url() ?>pembayaran/delete/<?= $mk['id_booking'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus? Jika anda menghapus menu ini maka gambar menu ini ikut terhapus.')" class="btn btn-sm btn-danger"> Hapus</a>
                                            <?php
                                            } ?>
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

<!-- Edit Modal
<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Bukti Pembayaran<span id="nomor_booking_title"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <img id="buktipembayaran" name="buktipembayaran" src="<?php echo base_url('assets/dataresto/booking/' . $mk['bukti_pembayaran']) ?>" width="40%" />
            </div>
            
        </div>
    </div>
</div>

<script>
    function detail(id) {
        $.ajax({
            type: 'POST',
            url: `<?= base_url() ?>pembayaran/get_booking_by_id/${id}`,
            dataType: 'json',
            success: (hasil) => {
              
                $('#buktipembayaran').attr("src", response.buktipembayaran);
                $('#viewModal').modal("show");
            }
        });
    }
</script> -->