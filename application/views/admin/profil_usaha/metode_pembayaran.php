<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Metode Pembayaran</li>
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
                    <h3 class="mb-0">Manajemen Metode Pembayaran</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <?php if ($this->session->flashdata('error')) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php
                    } ?>
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahmetodemodal"><i class="fa fa-plus"></i> Tambah Metode Pembayaran</button>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>No</th>
                                    <th>Merchant/Bank</th>
                                    <th>No HP/No Rekening</th>
                                    <th>Atas Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($metode_pembayaran as $m) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $m['nama_merchant'] ?></td>
                                        <td><?= $m['kode_pembayaran'] ?></td>
                                        <td><?= $m['atas_nama'] ?></td>
                                        <td>
                                            <button data-toggle="modal" data-target="#editmetodemodal" onclick="edit_metode(<?= $m['id_metode'] ?>)" class="btn btn-sm btn-warning">Edit</button>
                                            <a href="<?= base_url() ?>profilusaha/hapusmetodepembayaran/<?= $m['id_metode'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Metode Pembayaran <?= $m['nama_merchant'] ?>?');" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
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

<!-- Modal -->
<div class="modal fade" id="tambahmetodemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Metode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>profilusaha/tambahmetodepembayaran" method="POST">
                    <div class="form-group">
                        <label>Nama Merchant</label>
                        <input type="text" class="form-control" placeholder="Nama Bank/Merchant Payment(Dana, Ovo)" name="nama_merchant" required>
                        <label>No HP/No Rekening</label>
                        <input type="number" min="0" class="form-control" placeholder="0" name="kode_pembayaran" required>
                        <label>Pemilik Rekening/Merchant (Atas Nama)</label>
                        <input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editmetodemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Metode <span id="nama_merchant_title"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>profilusaha/editmetodepembayaran" method="POST">
                    <div class="form-group">
                        <input type="hidden" id="idmetode_edit" name="id_metode" required>
                        <label>Nama Merchant</label>
                        <input type="text" class="form-control" placeholder="Nama Bank/Merchant Payment(Dana, Ovo)" name="nama_merchant" id="nama_merchant" required>
                        <label>No HP/No Rekening</label>
                        <input type="number" min="0" class="form-control" placeholder="0" name="kode_pembayaran" id="kode_pembayaran" required>
                        <label>Pemilik Rekening/Merchant (Atas Nama)</label>
                        <input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama" id="atas_nama" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Metode Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function edit_metode(id) {
        $.ajax({
            type: 'POST',
            url: `<?= base_url() ?>profilusaha/get_metode_by_id/${id}`,
            dataType: 'json',
            success: (hasil) => {
                document.getElementById("idmetode_edit").value = hasil.id_metode;
                document.getElementById("nama_merchant").value = hasil.nama_merchant;
                document.getElementById("kode_pembayaran").value = hasil.kode_pembayaran;
                document.getElementById("atas_nama").value = hasil.atas_nama;
                $('#nama_merchant_title').html(hasil.nama_merchant)
            }
        });
    }
</script>