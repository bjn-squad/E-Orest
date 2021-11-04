<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota <?= $book->id_detail_menu ?></title>
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
                            <h1 class="invoice-id"><?= $book->id_detail_menu ?></h1>
                            <div class="date">Tanggal Transaksi: <?= date("d-m-Y", strtotime($book->tanggal_reservasi))  ?></div>
                            <div class="date">Jam Transaksi: <?php date_default_timezone_set('Asia/Jakarta');
                                                                echo date('H:i:s'); ?></div>
                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-left">Menu</th>
                                <th class="text-right">Harga Menu(Satuan)</th>
                                <th class="text-right">Jumlah Menu</th>
                                <th class="text-right">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($menu as $m) {
                                $no++;
                                $harga_satuan = $m['sub_total'] / $m['jumlah'];
                            ?>
                                <tr>
                                    <td class="no"><?= $no ?></td>
                                    <td class="text-left">
                                        <h3><?= $m['nama_makanan'] ?></h3>
                                    </td>
                                    <td class="unit">Rp. <?= number_format($harga_satuan, 0, ',', '.') ?></td>
                                    <td class="qty"><?= $m['jumlah'] ?></td>
                                    <td class="total">Rp. <?= number_format($m['sub_total'], 0, ',', '.') ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">TOTAL</td>
                                <td>Rp. <?= number_format($book->total_pembayaran, 0, ',', '.') ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="notices">
                        <div>Terimakasih telah singgah di restoran kami.</div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(() => {
        window.print();
        window.onunload = refreshParent;

        function refreshParent() {
            window.opener.location.reload();
        }
        window.addEventListener('afterprint', (event) => {
            window.close();
        });
    });
</script>

</html>