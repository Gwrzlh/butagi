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
                <h6 class="m-0 font-weight-bold text-dark">Edit Ruangan</h6>
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
                <form action="<?= site_url('superadmin/edit_room/'.$room->id); ?>" method="POST">
                    <div class="form-group">
                        <label for="room_name">Nama Ruangan:</label>
                        <input type="hidden" name="id" value="<?= $room->id; ?>"> 
                        <input type="text" class="form-control" id="room_name" name="room_name" value="<?= $room->room_name; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
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