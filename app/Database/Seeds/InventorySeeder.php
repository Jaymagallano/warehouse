<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'item_code' => 'INV-001',
                'item_name' => 'Steel Pipes 2 inch',
                'category' => 'Raw Materials',
                'quantity' => 150,
                'unit' => 'pcs',
                'location' => 'Rack A-01',
                'batch_number' => 'BATCH-2024-001',
                'expiry_date' => null,
                'status' => 'OK',
            ],
            [
                'item_code' => 'INV-002',
                'item_name' => 'Cement Portland',
                'category' => 'Raw Materials',
                'quantity' => 500,
                'unit' => 'bags',
                'location' => 'Rack B-02',
                'batch_number' => 'BATCH-2024-002',
                'expiry_date' => '2025-06-30',
                'status' => 'OK',
            ],
            [
                'item_code' => 'INV-003',
                'item_name' => 'Electrical Wire 2.0mm',
                'category' => 'Electrical',
                'quantity' => 25,
                'unit' => 'rolls',
                'location' => 'Rack C-01',
                'batch_number' => 'BATCH-2024-003',
                'expiry_date' => null,
                'status' => 'OK',
            ],
            [
                'item_code' => 'INV-004',
                'item_name' => 'PVC Pipes 4 inch',
                'category' => 'Plumbing',
                'quantity' => 8,
                'unit' => 'pcs',
                'location' => 'Rack A-02',
                'batch_number' => 'BATCH-2024-004',
                'expiry_date' => null,
                'status' => 'Low Stock',
            ],
            [
                'item_code' => 'INV-005',
                'item_name' => 'Paint White 4L',
                'category' => 'Finishing',
                'quantity' => 45,
                'unit' => 'gallons',
                'location' => 'Rack D-01',
                'batch_number' => 'BATCH-2024-005',
                'expiry_date' => '2025-12-31',
                'status' => 'OK',
            ],
            [
                'item_code' => 'INV-006',
                'item_name' => 'Plywood 3/4 inch',
                'category' => 'Wood',
                'quantity' => 75,
                'unit' => 'sheets',
                'location' => 'Rack E-01',
                'batch_number' => 'BATCH-2024-006',
                'expiry_date' => null,
                'status' => 'OK',
            ],
            [
                'item_code' => 'INV-007',
                'item_name' => 'Nails 2 inch',
                'category' => 'Hardware',
                'quantity' => 200,
                'unit' => 'boxes',
                'location' => 'Rack F-01',
                'batch_number' => 'BATCH-2024-007',
                'expiry_date' => null,
                'status' => 'OK',
            ],
            [
                'item_code' => 'INV-008',
                'item_name' => 'Sand Fine',
                'category' => 'Raw Materials',
                'quantity' => 5,
                'unit' => 'cubic meters',
                'location' => 'Yard A',
                'batch_number' => 'BATCH-2024-008',
                'expiry_date' => null,
                'status' => 'Low Stock',
            ],
            [
                'item_code' => 'INV-009',
                'item_name' => 'Gravel 3/4 inch',
                'category' => 'Raw Materials',
                'quantity' => 12,
                'unit' => 'cubic meters',
                'location' => 'Yard B',
                'batch_number' => 'BATCH-2024-009',
                'expiry_date' => null,
                'status' => 'OK',
            ],
            [
                'item_code' => 'INV-010',
                'item_name' => 'Steel Bars 12mm',
                'category' => 'Raw Materials',
                'quantity' => 300,
                'unit' => 'pcs',
                'location' => 'Rack A-03',
                'batch_number' => 'BATCH-2024-010',
                'expiry_date' => null,
                'status' => 'OK',
            ],
        ];

        $this->db->table('inventory')->insertBatch($data);
    }
}
