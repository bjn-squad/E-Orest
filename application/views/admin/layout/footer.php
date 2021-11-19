<!-- Footer -->
<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2021 Bojonegoro Squad
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/js-cookie/js.cookie.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->

<script src="<?= base_url() ?>assets/admin/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="<?= base_url() ?>assets/admin/js/argon.js?v=1.2.0"></script>
<script>
    $(document).ready(function() {
        $('#datatable-id').DataTable();
        $('#datatable-id2').DataTable();
        $('#datatable-id3').DataTable();
        $('#datatable-id4').DataTable();
    });
</script>
<script src="<?= base_url() ?>assets/home/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>
</body>

</html>