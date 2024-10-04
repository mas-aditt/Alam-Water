<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $table      = 'transaksis';
    protected $primaryKey = 'id_transaksi';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_user', 'id_product', 'jumlah', 'tgl_transaksi', 'total_harga', 'status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Mendapatkan transaksi beserta produk
    public function getTransaksiWithProduct($id_user)
    {
        return $this->select('transaksis.*, products.nama_product')
                    ->join('products', 'transaksis.id_product = products.id_product')
                    ->where('id_user', $id_user)
                    ->findAll();
    }

    //trx user
    public function getUserTransactionsWithProduct($id_user)
    {
        return $this->select('transaksis.*, products.nama_product')
                    ->join('products', 'transaksis.id_product = products.id_product')
                    ->where('transaksis.id_user', $id_user)
                    ->findAll();
    }
}
