<?php

namespace App\Models;

use CodeIgniter\Model;

class Pesan extends Model
{
    protected $table      = 'pesans';
    protected $primaryKey = 'id_pesan';
    
    protected $allowedFields = ['nama', 'email', 'phone', 'message'];

    // Optional: jika kamu menggunakan timestamps otomatis
    protected $useTimestamps = true;
}
