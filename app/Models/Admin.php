<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table      = 'admins';
    protected $primaryKey = 'id_admin';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nama', 'username', 'password', 'status'];

    // Untuk timestamp created_at dan updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Fungsi untuk mendapatkan admin berdasarkan username (berguna untuk login)
    public function getAdminByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
