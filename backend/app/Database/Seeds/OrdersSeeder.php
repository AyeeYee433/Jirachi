<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $password = password_hash('samplepass', PASSWORD_DEFAULT);

        $dataEntry = [
            [   // Order ID #1 
                'customer_id' => 1,
                'ordered_date' => $now,
                'delivered_date' => $now,
                'address' => 'manila',
                'payment_method' => 'e-wallet',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];
        $this->db->table('Orders')->insertBatch($dataEntry);
    }
}
