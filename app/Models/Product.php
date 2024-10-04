<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id_product';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nama_product', 'deskripsi', 'harga', 'stok', 'gambar'];

    // Untuk timestamp created_at dan updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
