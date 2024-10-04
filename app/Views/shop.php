<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy AW</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/shop.css') ?>" />
</head>
<body>
<h2>Beli Product</h2>
<form action="storeP" method="post">
<?= csrf_field() ?>
<input type="hidden" name="id_user" value="<?= session()->get('user_session')['id_user'] ?>"> <!-- ID User dari session user_session -->
    <label for="id_product">Pilih Product:</label>
    <select name="id_product" id="id_product">
        <option selected></option>
        <?php foreach ($products as $product): ?>
            <option value="<?= $product['id_product'] ?>" data-harga="<?= $product['harga'] ?>"><?= $product['nama_product'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="jumlah">Jumlah:</label>
    <input type="number" name="jumlah" id="jumlah" value="1">
    <label for="total_harga">Total Harga:</label>
    <input type="text" name="total_harga" id="total_harga" readonly>
    <button type="submit">Beli</button>
    <a href="<?= base_url('AlamWater') ?>" class="cancel-button">Cancel</a>
</form>
<script>
// Script untuk menghitung total harga berdasarkan produk yang dipilih dan jumlahnya
document.querySelector('#id_product').addEventListener('change', function() {
    let harga = this.options[this.selectedIndex].getAttribute('data-harga');
    document.querySelector('#total_harga').value = harga * document.querySelector('#jumlah').value;
});

document.querySelector('#jumlah').addEventListener('input', function() {
    let harga = document.querySelector('#id_product').options[document.querySelector('#id_product').selectedIndex].getAttribute('data-harga');
    document.querySelector('#total_harga').value = harga * this.value;
});
</script>
</body>
</html>