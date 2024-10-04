<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Admin</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="stylesheet" href="<?= base_url('style/adm_edit.css') ?>">
</head>
<body>
    <div class="edit-profile-container">
        <h1>Edit Admin Profile</h1>
        <form action="<?= base_url('updateProfileAdmin') ?>" method="post">
            <input type="hidden" name="id_admin" value="<?= $admin['id_admin'] ?>">

            <label>Name:</label>
            <input type="text" name="nama" value="<?= $admin['nama'] ?>" required>

            <label>Username:</label>
            <input type="text" name="username" value="<?= $admin['username'] ?>" required>

            <button type="submit" class="btn">Update Profile</button>
        </form>
        <button class="back-btn" onclick="window.location.href='<?= base_url('adminProfile') ?>'">Kembali</button>
    </div>
</body>
</html>
