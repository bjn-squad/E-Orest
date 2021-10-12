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
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <strong class="card-title">Masukan pertanyaan keamanan</strong>
                </div>
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        <i class="fa fa-info-circle"></i> Pertanyaan keamanan berfungsi jika anda <b>lupa password</b>. Silahkan isi dan ingat ingat jawabannya.
                    </div>
                    <form action="<?= base_url() ?>lupapassword/prosesTambahPertanyaanKeamanan" method="POST">
                        <div class="form-group">
                            <label>Pertanyaan 1</label>
                            <select class="form-control" name="pertanyaankeamanan1">
                                <option selected disabled>Pilih Salah Satu Pertanyaan</option>
                                <option value="Siapa nama belakang ibu anda?">Siapa nama ibu anda?</option>
                                <option value="Apa hewan kesayangan anda?">Apa hewan kesayangan anda?</option>
                                <option value="Berapa angka favorit anda?(Contoh: 99)">Berapa angka favorit anda?(Contoh: 99)</option>
                                <option value="Darimana kota anda berasal?">Darimana kota anda berasal?</option>
                                <option value="Siapakah nama teman masa kecil anda?">Siapakah nama teman masa kecil anda?</option>
                                <option value="Kapan tanggal jadian anda dengan pasangan anda?">Kapan tanggal jadian anda dengan pasangan anda?</option>
                                <option value="Kota manakah yang anda ingin kunjungi?">Kota manakah yang anda ingin kunjungi?</option>
                            </select>
                            <label>Jawaban Pertanyaan 1</label>
                            <input type="text" name="jawabankeamanan1" class="form-control" placeholder="Masukan Jawaban" required>
                        </div><br>
                        <div class="form-group">
                            <label>Pertanyaan 2</label>
                            <select class="form-control" name="pertanyaankeamanan2">
                                <option selected disabled>Pilih Salah Satu Pertanyaan</option>
                                <option value="Apa hobi anda?">Apa hobi anda?</option>
                                <option value="Siapakah nama cinta pertama anda?">Siapakah nama cinta pertama anda?</option>
                                <option value="Siapakah guru terfavorit anda?">Siapakah guru terfavorit anda?</option>
                                <option value="Siapakah nama hewan peliharaan anda?">Siapakah nama hewan peliharaan anda?</option>
                                <option value="Kapan ulang tahun teman dekat anda?">Kapan ulang tahun teman dekat anda?</option>
                                <option value="Apa mata pelajaran di sekolah dasar yang anda sukai?">Apa mata pelajaran di sekolah dasar yang anda sukai?</option>
                                <option value="Apa cita-cita anda semasa kecil?">Apa cita-cita anda semasa kecil?</option>
                                <option value="Kapan ulang tahun pasangan anda??">Kapan ulang tahun pasangan anda?</option>
                            </select>
                            <label>Jawaban Pertanyaan 2</label>
                            <input type="text" name="jawabankeamanan2" class="form-control" placeholder="Masukan Jawaban" required>
                        </div>
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>