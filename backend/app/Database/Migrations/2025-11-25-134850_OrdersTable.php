<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrdersTable extends Migration
{
    public function up()
    {
        // id, customer_id, order_date, delivered_date, delivery_address, payment_method [card, e-wallet,]
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
            'ordered_date' => [   // Deleted At
                'type' => 'DATETIME',
                'null' => true,
            ],
            'delivered_date' => [   // Created At
                'type' => 'DATETIME',
                'null' => true,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
                'null' => false
            ],
            'payment_method' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'e-wallet',
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
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Orders', true);
    }

    public function down()
    {
        $this->forge->dropTable('Orders', true);
    }
}
