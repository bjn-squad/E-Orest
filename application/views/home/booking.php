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
            <?php date_default_timezone_set('Asia/Jakarta'); ?>
            <input onchange="pilih_tanggal(this.value)" type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan" min="<?= date("Y-m-d"); ?>" max="<?= date('Y-m-d', strtotime('+21 day')) ?>">
          </div>
          <div class="form-group mb-2">
            <label>Pilih Meja Yang Ingin Direservasi</label>
            <small class="form-text" style="color: red;">*Wajib Dipilih</small>
            <select class="form-control" id="id_meja" name="id_meja" onchange="tambah_meja(this.value)">
            </select>
          </div>
          <br>
          <h4><i class="fa fa-utensils"></i> Buku Menu</h4>
          <p>Pilih menu dan isi jumlah pemesanan</p>
          <div class="form-group mb-2">
            <label>Pilih Menu Yang Ingin Dipesan</label>
            <small class="form-text" style="color: red;">*Wajib Dipilih</small>
            <select class="select2bs4 form-control" id="id_menu" name="id_menu">
            </select>
          </div>
          <div class="form-group mb-2">
            <label>Jumlah Pesanan</label>
            <small class="form-text" style="color: red;">*Wajib Diisi</small>
            <input type="number" min="1" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="Jumlah Pesanan">
            </select>
          </div>
          <br>
          <div class="text-center"><button class="btn btn-success" onclick="tambah_menu()" type="submit">Tambah Menu</button></div>
        </div>
        <div class="col-lg-6">
          <h3 id="judul_detail">Detail Pesanan
            <hr>
          </h3>
          <div class="row">
            <div class="col-lg-12">
              <form action="<?= base_url() ?>home/tambahPesanan" method="POST" onsubmit="return confirm('Apakah data dan pesanan anda sudah benar?');">
                <span id="daftar">
                  <div id="keterangan_nama_nomor_hp">

                  </div>
                  <div id="keterangan_tanggal_dipilih">

                  </div>
                  <div id="keterangan_meja_dipilih">

                  </div>
                  <div class="row">
                    <h4 id="judul_menu">
                      <hr>
                      Menu Yang Dipesan
                    </h4>
                    <div class="col-lg-6" id="daftar_menu_dipesan">

                    </div>
                    <div class="col-lg-6" id="daftar_harga_dipesan">

                    </div>
                    <div class="col-lg-12 mt-1" id="total_harga">
                    </div>
                  </div>
                </span>
                <button class="btn btn-primary mt-2" id="tombol_booking" type="submit">Booking Sekarang!</button>
              </form>
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
    document.getElementById("jumlah_pesanan").setAttribute("disabled", "disabled");
    document.getElementById("judul_menu").style.display = "none";
    document.getElementById("judul_detail").style.display = "none";
    document.getElementById("tombol_booking").style.display = "none";
    document.getElementById("daftar_harga_dipesan").style.display = "none";
    document.getElementById("daftar_menu_dipesan").style.display = "none";
  });

  function formatDate(input) {
    var datePart = input.match(/\d+/g),
      year = datePart[0].substring(0),
      month = datePart[1],
      day = datePart[2];

    return day + '/' + month + '/' + year;
  }

  function formatDate2(input) {
    var datePart = input.match(/\d+/g),
      year = datePart[0].substring(0),
      month = datePart[1],
      day = datePart[2];

    return year + '-' + month + '-' + day;
  }

  function getMenu() {
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

    if (document.getElementById('no_hp').value === "") {
      var nomorhp = "-";
    } else {
      var nomorhp = document.getElementById('no_hp').value;
    }

    let namakustomer = document.getElementById('nama').value;
    let res = namakustomer.toUpperCase();
    let res2 = res.replace(/[^\w\s]/gi, '');
    let final_nama = res2.replace(/\s/g, '');

    let isinyanamanope = `<b>Nama/Nomor HP</b> = ${document.getElementById('nama').value} | ${nomorhp}
    <input type="hidden" name="hidden_nama_clean" value="${final_nama}"> 
    <input type="hidden" name="hidden_nama_pemesan" value="${document.getElementById('nama').value}"> 
    <input type="hidden" name="hidden_nomor_hp" value="${document.getElementById('no_hp').value}">
    `;
    let isinyatanggal = `
    <b>Tanggal Reservasi</b> =  ${formatDate(tanggal)}
    <input type="hidden" name="hidden_tanggal_reservasi" value="${formatDate2(tanggal)}"> 
    `;
    $('#keterangan_nama_nomor_hp').html(isinyanamanope);
    $('#keterangan_tanggal_dipilih').html(isinyatanggal);
    document.getElementById("judul_detail").style.display = "";
    document.getElementById("id_menu").removeAttribute("disabled", "disabled");
    document.getElementById("jumlah_pesanan").removeAttribute("disabled", "disabled");
    getMenu();
  }


  function tambah_meja(datameja) {
    const myArr = datameja.split("|");
    let isinya = `
    <b>Meja Yang Dipilih</b> = Meja ${myArr[1]}
    <input type="hidden" name="hidden_id_meja" value="${myArr[0]}">
    `;
    $('#keterangan_meja_dipilih').html(isinya);
  }

  let num = 0;
  let menu_total = 0;
  let total_harga = 0;
  var daftarPesanan = `<b>Daftar Menu</b><hr>`;
  var daftarHargaPesanan = `<b>Harga Menu | Subtotal</b><hr>`;

  function setTotalHarga(total_harga_new) {
    total_harga = total_harga_new;
  }

  function getTotalHarga() {
    return total_harga;
  }

  function tambah_menu() {
    subtotal = 0;
    menu_total += 1;
    num = num + 1;
    let menu = $('#id_menu').val();
    let nama = $('#nama').val();
    let jumlah_pesanan = $('#jumlah_pesanan').val();
    if (nama == "") {
      alert("Nama Tidak Boleh Kosong!");
    } else if (menu !== "" && jumlah_pesanan !== "" && jumlah_pesanan > 0) {
      if (document.getElementById('no_hp').value === "") {
        var nomorhp = "-";
      } else {
        var nomorhp = document.getElementById('no_hp').value;
      }

      let namakustomer = document.getElementById('nama').value;
      let res = namakustomer.toUpperCase();
      let res2 = res.replace(/[^\w\s]/gi, '');
      let final_nama = res2.replace(/\s/g, '');

      let isinyanamanope = `<b>Nama/Nomor HP</b> = ${document.getElementById('nama').value} | ${nomorhp}
        <input type="hidden" name="hidden_nama_clean" value="${final_nama}"> 
        <input type="hidden" name="hidden_nama_pemesan" value="${document.getElementById('nama').value}"> 
        <input type="hidden" name="hidden_nomor_hp" value="${document.getElementById('no_hp').value}">
      `;
      $('#keterangan_nama_nomor_hp').html(isinyanamanope);

      // Unshow display menu dan tombol booking
      document.getElementById("judul_menu").style.display = "";
      if (menu_total < 1) {
        document.getElementById("tombol_booking").style.display = "none";
      } else {
        document.getElementById("tombol_booking").style.display = "";
      }
      document.getElementById("daftar_harga_dipesan").style.display = "";
      document.getElementById("daftar_menu_dipesan").style.display = "";

      const splitMenu = menu.split("|");
      total_harga += jumlah_pesanan * splitMenu[1];
      setTotalHarga(total_harga);
      let subtotal = jumlah_pesanan * splitMenu[1];

      let total_harga_teks = `
      <b>Total Harga : Rp. ${getTotalHarga()}<br>DP Yang Harus Dibayar : Rp. ${getTotalHarga() / 2}</b>
      <input type="hidden" name="hidden_total_harga" value="${getTotalHarga()}">
      `;

      $('#daftar_menu_dipesan').append(`
      <span class="idpesanan${num}">
        ${splitMenu[0]} - (Jumlah : ${jumlah_pesanan})<br>
        <input type="hidden" name="hidden_nama_makanan[]" value="${splitMenu[0]}">
        <input type="hidden" name="hidden_jumlah_makanan[]" value="${jumlah_pesanan}">
        <input type="hidden" name="hidden_subtotal_makanan[]" value="${subtotal}">
      </span>
      `);

      $('#daftar_harga_dipesan').append(`
      <span class="idpesanan${num}">
      Rp. ${splitMenu[1]}/satuan | Rp. ${subtotal}<span onclick="hapusMenu(${num},${subtotal})" style="cursor: pointer"> <i class="fa fa-times"></i> Hapus</span><br>
      </span>
      `);

      $('#total_harga').html(total_harga_teks);

      // Get menu dan kosongkan jumlah pesanan lagi.
      getMenu();
      document.getElementById('jumlah_pesanan').value = "";
    } else {
      alert("Maaf menu harus dipilih dan jumlah tidak boleh kurang dari 1 atau kosong.");
    }
  }

  function hapusMenu(num, sub_total) {
    menu_total -= 1;
    $(`.idpesanan${num}`).remove();

    if (menu_total < 1) {
      totalnya = getTotalHarga() - sub_total;

      setTotalHarga(totalnya);
      document.getElementById("tombol_booking").style.display = "none";
      $('#total_harga').html("");
      $('#daftar_menu_dipesan').html("");
      $('#daftar_harga_dipesan').html("");
    } else {
      totalnya = getTotalHarga() - sub_total;

      setTotalHarga(totalnya);

      let total_harga_teks = `
      <b>Total Harga : Rp. ${getTotalHarga()}<br>DP Yang Harus Dibayar : Rp. ${getTotalHarga() / 2}</b>
      <input type="hidden" name="hidden_total_harga" value="${getTotalHarga()}">`;
      $('#total_harga').html(total_harga_teks);
    }
  }
</script>