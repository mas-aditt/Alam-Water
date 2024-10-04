<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'unique'         => TRUE,  
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',  
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
        ]);

        // Primary Key
        $this->forge->addKey('id_admin', TRUE);

        // Membuat tabel admin
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
