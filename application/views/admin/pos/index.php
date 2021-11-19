<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Point of Sale</li>
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
                    <h3 class="mb-0">Point of Sale (POS)</h3>
                </div>
                <div class="row m-2">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <?php if ($this->session->flashdata('error')) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php
                        } ?>
                        <div class="row">
                            <?php foreach ($pemesan as $b) { ?>
                                <div class="col-lg-6">
                                    <label style="font-weight: bold;">Nama Pemesan : </label>
                                    <label id="date"><?= $b['nama_pemesan'] ?></label><br>
                                    <label style="font-weight: bold;">Tanggal Pesan : </label>
                                    <label id="date"><?= $b['tanggal_pesan'] ?></label><br>
                                    <label style="font-weight: bold;">Tanggal Reservasi : </label>
                                    <label id="date"><?= $b['tanggal_reservasi'] ?></label><br>
                                </div>
                                <div class="col-lg-6">
                                    <label style="font-weight: bold;">Total Pembayaran : </label>
                                    <label id="date">Rp. <?= number_format($b['total_pembayaran'], 0, ',', '.') ?></label><br>
                                    <label style="font-weight: bold;">Total Sudah Dibayar : </label>
                                    <label id="date">Rp. <?= number_format($b['total_sudah_dibayar'], 0, ',', '.') ?></label><br>
                                    <label style="font-weight: bold;">Total Belum Dibayar : </label>
                                    <label id="date">Rp. <?= number_format($b['total_pembayaran'] - $b['total_sudah_dibayar'], 0, ',', '.') ?></label><br>
                                </div>
                            <?php
                                $invoicenya = $b['id_detail_menu'];
                                $total_bayar_old = $b['total_pembayaran'];
                                $total_belum_bayar = $b['total_pembayaran'] - $b['total_sudah_dibayar'];
                            } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label style="font-weight: bold;">Nama Makanan & Minuman</label>
                        <select class="select2bs4 form-control" id="id_menu" name="id_menu" required>
                            <option value="" disabled selected>Pilih Menu</option>
                            <?php foreach ($menu as $s) {
                            ?>
                                <option value="<?= $s['nama_menu'] . "|" . $s['harga'] ?>">
                                    <?= $s['nama_menu'] ?> - Rp. <?= number_format($s['harga'], 0, ',', '.')  ?>
                                </option>
                            <?php              } ?>
                        </select>
                        <label style="font-weight: bold;">Jumlah Menu</label>
                        <input type="number" min="0" id="jumlah_beli" name="jumlah_beli" class="form-control mb-2" placeholder="0" required>
                    </div>
                </div>
                <div class="col-lg-5">
                    <a href="<?= base_url() ?>penjualan" class="btn btn btn-info shadow-sm mb-3"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
                    <button class="btn btn btn-primary shadow-sm mb-3" onclick="tambahMenu()"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Menu</button>
                </div>
                <!-- Tabel Total Transaksi -->
                <div class="col lg-12">
                    <div class="table-responsive">
                        <form method="POST" id="transaksi_form">
                            <table class="table table-striped table-bordered" id="tabel_pos">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nama Menu</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel_transaksi" style="font-weight: bold;">
                                    <?php
                                    foreach ($book as $mk) {
                                    ?>
                                        <tr>
                                            <td><?= $mk['nama_makanan'] ?></td>
                                            <td><?= $mk['jumlah'] ?></td>
                                            <td>Rp. <?= number_format($mk['harga'], 0, ',', '.')  ?></td>
                                            <td>Rp. <?= number_format($mk['sub_total'], 0, ',', '.')  ?></td>
                                            <td>
                                                Pesanan dari booking tidak dapat diubah
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <!-- btn submit disini dan total tagihan disini -->
                            </table>
                            <input type="hidden" name="total_harga_form" id="total_harga_form" value="">
                            <h1 style="font-weight: bold">
                                Total Harga : Rp.
                                <?php ?>
                                <span id="total_harga_teks">
                                    <?= number_format($total_belum_bayar, 0, ',', '.') ?>
                                </span>
                                <script>
                                    var total_harga_default = '<?= $total_belum_bayar ?>';
                                </script>
                                <input type="hidden" id="invoice" name="invoice" value="<?= $invoicenya ?>">
                                <input type="hidden" id="total_harga_input" name="total_harga_input" value="<?= $total_belum_bayar ?>">
                                <input type="hidden" id="total_harga_baru" name="total_harga_baru" value="<?= $total_bayar_old ?>">
                            </h1>
                            <button class="btn btn-sm btn-success shadow-sm mb-3 float-right" type="submit"><i class="fas fa-download fa-sm text-white-50"></i>Bayar & Cetak Transaksi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#transaksi_form').on('submit', function(event) {
            let invoicenya = $('#invoice').val();
            event.preventDefault();
            let form_data = $(this).serialize();
            console.log(form_data);
            $.ajax({
                url: "<?= base_url() ?>admin/tambahTransaksiPadaPOS",
                method: "POST",
                data: form_data,
                success: function(data) {
                    console.log(data);
                    const printConfirmation = confirm("Transaksi Sukses.\nApakah anda ingin mencetak data?");
                    printConfirmation
                    if (printConfirmation) {
                        window.open(`<?= base_url() ?>admin/cetakInvoice/${invoicenya}`);
                    } else {
                        window.open(`<?= base_url() ?>penjualan`)
                    }
                }
            })
        });
    });
