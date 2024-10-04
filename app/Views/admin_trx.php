<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Transaksi</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/admin_trx.css') ?>" />
</head>
<body>
    <div class="admin-trx">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <span class="alam-water">Alam Water</span>
            </div>

            <nav class="menu">
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
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header class="top-header">
            <div class="search-bar">
                <img src="../assets/vectors/search_normal_1_x2.svg" alt="search-icon" />
                <form action="<?= base_url('searchTrx') ?>" method="get">
                    <input type="text" name="query" placeholder="Cari Transaksi" />
                    <button type="submit" class="search-btn">Cari</button>
                </form>
            </div>
                <div class="admin-info">
                    Admin : 
                    <?php if (session()->has('admin_session')): ?>
                        <?= session()->get('admin_session')['nama'] ?>
                    <?php else: ?>
                        <span>Tidak ada admin yang login</span>
                    <?php endif; ?>
                </div>
            </header>

            <!-- Transaksi Section -->
            <section class="transaction-section">
                <h2>Transaksi Penjualan</h2>
                <h2>Daftar Transaksi</h2>
                <table class="transaction-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>ID User</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($item)): ?>
                        <tr>
                            <td colspan="8">Transaksi tidak ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($item)): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($item as $transaksi): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $transaksi['id_transaksi'] ?></td>
                            <td><?= $transaksi['id_user'] ?></td>
                            <td><?= $transaksi['nama_product'] ?></td>
                            <td><?= $transaksi['jumlah'] ?></td>
                            <td><?= $transaksi['total_harga'] ?></td>
                            <td><?= $transaksi['status'] ?></td>
                            <td>
                                <a href="<?= base_url('editTrx/' . $transaksi['id_transaksi']) ?>">
                                    <button class="edit-btn">Edit</button>
                                </a>
                                <a href="<?= base_url('deleteTrx/' . $transaksi['id_transaksi']) ?>" onclick="return confirm('anda yakin ingin menghapus transaksi ini?')">
                                    <button class="remove-btn">Hapus</button>  
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                            <td colspan="7">Tidak ada data Transaksi.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>
