<h2>Daftar Admin Ruangan</h2>

<!-- Tambah Admin Button -->
<a href="<?= site_url('user/create'); ?>" class="btn btn-primary mb-3">Tambah Admin Ruangan</a>

<!-- Tabel Daftar Admin -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Status</th>
            <th>Ruangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($admins as $admin): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $admin->username; ?></td>
                <td><?= ucfirst($admin->status); ?></td>
                <td>
                    <?php
                        // Tampilkan nama ruangan berdasarkan room_id
                        $room = $this->db->get_where('rooms', ['id' => $admin->room_id])->row();
                        echo ($room) ? $room->name : 'Tidak ada ruangan';
                    ?>
                </td>
                <td>
                    <!-- Tombol Edit dan Hapus -->
                    <a href="<?= site_url('user/edit/'.$admin->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= site_url('user/delete/'.$admin->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?');">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
