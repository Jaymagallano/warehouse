<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'manager',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'email' => 'manager@warehouse.com',
                'role' => 'warehouse_manager',
                'status' => 'active'
            ],
            [
                'username' => 'staff',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'email' => 'staff@warehouse.com',
                'role' => 'warehouse_staff',
                'status' => 'active'
            ],
            [
                'username' => 'auditor',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'email' => 'auditor@warehouse.com',
                'role' => 'inventory_auditor',
                'status' => 'active'
            ],
            [
                'username' => 'procurement',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'email' => 'procurement@warehouse.com',
                'role' => 'procurement_officer',
                'status' => 'active'
            ],
            [
                'username' => 'apclerk',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'email' => 'apclerk@warehouse.com',
                'role' => 'accounts_payable_clerk',
                'status' => 'active'
            ],
            [
                'username' => 'arclerk',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'email' => 'arclerk@warehouse.com',
                'role' => 'accounts_receivable_clerk',
                'status' => 'active'
            ],
            [
                'username' => 'itadmin',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'email' => 'itadmin@warehouse.com',
                'role' => 'it_administrator',
                'status' => 'active'
            ],
            [
                'username' => 'topadmin',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'email' => 'topadmin@warehouse.com',
                'role' => 'top_management',
                'status' => 'active'
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
