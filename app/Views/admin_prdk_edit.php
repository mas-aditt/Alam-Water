<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
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

            <!-- Edit Product Form -->
             <h2>Edit Data Product</h2>
            <div class="product-form">
                <form action="<?= site_url('admin_prdk_update' . $product['id_product']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    
                    <div class="form-group">
                        <label>Nama :</label>
                        <input type="text" name="nama_product" value="<?= esc($product['nama_product']) ?>" required />
                    </div>
                    
                    <div class="form-group">
                        <label>Harga :</label>
                        <input type="number" name="harga" value="<?= esc($product['harga']) ?>" required />
                    </div>
                    
                    <div class="form-group">
                        <label>Jumlah Stok :</label>
                        <input type="number" name="stok" value="<?= esc($product['stok']) ?>" required />
                    </div>
                    
                    <div class="form-group">
                        <label>Deskripsi :</label>
                        <textarea name="deskripsi" required><?= esc($product['deskripsi']) ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Foto / Gambar (Kosongkan jika tidak ingin mengganti):</label>
                        <input type="file" name="gambar" />
                        <?php if ($product['gambar']): ?>
                            <p>Gambar Saat Ini:</p>
                            <img src="<?= base_url('uploads/' . $product['gambar']) ?>" alt="Gambar Produk" width="100" />
                        <?php endif; ?>
                    </div>
                    
                    <div class="button-container">
                        <button class="submit-button" type="submit">Update Data</button>
                        <div class="cancel-button">
                            <a href="<?= base_url('admin_prdk') ?>">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
