<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/login.css') ?>" />
</head>
<body>
    <form action="<?= site_url('doLogin') ?>" method="post">
    <?= csrf_field() ?>
        <div class="login">
            <span class="judul">Login AW</span>
            <div class="frame-16">
                <!-- Input for Email -->
            <div class="email-input-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email Anda..." required>
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
                <div class="login-1">
                    <button type="submit">LOGIN <i class="fas fa-sign-in-alt"></i></button>
                </div>
                <p class="belum-punya-akun-daftar-sekarang">
                    Belum Punya Akun? <a href="<?= site_url('/register') ?>">Daftar Sekarang</a>
                    <br>
                    <a href="<?= site_url('/AlamWater') ?>">Kembali ke awal</a>
                </p>
            </div>
        </div>
    </form>
</body>
</html>
