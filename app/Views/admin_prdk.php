<?php if (!session()->has('admin_session')): ?>
    <?php return redirect()->to(base_url('loginAdmin'))->with('error', 'Anda harus login terlebih dahulu.'); ?>
<?php endif; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Product</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/admin_prdk.css') ?>" />
  </head>
  <body>
    <div class="admin-prdk">
      <!-- Sidebar -->
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

      <!-- Main Content -->
      <div class="main-content">
        <!-- Header -->
        <div class="header">
        <div class="admin-info">
            Admin : 
            <?php if (session()->has('admin_session')): ?>
              <?= session()->get('admin_session')['nama'] ?>
            <?php else: ?>
              <span>Tidak ada admin yang login</span>
            <?php endif; ?>
          </div>
        </div>
        <div class="tambah-data-product">
          <a href="<?= site_url('admin_prdk_sv') ?>">Tambah Data Product</a>
        </div>
        <!-- Product Table -->
        <div class="product-table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($product['nama_product']) ?></td>
                                <td><?= number_format($product['harga'], 0, ',', '.') ?></td>
                                <td><?= esc($product['stok']) ?></td>
                                <td><?= esc($product['deskripsi']) ?></td>
                                <td><img src="<?= base_url('uploads/' . $product['gambar']) ?>" alt="Gambar Produk" width="100"></td>
                                <td>
                                    <a href="<?= base_url('admin_prdk_edit' . $product['id_product']) ?>" class="edit-btn">Edit</a>
                                    <a href="<?= base_url('admin_prdk_delete' . $product['id_product']) ?>" class="remove-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
      </div>
    </div>
  </body>
</html>
