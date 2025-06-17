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
                <h6 class="m-0 font-weight-bold text-dark">Tambah Ruangan</h6>
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
            <!-- Main Content -->
                <form action="<?= site_url('Superadmin/add_room'); ?>" method="POST">
                    <div class="form-group">
                        <label for="room_name">Nama Ruangan:</label>
                        <input type="text" class="form-control" id="room_name" name="room_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Ruangan</button>
                </form>
            <!-- End Main Content -->
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Dashboard Superadmin</h6>
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
            <!-- Main Content -->
                <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped mt-4" id="dataTable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($rooms as $room): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $room->room_name; ?></td>
                            <td>
                            <a href="<?= site_url('superadmin/edit_room/'.$room->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('Superadmin/delete_room/' . $room->id); ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            <!-- End Main Content -->
            </div>
        </div>
    </div>
  
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->