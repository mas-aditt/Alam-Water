<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pending User</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/pending_usr.css') ?>" />
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <span class="alam-water">Alam Water</span>
        </div>
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

    <div class="content">
        <h1>Daftar Akun Pending Users</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($pendingUsers)): ?>
                    <?php foreach ($pendingUsers as $index => $user): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $user['nama'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['status'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/approveUser/' . $user['id_user']) ?>">
                            <button class="btn-approve">Setujui</button>
                            </a>
                            <a href="<?= base_url('admin/rejectUser/' . $user['id_user']) ?>">
                            <button class="btn-reject">Tolak</button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Tidak ada data pending user.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
