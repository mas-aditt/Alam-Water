<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Edit Admin</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/admin_usr.css') ?>" />
</head>
<body>
    <div class="container">
        <div class="admin-usr">
            <!-- Sidebar -->
            <div class="container-18">
                <div class="logo">
                    <span class="alam-water">Alam Water</span>
                </div>
                <div class="sidebar">
                    <div class="menu">
                        <div class="menu-item">
                            <a href="<?= base_url('dashboard') ?>">
                                <span>Dashboard</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="<?= base_url('admin_trx') ?>">
                                <span>Transaksi</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="<?= base_url('admin_usr') ?>">
                                <span>Data User</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="<?= base_url('admin_adm') ?>">
                                <span>Data Admin</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="<?= base_url('admin_prdk') ?>">
                                <span>Product</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="<?= base_url('admin_message') ?>">
                                <span>Messages</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="<?= base_url('pending_users') ?>">
                                <span>Pending Users</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="<?= base_url('pending_admins') ?>">
                                <span>Pending Admins</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="container-14">
                <div class="top-header">
                    <div class="admin-info">
                        Admin : 
                        <?php if (session()->has('admin_session')): ?>
                            <?= session()->get('admin_session')['nama'] ?>
                        <?php else: ?>
                            <span>Tidak ada admin yang login</span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Form Edit Admin -->
                <h2 style="text-align: center">Edit Admin</h2>
                <form action="<?= base_url('admin_adm/updateAdmin/' . $admin['id_admin']) ?>" method="POST">
                    <?= csrf_field() ?>
                    <div>
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" value="<?= $admin['nama'] ?>" required>
                    </div>
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="<?= $admin['username'] ?>" required>
                    </div>
                    <button type="submit">Update</button>
                    <a href="<?= base_url('admin_adm') ?>">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
