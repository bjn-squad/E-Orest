        <!-- Sing in  Form -->
        <section class="sign-in" style="background-color: #6DABE4;">
            <div class="container">
                <div class="signin-content">
                    <img src="<?= base_url() ?>assets/auth/images/signup-image.jpg">
                    <div class="signin-form">
                        <h2 class="form-title">Change Password</h2>
                        <form action="<?= base_url() ?>lupapassword/prosesUbahPassword" method="POST">
                            <div class="form-group">
                                <center><label style="font-weight: bold;">Ganti Password Anda</label></center>
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                            <div class="form-group">
                                <?php foreach ($id as $id) {
                                ?>
                                    <strong><label>Password Baru (Email : <?= $id['email'] ?>)</label></strong><br><br><br>
                                    <input type="hidden" name="id_pegawai" value="<?= $id['id_pegawai'] ?>" required>
                                <?php }
                                ?>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Change Password" />
                        </form>
                    </div>
                </div>
            </div>
        </section>