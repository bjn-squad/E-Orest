<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>assets/admin/css/invoice.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div id="invoice">
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col company-details">
                            <h2 class="name">
                                <?= $nama_usaha ?>
                            </h2>
                            <div><?= $alamat ?></div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-details">
                            <div class="date" style="text-align:center">
                                <h3>Laporan Penjualan </h3>
                            </div>

                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-left">Invoice</th>
                                <th class="text-right">Nama Pemesan</th>
                                <th class="text-right">Tanggal Reservasi</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $total = 0;
                            foreach ($booking as $mk) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="no">
                                        <h6><?= $no ?></h6>
                                    </td>
                                    <td class="text-left"><?= $mk['id_detail_menu'] ?></td>
                                    <td class="unit"><?= $mk['nama_pemesan'] ?></td>
                                    <td class="qty"><?= date("d-m-Y", strtotime($mk['tanggal_reservasi'])) ?></td>
                                    <td class="total">Rp. <?= number_format($mk['total_pembayaran'], 0, ',', '.') ?></td>
                                    <?php
                                    $total_sementara = (int)$mk['total_pembayaran'];
                                    $total += $total_sementara;
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                    <h3>Total Pendapatan : Rp. <?= number_format($total, 0, ',', '.') ?></h3>
                </main>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(() => {
        window.print();

        window.onafterprint = (event) => {
            console.log('After print');
            window.open(`<?= base_url() ?>admin`);
        };
    });
</script>

</html>