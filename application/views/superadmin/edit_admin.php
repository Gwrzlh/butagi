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
                <h6 class="m-0 font-weight-bold text-dark">Edit Admin</h6>
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
            <form action="<?= site_url('superadmin/edit_admin/'.$admin->id); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $admin->username; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password (Leave empty to keep current)</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="room_id">Room</label>
                    <select name="room_id" id="room_id" class="form-control" required>
                        <?php foreach ($rooms as $room): ?>
                            <option value="<?= $room->id; ?>" <?= ($admin->room_id == $room->id) ? 'selected' : ''; ?>><?= $room->room_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning">Update Admin</button>
                <a href="<?= base_url('superadmin/manage_admins') ?>" class="btn btn-secondary">Kembali</a>
            </form>
            <!-- End Main Content -->
            </div>
        </div>
    </div>
  
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