</script>
<script>
    let total_harga = parseInt(total_harga_default);
    var num = 0;
    var total_harga_update = parseInt(document.getElementById(`total_harga_baru`).value);

    function setTotalHarga(total_harga_new) {
        total_harga = total_harga_new;
    }

    function getTotalHarga() {
        return total_harga;
    }

    function setTotalHargaUpdate(total_harga_update_new) {
        total_harga_update = total_harga_update_new;
    }

    function getTotalHargaUpdate() {
        return total_harga_update;
    }

    function toRupiah(uangnya) {
        parseInt(uangnya);
        var number_string = uangnya.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah;
    }

    function tambahMenu() {
        num = num + 1;
        let menu = $('#id_menu').val();
        let jumlah_beli = $('#jumlah_beli').val();
        let total_belum_bayar = $('#total_harga_input').val();
        if (menu === "" || jumlah_beli === "" || jumlah_beli <= 0) {
            alert("Menu dan jumlah beli tidak boleh kosong");
        } else {
            const splitMenu = menu.split("|");
            total_harga += jumlah_beli * splitMenu[1];
            setTotalHarga(total_harga);
            let subtotal = jumlah_beli * splitMenu[1];
            let updateTotalHarga = subtotal + getTotalHargaUpdate();
            setTotalHargaUpdate(updateTotalHarga);
            console.log(getTotalHargaUpdate());
            $('#tabel_pos').find('tbody').append(`
            <tr class="idpesanan${num}">
                    <td>${splitMenu[0]}</td>
                    <td>${jumlah_beli}</td>
                    <td>Rp. ${toRupiah(splitMenu[1])}</td>
                    <td>Rp. ${toRupiah(subtotal)}</td>
                    <td>
                        <button onclick="hapusMenu('idpesanan${num}',${subtotal})" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                <input type="hidden" class="nama_makanan" name="hidden_nama_makanan[]" value="${splitMenu[0]}">
                <input type="hidden" name="hidden_jumlah_makanan[]" value="${jumlah_beli}">
                <input type="hidden" name="hidden_subtotal_makanan[]" value="${subtotal}">
            </tr>
            `);

            $('#total_harga_baru').val(getTotalHargaUpdate());
            $('#total_harga_input').val(getTotalHarga());
            $('#total_harga_teks').html(toRupiah(getTotalHarga()));
            $('#jumlah_beli').val("");
            $('#id_menu').val("");
        }
    }

    function hapusMenu(id, subtotal) {
        $(`.${id}`).remove();
        totalnya = getTotalHarga() - subtotal;
        setTotalHarga(totalnya);
        let updateTotalHarga = getTotalHargaUpdate() - subtotal;
        setTotalHargaUpdate(updateTotalHarga);
        $('#total_harga_baru').val(getTotalHargaUpdate());
        $('#total_harga_input').val(getTotalHarga());
        $('#total_harga_teks').html(toRupiah(getTotalHarga()));
    }
</script>