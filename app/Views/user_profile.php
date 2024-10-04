<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile User</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('style/user_profile.css') ?>" />
</head>
<body>
    <div class="profile-card">
        <i class="fas fa-user-circle profile-icon"></i>
        <h1>Profile Saya</h1>
        <div class="profile-section">
            <p><span>Nama:</span> <?= $user['nama']; ?></p>
            <p><span>Email:</span> <?= $user['email']; ?></p>
            <p><span>No. Telp:</span> <?= $user['no_telp']; ?></p>
            <p><span>Alamat:</span> <?= $user['alamat']; ?></p>
            <a href="<?= base_url('editProfile'); ?>" class="btn btn-edit-profile">Edit Profil</a>
            <a href="<?= base_url('changePasswordUser'); ?>" class="btn btn-change-password">Ganti Password</a>
            <a href="<?= base_url('AlamWater'); ?>" class="btn btn-cancel">Kembali</a>
        </div>
    </div>
</body>
</html>
