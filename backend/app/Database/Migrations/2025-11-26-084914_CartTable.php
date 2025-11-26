<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CartTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'quantity' => [
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
        $this->forge->createTable('Cart', true);
    }

    public function down()
    {
        $this->forge->dropTable('Cart', true);
    }
}
