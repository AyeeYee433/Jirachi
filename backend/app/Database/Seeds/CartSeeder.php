<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $dataEntry = [
            [   // Cart Entry ID #1
                'customer_id' => 10,
                'product_id' => 10,
                'quantity' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];
        $this->db->table('Cart')->insertBatch($dataEntry);
    }
}
