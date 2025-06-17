<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamu Hari Ini</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Tamu Hari Ini</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nama</th>
            <th>Nomor HP</th>
            <th>Instansi</th>
            <th>Keperluan</th>
            <th>Ruangan</th>
            <th>Foto</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($guests as $guest): ?>
            <tr>
                <td><?= $guest->name; ?></td>
                <td><?= $guest->phone; ?></td>
                <td><?= $guest->institution; ?></td>
                <td><?= $guest->purpose; ?></td>
                <td><?= $guest->room_name; ?></td>
                <td><img src="<?= base_url('assets/uploads/' . $guest->photo); ?>" alt="Foto" width="50"></td>
                <td><?= ucfirst($guest->status); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
