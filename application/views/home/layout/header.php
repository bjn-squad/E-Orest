<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $nama_usaha ?></title>

  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Favicons -->
  <link href="<?= base_url() ?><?= base_url() ?>assets/home/home/img/favicon.png" rel="icon">
  <link href="<?= base_url() ?><?= base_url() ?>assets/home/home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="<?= base_url() ?>assets/admin/vendor/jquery/dist/jquery.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/home/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url() ?>assets/home/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/home/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="<?= base_url() ?>"><?= $nama_usaha ?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="<?= base_url() ?>assets/home/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="<?= base_url() ?>">Home</a></li>
          <li><a href="<?= base_url() ?>katalog">Katalog Menu</a></li>
          <li><a href="<?= base_url() ?>home/booking">Booking Sekarang</a></li>
          <li><a href="<?= base_url() ?>pembayaran/cari">Cek Pembayaran</a></li>
          <li><a href="<?= base_url() ?>saran/add">Kritik & Saran</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 2</a></li>
            </ul>
          </li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->