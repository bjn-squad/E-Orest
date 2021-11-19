<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">SPK SAW</li>
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
                    <h3 class="mb-0">Sistem Pendukung Keputusan SAW</h3>
                </div>
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
                        <div class="col-lg-10">
                            <h5>Tabel Kriteria</h5>
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Penjelasan Kriteria</th>
                                        <th scope="col">Bobot Kriteria</th>
                                        <th scope="col">Kategori Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var bobot = [];
                                        var kategori_bobot = [];
                                        var nama_pegawai = [];
                                    </script>
                                    <?php
                                    $no = 1;
                                    foreach ($kriteria as $k) {
                                    ?>
                                        <script>
                                            bobot.push(<?= $k['bobot_kriteria'] ?>);
                                            kategori_bobot.push('<?= $k['kategori_bobot'] ?>');
                                        </script>
                                        <tr>
                                            <td><?= $k['nama_kriteria'] ?> - C<?= $no ?></td>
                                            <td><?= $k['penjelasan_kriteria'] ?></td>
                                            <td><?= $k['bobot_kriteria'] ?></td>
                                            <td><?= $k['kategori_bobot'] ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <?php
                            if (!empty($kriteria) && $pegawai > 1) {
                            ?>
                                <h3>Tabel Pengisian Data</h3>
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pegawai</th>
                                            <?php for ($i = 1; $i <= count($kriteria); $i++) {
                                            ?>
                                                <th>C<?= $i ?></th>
                                            <?php
                                            } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pegawai as $p) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <script>
                                                    nama_pegawai.push('<?= $p['nama_pegawai'] ?>');
                                                </script>
                                                <td><?= $p['nama_pegawai'] ?></td>
                                                <?php for ($i = 1; $i <= count($kriteria); $i++) {
                                                ?>
                                                    <th>
                                                        <input type="number" min="0" required id="P<?= $no ?>C<?= $i ?>">
                                                    </th>
                                                <?php
                                                } ?>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <input type="submit" value="Hitung Data" id="hitung_data" class="btn btn-info" onclick="return hitungData();" />
                        </div>
                        <div class="col-lg-12" id="tabel_normalisasi">

                        </div>

                        <div class="col-lg-12" id="tabel_faktor_ternormalisasi">

                        </div>
                        <div class="col-lg-12 m-5" id="finishing_div">

                        </div>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = '<?php echo base_url() ?>';
</script>
<script>
    function hitungData() {

        var element = document.getElementById("hitung_data"); // notice the change
        element.parentNode.removeChild(element);

        let jumlahPegawai = <?= count($pegawai) ?>;
        let jumlahKriteria = <?= count($kriteria) ?>;

        //set bobot
        var noBobot = 1;
        for (let i = 0; i < bobot.length; i++) {
            window['B' + noBobot] = bobot[i];
            noBobot++;
        }
        // print bobot
        for (let i = 1; i <= bobot.length; i++) {
            console.log(window['B' + i]);
        }

        // get value inputan
        var noUrut = 1;
        for (let i = 1; i <= jumlahPegawai; i++) {
            for (let j = 1; j <= jumlahKriteria; j++) {
                window['P' + noUrut + 'C' + j] = document.getElementById('P' + noUrut + 'C' + j).value;
            }
            noUrut++;
        }

        noUrut -= noUrut;

        console.log(kategori_bobot);

        var noUntukKategori = 0;
        window['minmaxcategory'] = [];
        // find max min depends on benefit
        for (let i = 1; i <= jumlahKriteria; i++) {
            window['category' + i] = [];
            for (let j = 1; j <= jumlahPegawai; j++) {
                window['category' + i].push(window['P' + j + 'C' + i]);
            }
            if (kategori_bobot[noUntukKategori] == "Benefit") {
                console.log(window['category' + i])
                window['minmaxcategory'].push(Math.max.apply(Math, window['category' + i]));
            } else if (kategori_bobot[noUntukKategori] == "Cost") {
                console.log(window['category' + i])
                window['minmaxcategory'].push(Math.min.apply(Math, window['category' + i]));
            }
            noUntukKategori++;
        }

        noUntukKategori -= noUntukKategori;

        console.log(minmaxcategory);

        // normalisasi
        var urutanMinMax = 0;
        for (let j = 1; j <= jumlahKriteria; j++) {
            for (let i = 1; i <= jumlahPegawai; i++) {
                // console.log(kategori_bobot[noUntukKategori]);
                if (kategori_bobot[j - 1] == "Benefit") {
                    window['NP' + i + 'NC' + j] = window['P' + i + 'C' + j] / minmaxcategory[urutanMinMax];
                } else if (kategori_bobot[j - 1] == "Cost") {
                    window['NP' + i + 'NC' + j] = minmaxcategory[urutanMinMax] / window['P' + i + 'C' + j];
                }
            }
            urutanMinMax++;
        }

        // Add hasil normalisasi to array
        var noUrut = 1;
        for (let i = 1; i <= jumlahPegawai; i++) {
            window['dataNormalisasiPerPegawai' + i] = [];
            for (let j = 1; j <= jumlahKriteria; j++) {
                window['dataNormalisasiPerPegawai' + i].push(window['NP' + noUrut + 'NC' + j]);
            }
            noUrut++;
        }
        noUrut -= noUrut;


        var html = `<br><h3>Tabel Normalisasi</h3><table class="table table-bordered">`;
        for (let i = 1; i <= jumlahPegawai; i++) {
            html += `<tr>`;
            html += `<td>C${i}</td>`;
            for (let j = 0; j < window['dataNormalisasiPerPegawai' + i].length; j++) {
                html += `<td>`;
                html += window['dataNormalisasiPerPegawai' + i][j];
                html += `</td>`;
            }
            html += `</tr>`;
        }
        html += `</table>`;
        document.getElementById("tabel_normalisasi").innerHTML = html;

        var html = ``;

        // final penghitungan tabel ternormalisasi
        var backToZero = 0;
        var hasilKali = [];
        var finalData = [];
        var hitungTabelFaktor;
        for (let i = 1; i <= jumlahPegawai; i++) {
            for (let j = 1; j <= jumlahKriteria; j++) {
                // console.log(window['dataNormalisasiPerPegawai' + i][backToZero] + '*' + window['B' + j]);
                hitungTabelFaktor = window['dataNormalisasiPerPegawai' + i][backToZero] * window['B' + j];
                // console.log(window['dataNormalisasiPerPegawai' + i]);
                hasilKali.push(hitungTabelFaktor);
                // console.log("Hasilnya : " + hitungTabelFaktor);
                hitungTabelFaktor = 0;
                backToZero++;
            }
            var sum = hasilKali.reduce(function(a, b) {
                return a + b;
            }, 0);

            // console.log(hitungTabelFaktor);
            finalData.push(sum);
            hasilKali = [];
            backToZero -= backToZero;
        }

        var terpilih = Math.max.apply(Math, finalData);
        var pegawaiTerpilih;
        var html = `<br><h3>Tabel Faktor Ternormalisasi & Hasil Pegawai Terpilih</h3><table class="table table-bordered">`;
        for (let i = 0; i < finalData.length; i++) {
            html += `<tr>
            <td>${nama_pegawai[i]}</td>
            `;
            if (finalData[i] == terpilih) {
                data = finalData[i] + ' <span style="color:red">(Pegawai Terpilih)</span>';
                pegawaiTerpilih = nama_pegawai[i];
            } else {
                data = finalData[i];
            }
            html += `<td>${data}</td>
            </tr>`
        }
        console.log(pegawaiTerpilih);
        $.ajax({
            url: "<?= base_url() ?>saw/simpan_hasil",
            type: "POST",
            data: {
                pegawai_terpilih: pegawaiTerpilih
            },
            cache: false,
            success: function(dataResult) {
                console.log("Sukses Kirim");
            }
        });
        html += `</table>`;
        isifinishing = `
        <a href="${base_url}saw" class="btn btn-primary">Back to SAW Dashboard</a>
        `;
        document.getElementById("tabel_faktor_ternormalisasi").innerHTML = html;
        document.getElementById("finishing_div").innerHTML = isifinishing;
    }
</script>