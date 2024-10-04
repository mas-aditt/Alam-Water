<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Saya</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/user_trx.css') ?>" />
</head>
<body>

<h2>Transaksi Saya</h2>

<?php if (empty($transaksi)): ?>
    <p>Anda belum melakukan transaksi.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Product</th>
                <th>Jumlah</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($transaksi as $trx): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $trx['nama_product'] ?></td>
                <td><?= $trx['jumlah'] ?></td>
                <td><?= date('d-m-Y', strtotime($trx['tgl_transaksi'])) ?></td>
                <td>Rp <?= number_format($trx['total_harga'], 0, ',', '.') ?></td>
                <td><?= $trx['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<a href="<?= base_url('/shop') ?>">Beli Produk</a>
<a href="<?= base_url('/AlamWater') ?>">Kembali</a>

</body>
</html>
