        <!-- Sing in  Form -->
        <section class="sign-in" style="background-color: #6DABE4;">
            <div class="container">
                <div class="signin-content">
                    <img src="<?= base_url() ?>assets/auth/images/signup-image.jpg">
                    <div class="signin-form">
                        <h2 class="form-title">Lupa Password</h2>
                        <form action="<?= base_url() ?>lupapassword/cekJawaban" method="POST">
                            <?= $this->session->flashdata('message'); ?><br>
                            <?php foreach ($loadPertanyaan as $load) {
                            ?>
                                <input type="hidden" name="id_pegawai" value="<?= $load['id_pegawai'] ?>">
                                <div class="form-group">
                                    <strong><label class="font-weight-bold">1. <?= $load['pertanyaankeamanan1'] ?></label></strong> <br><br><br>
                                    <input type="text" name="jawabankeamanan1" class="form-control" placeholder="Masukkan Jawaban" autofocus required>
                                </div>
                                <div class="form-group">
                                    <strong><label class="font-weight-bold">2. <?= $load['pertanyaankeamanan2'] ?></strong></label><br><br><br>
                                    <input type="text" name="jawabankeamanan2" class="form-control" placeholder="Masukkan Jawaban" required>
                                </div>

                            <?php
                            } ?>
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Cek Jawaban" />
                        </form>
                    </div>
                </div>
            </div>
        </section>