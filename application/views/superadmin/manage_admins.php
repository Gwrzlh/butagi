<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row">

    <!-- Area Chart -->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Atur Penanggung Jawab Ruangan</h6>
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
            <form class="form-group" method="POST" action="<?php echo site_url('superadmin/assign_admin_to_room'); ?>">
                <label for="admin_id">Pilih Admin:</label>
                <select class="form-control form-select" name="admin_id">
                    <?php foreach ($admins as $admin): ?>
                        <option value="<?php echo $admin->id; ?>"><?php echo $admin->name; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="room_id">Pilih Ruangan:</label>
                <select class="form-control form-select" name="room_id">
                    <?php foreach ($rooms as $room): ?>
                        <option value="<?php echo $room->id; ?>"><?php echo $room->room_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-success mt-2" type="submit">Tugaskan Admin</button>
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
                <h6 class="m-0 font-weight-bold text-dark">Kelola Admin Ruangan</h6>
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
                <a href="<?= site_url('superadmin/add_admin'); ?>" class="btn btn-primary mb-3">Tambah Admin</a>
                <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Room</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admins as $index => $admin): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $admin->name; ?></td>
                            <td><?= $admin->username; ?></td>
                            <td><?= $admin->room_name; ?></td>
                            <td>
                                <a href="<?= site_url('superadmin/edit_admin/'.$admin->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('superadmin/delete_admin/'.$admin->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admin?')">Delete</a>
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