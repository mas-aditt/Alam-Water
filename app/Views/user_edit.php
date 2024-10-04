<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="stylesheet" href="<?= base_url('style/user_edit.css') ?>" />
</head>
<body>
    <div class="edit-profile-card">
        <h1>Edit Profile</h1>
        <form action="<?= base_url('updateProfile'); ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>" />

            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?= $user['nama']; ?>" required />

            <label for="email">Email</label>
            <input type="email" name="email" value="<?= $user['email']; ?>" required />

            <label for="no_telp">No. Telp</label>
            <input type="tel" name="no_telp" value="<?= $user['no_telp']; ?>" required />

            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="<?= $user['alamat']; ?>" required />

            <button type="submit" class="btn-update">Update Profile</button>
            <a href="<?= base_url('userProfile'); ?>" class="btn-cancel">Batal</a>
        </form>
    </div>
</body>
</html>
