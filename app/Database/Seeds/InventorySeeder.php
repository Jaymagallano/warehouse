<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'item_code' => 'CEMENT-001',
                'item_name' => 'Portland Cement Type I',
                'category' => 'Cement & Concrete',
                'quantity' => 5000,
                'unit' => 'bags',
                'location' => 'ZONE-A-01',
                'batch_number' => 'BATCH-2025-001',
                'expiry_date' => '2026-06-30',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'REBAR-001',
                'item_name' => 'Steel Rebar 10mm',
                'category' => 'Steel & Metal',
                'quantity' => 15000,
                'unit' => 'pcs',
                'location' => 'ZONE-B-01',
                'batch_number' => 'BATCH-2025-002',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'REBAR-002',
                'item_name' => 'Steel Rebar 12mm',
                'category' => 'Steel & Metal',
                'quantity' => 12000,
                'unit' => 'pcs',
                'location' => 'ZONE-B-02',
                'batch_number' => 'BATCH-2025-003',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'LUMBER-001',
                'item_name' => 'Marine Plywood 4x8 (18mm)',
                'category' => 'Wood & Plywood',
                'quantity' => 800,
                'unit' => 'sheets',
                'location' => 'ZONE-C-01',
                'batch_number' => 'BATCH-2025-004',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'LUMBER-002',
                'item_name' => 'Coco Lumber 2x4x12',
                'category' => 'Wood & Plywood',
                'quantity' => 2500,
                'unit' => 'pcs',
                'location' => 'ZONE-C-02',
                'batch_number' => 'BATCH-2025-005',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'BLOCK-001',
                'item_name' => 'Concrete Hollow Blocks (CHB) 4"',
                'category' => 'Blocks & Bricks',
                'quantity' => 20000,
                'unit' => 'pcs',
                'location' => 'ZONE-D-01',
                'batch_number' => 'BATCH-2025-006',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'BLOCK-002',
                'item_name' => 'Concrete Hollow Blocks (CHB) 6"',
                'category' => 'Blocks & Bricks',
                'quantity' => 15000,
                'unit' => 'pcs',
                'location' => 'ZONE-D-02',
                'batch_number' => 'BATCH-2025-007',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'SAND-001',
                'item_name' => 'Washed Sand',
                'category' => 'Aggregates',
                'quantity' => 500,
                'unit' => 'cu.m',
                'location' => 'ZONE-E-01',
                'batch_number' => 'BATCH-2025-008',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'GRAVEL-001',
                'item_name' => 'Gravel 3/4"',
                'category' => 'Aggregates',
                'quantity' => 600,
                'unit' => 'cu.m',
                'location' => 'ZONE-E-02',
                'batch_number' => 'BATCH-2025-009',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'ROOFING-001',
                'item_name' => 'GI Roofing Sheet 0.5mm (10ft)',
                'category' => 'Roofing Materials',
                'quantity' => 1500,
                'unit' => 'sheets',
                'location' => 'ZONE-F-01',
                'batch_number' => 'BATCH-2025-010',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'PAINT-001',
                'item_name' => 'Latex Paint White 4L',
                'category' => 'Paint & Coating',
                'quantity' => 500,
                'unit' => 'gallon',
                'location' => 'ZONE-G-01',
                'batch_number' => 'BATCH-2025-011',
                'expiry_date' => '2027-12-31',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'WIRE-001',
                'item_name' => 'Tie Wire #16',
                'category' => 'Hardware & Tools',
                'quantity' => 300,
                'unit' => 'kg',
                'location' => 'ZONE-H-01',
                'batch_number' => 'BATCH-2025-012',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'NAIL-001',
                'item_name' => 'Common Wire Nails 2"',
                'category' => 'Hardware & Tools',
                'quantity' => 1000,
                'unit' => 'kg',
                'location' => 'ZONE-H-02',
                'batch_number' => 'BATCH-2025-013',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'PIPE-001',
                'item_name' => 'PVC Pipe 1/2" Schedule 40',
                'category' => 'Plumbing Materials',
                'quantity' => 800,
                'unit' => 'pcs',
                'location' => 'ZONE-I-01',
                'batch_number' => 'BATCH-2025-014',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_code' => 'ELEC-001',
                'item_name' => 'Electrical Wire THHN 2.0mm',
                'category' => 'Electrical Materials',
                'quantity' => 5000,
                'unit' => 'meters',
                'location' => 'ZONE-J-01',
                'batch_number' => 'BATCH-2025-015',
                'expiry_date' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('inventory')->insertBatch($data);
    }
}
