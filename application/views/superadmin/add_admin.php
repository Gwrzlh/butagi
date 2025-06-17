<!-- application/views/superadmin/add_admin.php -->
<div class="container mt-4">
    <h2>Add Admin</h2>
    <form action="<?= site_url('superadmin/add_admin'); ?>" method="post">
        <div class="form-group">
            <label for="username">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="room_id">Room</label>
            <select name="room_id" id="room_id" class="form-control" required>
                <?php foreach ($rooms as $room): ?>
                    <option value="<?= $room->id; ?>"><?= $room->room_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Admin</button>
    </form>
</div>
