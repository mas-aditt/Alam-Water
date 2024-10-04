<?php if (!session()->has('admin_session')): ?>
    <?php return redirect()->to(base_url('loginAdmin'))->with('error', 'Anda harus login terlebih dahulu.'); ?>
<?php endif; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/admin_db.css') ?>" />
  </head>
  <body>
    <div class="admin-db">
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
      
      <div class="main-content">
        <div class="top-header">
          <div class="admin-info">
            <i class="fas fa-user-circle profile-icon" onclick="window.location.href='<?= base_url('adminProfile'); ?>'"></i>
            Admin : 
            <?php if (session()->has('admin_session')): ?>
              <?= session()->get('admin_session')['nama'] ?>
            <?php else: ?>
              <span>Tidak ada admin yang login</span>
            <?php endif; ?>
          </div>
          <div class="admin-info">
            <a href="<?= base_url('logoutAdmin') ?>" style="text-decoration: none;" >
              Log Out
              <i class="fas fa-arrow-right-from-bracket"></i>
            </a>
          </div>
        </div>
        
        <div class="dashboard">
          <div class="card">
            <a href="<?= base_url('admin_trx') ?>">
              <i class="fas fa-shopping-cart"></i>
              <span>Data Transaksi</span>
            </a>
          </div>
          <div class="card">
            <a href="<?= base_url('admin_usr') ?>">
              <i class="fas fa-users"></i>
              <span>Data User</span>
            </a>
          </div>
          <div class="card">
            <a href="<?= base_url('admin_prdk') ?>">
              <i class="fas fa-box"></i>
              <span>Data Product</span>
            </a>
          </div>
          <div class="card">
            <a href="<?= base_url('admin_message') ?>">
              <i class="fas fa-comments"></i>
              <span>Messages</span>
            </a>
          </div>
          <div class="card">
            <a href="<?= base_url('pending_users') ?>">
              <i class="fas fa-user-clock"></i>
              <span>Pending Users</span>
            </a>
          </div>
          <div class="card">
            <a href="<?= base_url('pending_admins') ?>">
              <i class="fas fa-user-shield"></i>
              <span>Pending Admins</span>
            </a>
          </div>
        </div>
        <div class="dashboard-image">
          <img src="../assets/images/logo-aw.png" alt="Dashboard Image">
          <img src="../assets/images/logo-aw.png" alt="Dashboard Image">
          <img src="../assets/images/logo-aw.png" alt="Dashboard Image">
        </div>
      </div>
    </div>
  </body>
</html>
