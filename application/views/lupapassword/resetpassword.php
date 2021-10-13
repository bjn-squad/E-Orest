        <!-- Sing in  Form -->
        <section class="sign-in" style="background-color: #6DABE4;">
            <div class="container">
                <div class="signin-content">
                    <img src="<?= base_url() ?>assets/auth/images/signup-image.jpg">
                    <div class="signin-form">
                        <h2 class="form-title">Lupa Password</h2>
                        <form action="<?= base_url() ?>lupapassword/reset" method="POST" class="register-form" id="login-form">
                            <?= $this->session->flashdata('message'); ?><br>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Masukkan Email" autofocus required />
                            </div>
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Selanjutnya" />
                            <a href="<?= base_url() ?>auth/loginPegawai" class="btn btn-warning">Kembali <i class="fa fa-undo"></i></a>
                            <div class="register-link m-t-15 text-center">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>