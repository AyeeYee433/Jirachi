<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $password = password_hash('samplepass', PASSWORD_DEFAULT);

        $dataEntry = [
            [   // Product ID #1
                'name' => 'mambo',
                'description' => 'elcondor lost birb',
                'img' => 'https://dendenotakushop.com/cdn/shop/files/KuripanPlushieMatikanetannhauserUmamusume-PrettyDerby_0.jpg?v=1724820492',
                'price' => 19.99,
                'stock' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];
        $this->db->table('Products')->insertBatch($dataEntry);
    }
}
