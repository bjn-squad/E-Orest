<p align="center">
    LAPORAN PENJUALAN
</p>
<table>
    <tr>
    <th>Kode Pembayaran</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal Pesan</th>
                                <th>Tanggal Reservasi</th>
                                <th>Total Pembayaran</th>
                                <th>Status Pembayaran</th>
    </tr>
    <?php
    foreach ($booking as $mk) {
    ?>
        <tr>
        <td><?= $mk['id_detail_menu'] ?></td>
                                    <td><?= $mk['nama_pemesan'] ?></td>
                                    <td><?= date("d-m-Y", strtotime($mk['tanggal_pesan'])) ?></td>
                                    <td><?= date("d-m-Y", strtotime($mk['tanggal_reservasi'])) ?></td>
                                    <td>Rp. <?= number_format($mk['total_pembayaran'], 0, ',', '.') ?></td>
                                    <td><?= $mk['status_pembayaran'] ?></td>

        </tr>
    <?php } ?>
</table>