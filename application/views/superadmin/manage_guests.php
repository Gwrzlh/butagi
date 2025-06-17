<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Daftar Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Daftar Tamu Hari Ini</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor HP</th>
                <th>Asal Instansi</th>
                <th>Keperluan</th>
                <th>Tujuan Ruangan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($guests as $t): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $t->name; ?></td>
                <td><?php echo $t->phone; ?></td>
                <td><?php echo $t->institution; ?></td>
                <td><?php echo $t->purpose; ?></td>
                <td><?php echo $t->room_name; ?></td>
                <td><img src="<?php echo base_url('assets/uploads/'. $t->photo); ?>" width="50" height="50"></td>
                <td>
                    <!-- Aksi approve atau reject tamu -->
                    <a href="#" class="btn btn-success">Approve</a>
                    <a href="#" class="btn btn-danger">Reject</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($guests)): ?>
    <div class="alert alert-warning">
        No guests found in the system.
    </div>
<?php endif; ?>

        </tbody>
    </table>
</div>

</body>
</html>
