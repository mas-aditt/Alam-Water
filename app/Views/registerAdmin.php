<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In Admin</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/sign_in_admin.css') ?>" />
</head>
<body>
    <div class="sign-in-admin">
        <!-- Title -->
        <span class="judul">Daftar Admin AW</span>
        <form action="<?= site_url('doRegisterAdmin') ?>" method="post">
        <?= csrf_field() ?>
            <!-- Input for Name -->
            <div class="nama-input-field">
                <label for="name">Nama</label>
                <input type="text" id="name" name="nama" placeholder="Masukkan Nama Anda..." required>
            </div>
            <!-- Input for Username -->
            <div class="usn-input-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username Anda..." required>
            </div>
            <!-- Input for Password -->
            <div class="pw-input-field">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" placeholder="Masukkan Password Anda..." required>
            </div>
            <!-- Submit Button -->
            <div class="sign-in">
                <button type="submit">DAFTAR <i class="fas fa-user-plus"></i>
                </button>
            </div>
            <!-- Login Redirect -->
            <p class="sudah-punya-akun-login-sekarang">
                Sudah Punya Akun? <a href="<?= site_url('loginAdmin') ?>">Login Sekarang</a>
            </p>
        </form>
    </div>
</body>
</html>
