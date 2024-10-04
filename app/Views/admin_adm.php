<?php if (!session()->has('admin_session')): ?>
    <?php return redirect()->to(base_url('loginAdmin'))->with('error', 'Anda harus login terlebih dahulu.'); ?>
<?php endif; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Data Admin</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/admin_usr.css') ?>" />
  </head>
  <body>
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
            <div class="search-bar">
                    <img src="../assets/vectors/search_normal_1_x2.svg" alt="search-icon" />
                    <form action="<?= base_url('searchAdmin') ?>" method="get">
                        <input type="text" name="query" placeholder="Cari Admin.." value="<?= isset($query) ? $query : '' ?>" />
                        <button type="submit" class="cari-btn">Cari</button>
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
        </div>

        <!-- Admin Table -->
        <h1>Data Admin</h1>
        <div class="table">
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>ID Admin</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($admins)): ?>
                <?php foreach ($admins as $index => $admin): ?>
                  <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $admin['id_admin'] ?></td>
                    <td><?= $admin['nama'] ?></td>
                    <td><?= $admin['username'] ?></td>
                    <td><?= $admin['status'] ?></td>
                    <td>
                      <a href="<?= base_url('admin_adm/editAdmin/' . $admin['id_admin']) ?>">
                          <button class="edit-btn">Edit</button>
                      </a>
                      <a href="<?= base_url('admin_adm/deleteAdmin/' . $admin['id_admin']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus admin ini?');">
                          <button class="remove-btn">Hapus</button>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6">Tidak ada data Admin.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
