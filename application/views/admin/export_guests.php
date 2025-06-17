<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row">

    <!-- Area Chart -->
    <!-- Area Chart -->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Rekap Tamu</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">         
            <form class="form-group" method="POST" action="<?= base_url('AdminController/export_guests_pdf') ?>">
                <label for="room_id">Pilih Ruangan:</label>
                <select class="form-control form-select" name="room_id" id="room_id">
                    <option value="">Semua Ruangan</option>
                    <?php foreach ($rooms as $room): ?>
                        <option value="<?= $room['id'] ?>"><?= $room['room_name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="row mt-2">
                    <div class="col-lg-6">
                        <label for="start_date">Tanggal Awal:</label>
                        <input class="form-control" type="date" name="start_date" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="end_date">Tanggal Akhir:</label>
                        <input class="form-control" type="date" name="end_date" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning mt-2">Preview</button>
            </form>

            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->