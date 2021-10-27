<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Pemasukan Bulan Ini</h5>
                <span class="h2 font-weight-bold mb-0">Rp. <?= number_format($total_pendapatan_bulan_ini->total_pendapatan_bulan_ini, 0, ',', '.') ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                  <i class="fas fa-money-bill"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">

            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Pemasukan Hari Ini</h5>
                <span class="h2 font-weight-bold mb-0">Rp. <?= number_format($total_pendapatan->total_pendapatan, 0, ',', '.')  ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                  <i class="fas fa-money-bill"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">

            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Transaksi Hari Ini</h5>
                <span class="h2 font-weight-bold mb-0"><?= $total_transaksi->total_transaksi ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                  <i class="fas fa-handshake"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">

            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Transaksi Bulan Ini</h5>
                <span class="h2 font-weight-bold mb-0"><?= $total_transaksi_bulan_ini->total_transaksi_bulan_ini ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                  <i class="fas fa-handshake"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- Page content -->
<div class="container-fluid mt-2">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <div id="chart-area" style="width:100%; height:400px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Highcharts.chart('chart-area', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Pendapatan Bulanan '
      },
      subtitle: {
        text: 'Tahun <?= date('Y') ?>'
      },
      xAxis: {
        categories: [
          'Jan',
          'Feb',
          'Mar',
          'Apr',
          'May',
          'Jun',
          'Jul',
          'Aug',
          'Sep',
          'Oct',
          'Nov',
          'Dec'
        ],
        crosshair: true
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Pendapatan Bulanan'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>Rp. {point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      colors: ['#1CC88A'],
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
        name: 'Pendapatan',
        data: [<?= $month['januari']->total_harga ?>, <?= $month['februari']->total_harga ?>, <?= $month['maret']->total_harga ?>, <?= $month['april']->total_harga ?>, <?= $month['mei']->total_harga ?>, <?= $month['juni']->total_harga ?>, <?= $month['juli']->total_harga ?>, <?= $month['agustus']->total_harga ?>, <?= $month['september']->total_harga ?>, <?= $month['oktober']->total_harga ?>, <?= $month['november']->total_harga ?>, <?= $month['desember']->total_harga ?>]
      }]
    });
  });
</script>