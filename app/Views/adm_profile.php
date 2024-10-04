<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('style/adm_profile.css') ?>">
</head>
<body>
    <div class="profile-container">
    <i class="fas fa-user-circle profile-icon"></i>
        <h1>Admin Profile</h1>
        <div class="profile-info">
            <p><span>Name:</span> <?= $admin['nama'] ?></p>
            <p><span>Username:</span> <?= $admin['username'] ?></p>
            <p><span>Status:</span> <?= $admin['status'] ?></p>
        </div>
        <div class="profile-actions">
            <a href="<?= base_url('editProfileAdmin') ?>" class="btn">Edit Profile</a>
            <a href="<?= base_url('changePasswordAdmin') ?>" class="btn">Ganti Password</a>
            <a href="<?= base_url('dashboard') ?>" class="btn back-btn">Kembali</a>
        </div>
    </div>
</body>
</html>
