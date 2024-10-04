<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Transaksi</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="stylesheet" href="<?= base_url('style/edit_trx.css') ?>" />
  </head>
  <body>
    <div class="admin-trx">
      <div class="main-content">

        <!-- Edit Transaksi Section -->
        <section class="transaction-section">
          <h2>Edit Transaksi</h2>
          <form action="<?= base_url('updateTrx') ?>" method="post">
          <?= csrf_field() ?>
            <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>" />
            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" value="<?= $transaksi['jumlah'] ?>" required readonly />
            <label for="total_harga">Total Harga:</label>
            <input type="number" id="total_harga" name="total_harga" value="<?= $transaksi['total_harga'] ?>" required readonly />
            <label for="status">Status:</label>
            <select id="status" name="status" required>
              <option value="Pending" <?= $transaksi['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
              <option value="Success" <?= $transaksi['status'] == 'Success' ? 'selected' : '' ?>>Success</option>
              <option value="Cancelled" <?= $transaksi['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
            </select>
            <br>
            <button type="submit">Update</button>
            <br>
            <button type="button" class="cancel" onclick="window.location.href='<?= base_url('admin_trx') ?>'">Cancel</button>
          </form>
        </section>
      </div>
    </div>
  </body>
</html>
