<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Tamu ke Ruangan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_guests; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tamu di Verifikasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $approved_guests; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tamu Menunggu Konfirmasi
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pending_guests; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Tamu di Tolak</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rejected_guests; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Tamu</h6>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Nomor HP</th>
                                <th>Instansi</th>
                                <th>Bertemu Dengan</th>
                                <th>Keperluan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                         foreach ($guests as $guest): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?php
                                $tanggal = date('d-m-Y', strtotime($guest->created_at));
                                echo $tanggal; ?></td>
                                <td><?= $guest->name; ?></td>
                                <td><?= $guest->phone; ?></td>
                                <td><?= $guest->institution; ?></td>
                                <td><?= $guest->admin_name; ?></td>
                                <td><?= $guest->purpose; ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal<?= $guest->id; ?>">Detail</button>
                                    <!-- <a href="<?= site_url('AdminController/approve/' . $guest->id); ?>" class="btn btn-success btn-sm">Approve</a>
                                    <a href="<?= site_url('AdminController/reject/' . $guest->id); ?>" class="btn btn-danger btn-sm">Reject</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- Button trigger modal -->
                </div>
            </div>
        </div>
    </div>

</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
 <!-- Modal Foto -->
<?php foreach ($guests as $guest) : ?>
    <!-- Detail Tamu -->
    <!-- Modal -->
<div class="modal fade" id="modal<?= $guest->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $guest->name ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <div class="row">
              <div class="col-lg-4">
                <img src="<?php echo base_url('assets/uploads/'. $guest->photo) ?>" width="100%" class="img img-thumbnail" alt="">
              </div>
              <div class="col-lg-8">
                <table class="table mt-2">
                  <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td>:</td>
                    <td><?= $guest->name ?></td>
                  </tr>
                  <tr>
                    <td><b>Nomor HP</b></td>
                    <td>:</td>
                    <td><?= $guest->phone ?></td>
                  </tr>
                  <tr>
                    <td><b>Asal Instansi/Perusahaan</b></td>
                    <td>:</td>
                    <td><?= $guest->institution ?></td>
                  </tr>
                  <tr>
                    <td><b>Bertemu dengan</b></td>
                    <td>:</td>
                    <td><?= $guest->admin_name ?></td>
                  </tr>
                  <tr>
                    <td><b>Keperluan</b></td>
                    <td>:</td>
                    <td><?= $guest->purpose ?></td>
                  </tr>
                  <tr>
                    <td><b>Tandatangan</b></td>
                    <td>:</td>
                    <td><img src="<?= base_url('assets/uploads/signatures/' .$guest->signature); ?>" width="250px" alt=""></td>
                  </tr>
                </table>
              </div>
            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>  
<?php endforeach; ?>