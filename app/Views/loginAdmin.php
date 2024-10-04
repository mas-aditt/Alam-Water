<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/login_admin.css') ?>" />
</head>
<body>
    <div class="login-admin">
        <!-- Title -->
        <span class="judul">Login Admin AW</span>
        <form action="<?= site_url('doLoginAdmin') ?>" method="POST">
        <?= csrf_field() ?>
            <!-- Input for Username -->
            <div class="usn-input-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username Anda..." required>
            </div>
            <!-- Input for Password -->
            <div class="pw-input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password Anda..." required>
            </div>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <!-- Login Button -->
            <div class="login">
                <button type="submit">LOGIN <i class="fas fa-sign-in-alt"></i>
                </button>
            </div>
            <!-- Registration Prompt -->
            <p class="daftar-akun-admin-daftar-sekarang">
                Belum Punya Akun Admin? <a href="<?= site_url('registerAdmin') ?>">Daftar Sekarang</a>
                <br>
                <a href="<?= site_url('/AlamWater') ?>">Kembali ke awal</a>
            </p>
        </form>
    </div>
</body>
</html>
