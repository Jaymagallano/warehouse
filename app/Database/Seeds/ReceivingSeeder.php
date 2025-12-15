<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReceivingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'shipment_number' => 'RCV-2024-001',
                'type' => 'incoming',
                'status' => 'pending',
                'supplier_id' => 1,
                'customer_id' => null,
                'expected_date' => '2024-12-20',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'RCV-2024-002',
                'type' => 'incoming',
                'status' => 'received',
                'supplier_id' => 2,
                'customer_id' => null,
                'expected_date' => '2024-12-16',
                'actual_date' => '2024-12-16',
            ],
            [
                'shipment_number' => 'RCV-2024-003',
                'type' => 'incoming',
                'status' => 'completed',
                'supplier_id' => 1,
                'customer_id' => null,
                'expected_date' => '2024-12-14',
                'actual_date' => '2024-12-14',
            ],
            [
                'shipment_number' => 'RCV-2024-004',
                'type' => 'incoming',
                'status' => 'pending',
                'supplier_id' => 3,
                'customer_id' => null,
                'expected_date' => '2024-12-25',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'RCV-2024-005',
                'type' => 'incoming',
                'status' => 'in_transit',
                'supplier_id' => 2,
                'customer_id' => null,
                'expected_date' => '2024-12-19',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'RCV-2024-006',
                'type' => 'incoming',
                'status' => 'completed',
                'supplier_id' => 4,
                'customer_id' => null,
                'expected_date' => '2024-12-10',
                'actual_date' => '2024-12-10',
            ],
            [
                'shipment_number' => 'RCV-2024-007',
                'type' => 'incoming',
                'status' => 'received',
                'supplier_id' => 1,
                'customer_id' => null,
                'expected_date' => '2024-12-17',
                'actual_date' => '2024-12-17',
            ],
            [
                'shipment_number' => 'RCV-2024-008',
                'type' => 'incoming',
                'status' => 'pending',
                'supplier_id' => 5,
                'customer_id' => null,
                'expected_date' => '2024-12-28',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'RCV-2024-009',
                'type' => 'incoming',
                'status' => 'in_transit',
                'supplier_id' => 3,
                'customer_id' => null,
                'expected_date' => '2024-12-21',
                'actual_date' => null,
            ],
            [
                'shipment_number' => 'RCV-2024-010',
                'type' => 'incoming',
                'status' => 'completed',
                'supplier_id' => 2,
                'customer_id' => null,
                'expected_date' => '2024-12-05',
                'actual_date' => '2024-12-05',
            ],
        ];

        $this->db->table('shipments')->insertBatch($data);
    }
}
