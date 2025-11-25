<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderedItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'product_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'order_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'quantity' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'price_at_purchase' => [
                'type' => 'DECIMAL',
                'constraint' => '10, 2',
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
        $this->forge->CreateTable('Ordered_Items', true);
    }

    public function down()
    {
        $this->forge->dropTable('Ordered_Items', true);
    }
}
