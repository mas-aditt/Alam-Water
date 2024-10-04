<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_product'   => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ],
            'nama_product' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'deskripsi'    => [
                'type'           => 'TEXT',
            ],
            'harga'        => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2', 
            ],
            'stok'         => [
                'type'           => 'INT',
                'constraint'     => 11,    
            ],
            'gambar' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'created_at'   => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'updated_at'   => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
        ]);
        $this->forge->addKey('id_product', TRUE);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
