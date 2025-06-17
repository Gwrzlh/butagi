<h2>Tambah Admin Ruangan</h2>
<form method="POST" action="<?= site_url('user/store'); ?>">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
    <div class="form-group">
        <label for="room_id">Ruangan:</label>
        <select class="form-control" id="room_id" name="room_id" required>
            <option value="">Pilih Ruangan</option>
            <?php foreach ($rooms as $room): ?>
                <option value="<?= $room->id; ?>"><?= $room->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
