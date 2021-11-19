<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manajemen Meja</li>
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
                    <h3 class="mb-0">Manajemen Meja</h3>
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
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahmejamodal"><i class="fa fa-plus"></i> Tambah Meja</button>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>Nomor Meja</th>
                                    <th>Kapasitas (Orang)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($meja as $m) {
                                ?>
                                    <tr>
                                        <td><?= $m['nomor_meja'] ?></td>
                                        <td><?= $m['kapasitas_meja'] ?> Orang</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#editmejamodal" onclick="edit_meja(<?= $m['id_meja'] ?>)" class="btn btn-sm btn-warning">Edit</button>
                                            <a href="<?= base_url() ?>meja/hapus/<?= $m['id_meja'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Meja <?= $m['nomor_meja'] ?>?');" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                        </td>
                                    </tr>
                                <?php
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
<div class="modal fade" id="tambahmejamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Meja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>meja/tambah" method="POST">
                    <div class="form-group">
                        <label>Nomor Meja</label>
                        <input type="text" class="form-control" placeholder="1A" name="nomor_meja" required>
                        <label>Kapasitas (Orang)</label>
                        <input type="number" min="0" class="form-control" placeholder="0" name="kapasitas" required>
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
<div class="modal fade" id="editmejamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Meja <span id="nomor_meja_title"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>meja/edit" method="POST">
                    <div class="form-group">
                        <input type="hidden" id="idmeja_edit" name="id_meja" required>
                        <label>Kapasitas (Orang)</label>
                        <input type="number" min="0" id="kapasitas_edit" class="form-control" placeholder="0" name="kapasitas_meja" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Meja</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function edit_meja(id) {
        $.ajax({
            type: 'POST',
            url: `<?= base_url() ?>meja/get_meja_by_id/${id}`,
            dataType: 'json',
            success: (hasil) => {
                document.getElementById("idmeja_edit").value = hasil.id_meja;
                document.getElementById("kapasitas_edit").value = hasil.kapasitas_meja;
                $('#nomor_meja_title').html(hasil.nomor_meja)
            }
        });
    }
</script>