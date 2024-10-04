<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/sign_in.css') ?>" />
</head>
<body>
    <div class="sign-in">
        <span class="judul">Daftar AW</span>
        <form action="<?= site_url('doRegister') ?>" method="post">
        <?= csrf_field() ?>
            <!-- Form Input for Name -->
            <div class="nama-input-field">
                <label for="name">Nama</label>
                <input type="text" id="name" name="nama" placeholder="Masukkan Nama Anda..." required>
            </div>
            <!-- Form Input for Email -->
            <div class="email-input-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email Anda..." required>
            </div>
            <!-- Form Input for Phone -->
            <div class="telp-input-field">
                <label for="telp">No.Telp</label>
                <input type="number" id="telp" name="no_telp" placeholder="Masukkan No.Telp Anda..." required>
            </div>
            <!-- Form Input for Address -->
            <div class="alamat-input-field">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda..." required>
            </div>
            <!-- Form Input for Password -->
            <div class="pw-input-field">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" placeholder="Masukkan Password Anda..." required>
            </div>
            <!-- Submit Button -->
            <div class="sign-in-1">
                <button type="submit">DAFTAR <i class="fas fa-user-plus"></i></button>
            </div>
            <!-- Login Redirect -->
            <p class="sudah-punya-akun-login-sekarang">
                Sudah Punya Akun? <a href="<?= site_url('/login') ?>">Login Sekarang</a>
            </p>
        </form>
    </div>
</body>
</html>
