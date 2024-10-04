<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToUsersAndAdmins extends Migration
{
    public function up()
    {
        // Tambahkan kolom status ke tabel users
        $this->forge->addColumn('users', [
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default' => 'pending',
            ]
        ]);
        
        // Tambahkan kolom status ke tabel admins
        $this->forge->addColumn('admins', [
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default' => 'pending',
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'status');
        $this->forge->dropColumn('admins', 'status');
    }
}
