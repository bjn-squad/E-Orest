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
                    <h3 class="mb-0">Point of Sale</h3>
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
                    <div class="form-group mb-2">
                        <label>Menu & Harga</label>
                        <select class="select2bs4 form-control" id="id_menu" name="id_menu">

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>