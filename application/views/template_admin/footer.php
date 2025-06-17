<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Develop &copy; by SIM - SMKN 1 Subang 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin untuk Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Silakan klik Logout untuk keluar dan mengakhiri Sesi Login.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('login/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sbadmin2/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/sbadmin2/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sbadmin2/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/sbadmin2/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/sbadmin2/'); ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/sbadmin2/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/sbadmin2/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/sbadmin2/'); ?>js/demo/datatables-demo.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/sbadmin2/'); ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/sbadmin2/'); ?>js/demo/chart-pie-demo.js"></script>

    <!-- Sweetalert -->
    <script>
        <?php if ($this->session->flashdata('success')) : ?>
            Swal.fire({
                title: 'Berhasil',
                icon: 'success',
                text: '<?= $this->session->flashdata('success'); ?>',
            });
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= $this->session->flashdata('error'); ?>',
            });
        <?php endif; ?>

        <?php if ($this->session->flashdata('add_room_success')) : ?>
            Swal.fire({
                title: 'Berhasil',
                icon: 'success',
                text: '<?= $this->session->flashdata('add_room_success'); ?>',
            });
        <?php endif; ?>
    </script>
</body>

</html>