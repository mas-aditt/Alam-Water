<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi'   => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ],
            'id_user'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
            ],
            'id_product'      => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
            ],
            'jumlah'         => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tgl_transaksi'  => [
                'type'           => 'DATETIME',
            ],
            'total_harga'    => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
            ],
            'status'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'created_at'     => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'updated_at'     => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
        ]);

        $this->forge->addKey('id_transaksi', TRUE);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_product', 'products', 'id_product', 'CASCADE', 'CASCADE');

        $this->forge->createTable('transaksis');
    }

    public function down()
    {
        $this->forge->dropTable('transaksis');
    }
}
