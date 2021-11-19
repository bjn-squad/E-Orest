<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kelola Pegawai</li>
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
                    <h3 class="mb-0">Kelola Pegawai</h3>
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
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahpegawaimodal"><i class="fa fa-plus"></i> Tambah Pegawai</button>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($meja as $m) {
                                ?>
                                    <tr>
                                        <td><?= $m['nama'] ?></td>
                                        <td><?= $m['email'] ?></td>
                                        <td><?= $m['telepon'] ?></td>
                                        <td><?= $m['jabatan'] ?></td>
                                        <td>
                                            <a href="<?php base_url() ?>detail_pegawai/<?= $m['id_pegawai'] ?>" class="btn btn-sm btn-info">Detail</a>
                                            <button data-toggle="modal" data-target="#editpasswordmodal" onclick="ubah_password_pegawai(<?= $m['id_pegawai'] ?>)" class="btn btn-sm btn-warning">Change Password</button>
                                            <?php
                                            if ($m['jabatan'] != "admin") {
                                            ?>
                                                <a href="<?= base_url() ?>admin/hapus_pegawai/<?= $m['id_pegawai'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pegawai <?= $m['nama'] ?>?');" class="btn btn-sm btn-danger">Hapus</a>
                                            <?php
                                            }
                                            ?>
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
<div class="modal fade" id="tambahpegawaimodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>admin/tambah_pegawai" method="POST">
                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" class="form-control" placeholder="Ahmad Surbakti" name="nama" required>
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="ahmadsurbakti@gmail.com" name="email" required>
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="minimum 5 karakter" name="password" required>
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" required>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Jl. Untung surapati, Ledok Kulon, Bojonegoro" name="alamat" required>
                        <label>Telepon</label>
                        <input type="text" class="form-control" placeholder="081258980012" name="telepon" required>
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
<div class="modal fade" id="editpasswordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password Pegawai <span id="nama_title"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>admin/change_password" method="POST">
                    <div class="form-group">
                        <input type="hidden" id="idpegawai_edit" name="id_pegawai" required>
                        <label>Masukkan Password Baru</label>
                        <input type="password" id="password_edit" class="form-control" placeholder="minimal 5 karakter" name="password" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function ubah_password_pegawai(id) {
        $.ajax({
            type: 'POST',
            url: `<?= base_url() ?>admin/get_pegawai_by_id/${id}`,
            dataType: 'json',
            success: (hasil) => {
                document.getElementById("idpegawai_edit").value = hasil.id_pegawai;
                $('#nama_title').html(hasil.nama)
            }
        });
    }
</script>