<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password User</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('style/ubahpw_user.css') ?>" />
</head>
<body>
    <div class="profile-card">
        <h1>Ganti Password</h1>
        <form action="<?= base_url('updatePasswordUser') ?>" method="post">
            <?= csrf_field() ?>
            <label for="current_password">Password Saat Ini:</label>
            <input type="text" id="current_password" name="current_password" required>

            <label for="new_password">Password Baru:</label>
            <input type="text" id="new_password" name="new_password" required>

            <label for="confirm_new_password">Konfirmasi Password Baru:</label>
            <input type="text" id="confirm_new_password" name="confirm_new_password" required>

            <button type="submit" class="btn-update">Update Password</button>
        </form>
        <a href="<?= base_url('userProfile') ?>" class="btn-cancel">Batal</a>
    </div>
</body>
</html>
