<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'           => [
                 'type'           => 'INT',
                 'constraint'     => 11,
                 'unsigned'       => TRUE,
                 'auto_increment' => TRUE
              ],
              'nama'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '255',
              ],
              'email'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '255',
                  'unique'         => TRUE,  
              ],
              'no_telp'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '20', 
              ],
              'password'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '255',
              ],
              'alamat'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '255',
              ],
              'created_at'       => [
                  'type'           => 'DATETIME',
                  'null'           => TRUE,
              ],
              'updated_at'       => [
                  'type'           => 'DATETIME',
                  'null'           => TRUE,
              ],
        ]);
        $this->forge->addKey('id_user', TRUE);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
