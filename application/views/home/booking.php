<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Reservasi Meja & Booking Menu</h2>
        <ol>
          <li><a href="<?= base_url() ?>">Home</a></li>
          <li>Reservasi Meja & Booking Menu</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Contact Us Section ======= -->
  <section id="contact-us" class="contact-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h3>Formulir Reservasi Meja & Booking Menu</h3>
          <p>Isi data dengan lengkap dan benar</p>
          <div class="form-group mb-2">
            <label>Nama Panggilan/Lengkap</label>
            <small class="form-text" style="color: red;">*Wajib Diisi</small>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
          </div>
          <div class="form-group mb-2">
            <label>Nomor HP</label>
            <small class="form-text" style="color: red;">*Tidak Wajib Diisi</small>
            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP">
          </div>
          <div class="form-group mb-2">
            <label>Tanggal Pemesanan</label>
            <small class="form-text" style="color: red;">*Wajib Diisi</small>
            <input onchange="pilih_tanggal(this.value)" type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan" min="<?php echo date("Y-m-d"); ?>">
          </div>
          <div class="form-group mb-2">
            <label>Pilih Meja Yang Ingin Direservasi</label>
            <small class="form-text" style="color: red;">*Wajib Dipilih</small>
            <select class="form-control" id="id_meja" name="id_meja" onchange="tambah_meja(this.value)">
            </select>
          </div>
          <div class="form-group mb-2">
            <label>Pilih Menu Yang Ingin Dipesan</label>
            <small class="form-text" style="color: red;">*Wajib Dipilih</small>
            <select class="select2bs4 form-control" id="id_menu" name="id_menu" onchange="pilih_menu(this.value)">
            </select>
          </div>
          <div class="form-group mb-2">
            <label>Jumlah Pesanan</label>
            <small class="form-text" style="color: red;">*Wajib Diisi</small>
            <input type="number" min="1" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="Jumlah Pesanan">
            </select>
          </div>
          <br>
          <div class="text-center"><button class="btn btn-success" type="submit">Tambah Menu</button></div>
        </div>
        <div class="col-lg-6">
          <h3>Detail Pesanan</h3>
          <div class="row">
            <div class="col-lg-6">
              <span id="daftar">
                <div id="keterangan_nama_nomor_hp">

                </div>
                <div id="keterangan_tanggal_dipilih">

                </div>
                <div id="keterangan_meja_dipilih">

                </div>
              </span>
            </div>
            <div class="col-lg-6">
              <span id="keterangan">
                <div id="">

                </div>
              </span>
            </div>
          </div>
        </div>
      </div>
  </section><!-- End Contact Us Section -->

</main><!-- End #main -->

<script>
  $(document).ready(function() {
    document.getElementById("id_meja").setAttribute("disabled", "disabled");
    document.getElementById("id_menu").setAttribute("disabled", "disabled");
  });

  function formatDate(input) {
    var datePart = input.match(/\d+/g),
      year = datePart[0].substring(0),
      month = datePart[1],
      day = datePart[2];

    return day + '/' + month + '/' + year;
  }

  function pilih_tanggal(tanggal) {
    document.getElementById("id_meja").removeAttribute("disabled", "disabled");
    $.ajax({
      type: 'GET',
      url: `<?= base_url() ?>home/getMejaKosong/${tanggal}`,
      dataType: 'json',
      success: (hasil) => {
        let isi = `<option disabled selected value="">Pilih Meja Yang Ingin Direservasi</option>`;
        hasil.forEach(function(item) {
          isi +=
            `<option value="${item.id_meja}|${item.nomor_meja}">Meja ${item.nomor_meja} (Kapasitas: ${item.kapasitas_meja})</option>`
        });
        $('#id_meja').html(isi);
      }
    });

    let isinyatanggal = `Tanggal Reservasi =  ${formatDate(tanggal)}`;
    $('#keterangan_tanggal_dipilih').html(isinyatanggal);

    let isinyanama = ``;
    let isinyanope = ``;

    document.getElementById("id_menu").removeAttribute("disabled", "disabled");
    $.ajax({
      type: 'GET',
      url: `<?= base_url() ?>home/getMenu/`,
      dataType: 'json',
      success: (hasil) => {
        let isi = `<option disabled selected value="">Pilih Menu</option>`;
        hasil.forEach(function(item) {
          isi +=
            `<option value="${item.nama_menu}|${item.harga}">${item.nama_menu} - Rp. ${item.harga}</option>`
        });
        $('#id_menu').html(isi);
      }
    });
  }

  function tambah_meja(datameja) {
    const myArr = datameja.split("|");
    let isinya = `Meja Yang Dipilih = Meja ${myArr[1]}`;
    $('#keterangan_meja_dipilih').html(isinya);
  }

  function pilih_menu(id_menu) {
    console.log(id_menu);
  }
</script>