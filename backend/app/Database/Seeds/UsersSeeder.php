<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(){
        $now = date('Y-m-d H:i:s');
        $password = password_hash('Password123!', PASSWORD_DEFAULT);
        $data = [
            [
                'first_name'    => 'admin',
                'last_name'     => 'po ako',
                'username'      => 'admin',
                'email'         => 'admin@example.com',
                'address'       => '67 bombo st. sampaloc manila',
                'type'          => 'admin',
                'password_hash' => $password,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'first_name'    => 'user',
                'last_name'     => 'lang po ako',
                'username'      => 'user1',
                'email'         => 'user1@example.com',
                'address'       => '67 bombo st. mango manila',
                'type'          => 'user',
                'password_hash' => $password,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
        ];

        $this->db->table('userTable')->insertBatch($data);
    }
}
