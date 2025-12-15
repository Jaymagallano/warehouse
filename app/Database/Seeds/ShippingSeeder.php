<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ShippingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'shipment_number' => 'SHP-2024-001',
                'type' => 'outgoing',
                'status' => 'pending',
                'supplier_id' => null,
                'customer_id' => 1,
                'expected_date' => '2024-12-20',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'SHP-2024-002',
                'type' => 'outgoing',
                'status' => 'in_transit',
                'supplier_id' => null,
                'customer_id' => 2,
                'expected_date' => '2024-12-18',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'SHP-2024-003',
                'type' => 'outgoing',
                'status' => 'completed',
                'supplier_id' => null,
                'customer_id' => 3,
                'expected_date' => '2024-12-15',
                'actual_date' => '2024-12-15',
            ],
            [
                'shipment_number' => 'SHP-2024-004',
                'type' => 'outgoing',
                'status' => 'pending',
                'supplier_id' => null,
                'customer_id' => 1,
                'expected_date' => '2024-12-22',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'SHP-2024-005',
                'type' => 'outgoing',
                'status' => 'cancelled',
                'supplier_id' => null,
                'customer_id' => 2,
                'expected_date' => '2024-12-10',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'SHP-2024-006',
                'type' => 'outgoing',
                'status' => 'completed',
                'supplier_id' => null,
                'customer_id' => 4,
                'expected_date' => '2024-12-12',
                'actual_date' => '2024-12-12',
            ],
            [
                'shipment_number' => 'SHP-2024-007',
                'type' => 'outgoing',
                'status' => 'in_transit',
                'supplier_id' => null,
                'customer_id' => 5,
                'expected_date' => '2024-12-19',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'SHP-2024-008',
                'type' => 'outgoing',
                'status' => 'pending',
                'supplier_id' => null,
                'customer_id' => 3,
                'expected_date' => '2024-12-25',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'SHP-2024-009',
                'type' => 'outgoing',
                'status' => 'completed',
                'supplier_id' => null,
                'customer_id' => 1,
                'expected_date' => '2024-12-08',
                'actual_date' => '2024-12-08',
            ],
            [
                'shipment_number' => 'SHP-2024-010',
                'type' => 'outgoing',
                'status' => 'pending',
                'supplier_id' => null,
                'customer_id' => 2,
                'expected_date' => '2024-12-28',
                'actual_date' => null,
            ],
        ];

        $this->db->table('shipments')->insertBatch($data);
    }
}
