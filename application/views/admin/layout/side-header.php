<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-ungroup"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                            <div class="row shortcuts px-4">
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                        <i class="ni ni-calendar-grid-58"></i>
                                    </span>
                                    <small>Calendar</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                        <i class="ni ni-email-83"></i>
                                    </span>
                                    <small>Email</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                        <i class="ni ni-credit-card"></i>
                                    </span>
                                    <small>Payments</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                        <i class="ni ni-books"></i>
                                    </span>
                                    <small>Reports</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                        <i class="ni ni-pin-3"></i>
                                    </span>
                                    <small>Maps</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                        <i class="ni ni-basket"></i>
                                    </span>
                                    <small>Shop</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="<?= base_url() ?>/assets/admin/img/theme/ava.png">
                                </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"><?= $this->session->userdata('nama') ?></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome <?= $this->session->userdata('nama') ?></h6>
                            </div>
                            <a href="<?= base_url() ?>admin/myProfile" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            <a href="<?= base_url() ?>admin/editMyProfile" class="dropdown-item">
                                <i class="ni ni-circle-08"></i>
                                <span>Profil Settings</span>
                            </a>
                            <a href="<?= base_url() ?>admin/ubahPassword" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>Ubah Password</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url() ?>auth/logout" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>