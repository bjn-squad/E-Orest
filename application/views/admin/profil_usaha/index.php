<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil Usaha</li>
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
                    <h3 class="mb-0">Profil Usaha Anda</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <?php foreach ($profil_usaha as $ps) {
                    ?>
                        <div class="card-body">
                            <h4><?= $ps['nama_usaha'] ?></h4><br>
                            <label class="font-weight-bold">Nama Usaha:</label> <?= $ps['nama_usaha'] ?><br>
                            <label class="font-weight-bold">Deskripsi Singkat Usaha :</label><br><?= $ps['deskripsi'] ?><br><br>
                            <label class="font-weight-bold">Alamat:</label> <?= $ps['alamat'] ?><br>
                            <label class="font-weight-bold">Nomor Telepon:</label> <?= $ps['nomor_telepon'] ?><br>
                            <label class="font-weight-bold">Email:</label> <?= $ps['email'] ?><br>
                            <label class="font-weight-bold">Instagram :</label> @<?= $ps['instagram'] ?><br>
                            <label class="font-weight-bold">Facebook :</label> <?= $ps['facebook'] ?><br>
                            <label class="font-weight-bold">Metode Pembayaran :</label><br>
                            <ol>
                                <?php foreach ($metode_pembayaran as $mp) {
                                ?>
                                    <li><?= $mp['nama_merchant'] ?> - <?= $mp['kode_pembayaran'] ?> (Atas Nama : <?= $mp['atas_nama'] ?> )</li>
                                <?php } ?>
                            </ol>
                            <label class="font-weight-bold">Maps :</label><br>
                            <?php
                            if ($ps['maps_link'] !== "") {
                            ?>
                                <iframe src="<?= $ps['maps_link'] ?> ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            <?php
                            } else {
                            ?>
                                <h3>Anda belum menambahkan maps</h3>
                            <?php
                            }
                            ?>
                            <br>
                            <label class="font-weight-bold">Gambar Slide Show Restoran pada Homepage:</label><br>
                            <div class="text-center">
                                <img class="m-3" src="<?= base_url() ?>assets/dataresto/foto_usaha/<?= $ps['foto_usaha_1'] ?>" width="50%">
                                <img class="m-3" src="<?= base_url() ?>assets/dataresto/foto_usaha/<?= $ps['foto_usaha_2'] ?>" width="50%">
                                <img class="m-3" src="<?= base_url() ?>assets/dataresto/foto_usaha/<?= $ps['foto_usaha_3'] ?>" width="50%">
                            </div>
                        <?php
                    } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>