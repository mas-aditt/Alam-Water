<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'email', 'no_telp', 'password', 'alamat', 'status'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Untuk pengecekan email saat login
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
