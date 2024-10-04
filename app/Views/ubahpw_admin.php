<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password Admin</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="stylesheet" href="<?= base_url('style/ubahpw_adm.css') ?>">
</head>
<body>
    <div class="change-password-container">
        <h1>Ganti Password</h1>
        <form action="<?= base_url('updatePasswordAdmin') ?>" method="post">
            <?= csrf_field() ?>
            <label>Password Saat Ini:</label>
            <input type="text" name="current_password" required>

            <label>Password Baru:</label>
            <input type="text" name="new_password" required>

            <label>Konfirmasi Password Baru:</label>
            <input type="text" name="confirm_new_password" required>

            <button type="submit" class="btn">Update Password</button>
        </form>
        <button class="back-btn" onclick="window.location.href='<?= base_url('adminProfile') ?>'">Batal</button>
    </div>
</body>
</html>
