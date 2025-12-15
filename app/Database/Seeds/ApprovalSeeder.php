<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ApprovalSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'type' => 'purchase_order',
                'reference_id' => 1,
                'status' => 'pending',
                'requested_by' => 4,
                'approved_by' => null,
                'request_date' => '2024-12-15 09:00:00',
            ],
            [
                'type' => 'purchase_order',
                'reference_id' => 2,
                'status' => 'approved',
                'requested_by' => 4,
                'approved_by' => 1,
                'request_date' => '2024-12-14 10:30:00',
            ],
            [
                'type' => 'requisition',
                'reference_id' => 1,
                'status' => 'pending',
                'requested_by' => 2,
                'approved_by' => null,
                'request_date' => '2024-12-16 08:00:00',
            ],
            [
                'type' => 'requisition',
                'reference_id' => 2,
                'status' => 'approved',
                'requested_by' => 2,
                'approved_by' => 1,
                'request_date' => '2024-12-13 14:00:00',
            ],
            [
                'type' => 'shipment',
                'reference_id' => 1,
                'status' => 'pending',
                'requested_by' => 2,
                'approved_by' => null,
                'request_date' => '2024-12-15 11:00:00',
            ],
            [
                'type' => 'shipment',
                'reference_id' => 2,
                'status' => 'approved',
                'requested_by' => 2,
                'approved_by' => 1,
                'request_date' => '2024-12-12 15:30:00',
            ],
            [
                'type' => 'inventory_adjustment',
                'reference_id' => 1,
                'status' => 'rejected',
                'requested_by' => 3,
                'approved_by' => 1,
                'request_date' => '2024-12-10 09:00:00',
            ],
            [
                'type' => 'inventory_adjustment',
                'reference_id' => 2,
                'status' => 'approved',
                'requested_by' => 3,
                'approved_by' => 1,
                'request_date' => '2024-12-11 10:00:00',
            ],
            [
                'type' => 'purchase_order',
                'reference_id' => 3,
                'status' => 'pending',
                'requested_by' => 4,
                'approved_by' => null,
                'request_date' => '2024-12-16 14:00:00',
            ],
            [
                'type' => 'requisition',
                'reference_id' => 3,
                'status' => 'approved',
                'requested_by' => 5,
                'approved_by' => 1,
                'request_date' => '2024-12-09 16:00:00',
            ],
        ];

        $this->db->table('approvals')->insertBatch($data);
    }
}
