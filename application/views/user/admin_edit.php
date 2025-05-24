<h2>Edit Admin Ruangan</h2>
<form method="POST" action="<?= site_url('user/update/'.$admin->id); ?>">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $admin->username; ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status" required>
            <option value="active" <?= ($admin->status == 'active') ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?= ($admin->status == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
        </select>
    </div>
    <div class="form-group">
        <label for="room_id">Ruangan:</label>
        <select class="form-control" id="room_id" name="room_id" required>
            <?php foreach ($rooms as $room): ?>
                <option value="<?= $room->id; ?>" <?= ($admin->room_id == $room->id) ? 'selected' : ''; ?>><?= $room->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
