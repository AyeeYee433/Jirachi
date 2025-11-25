<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => false
            ],
            'img' => [  // File Link
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => true
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10, 2',
                'unsigned' => true,
                'null' => false
            ],
            'stock' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'deleted_at' => [   // Deleted At
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [   // Created At
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [   // Updated At
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->CreateTable('Products', true);
    }

    public function down()
    {
        $this->forge->dropTable('Products', true);
    }
}
