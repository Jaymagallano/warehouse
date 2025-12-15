<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'material_code' => 'MAT-001',
                'name' => 'Steel Reinforcement Bar',
                'description' => '12mm diameter steel rebar for construction',
                'category' => 'Steel',
                'unit' => 'pcs',
                'unit_price' => 250.00,
            ],
            [
                'material_code' => 'MAT-002',
                'name' => 'Portland Cement Type 1',
                'description' => 'General purpose cement 40kg bag',
                'category' => 'Cement',
                'unit' => 'bag',
                'unit_price' => 280.00,
            ],
            [
                'material_code' => 'MAT-003',
                'name' => 'Fine Sand',
                'description' => 'Washed fine sand for plastering',
                'category' => 'Aggregates',
                'unit' => 'cubic meter',
                'unit_price' => 1200.00,
            ],
            [
                'material_code' => 'MAT-004',
                'name' => 'Hollow Blocks 4 inch',
                'description' => 'Concrete hollow blocks 4x8x16',
                'category' => 'Masonry',
                'unit' => 'pcs',
                'unit_price' => 15.00,
            ],
            [
                'material_code' => 'MAT-005',
                'name' => 'Plywood Marine 3/4',
                'description' => 'Marine plywood 4x8 feet',
                'category' => 'Wood',
                'unit' => 'sheet',
                'unit_price' => 1800.00,
            ],
            [
                'material_code' => 'MAT-006',
                'name' => 'GI Wire #16',
                'description' => 'Galvanized iron tie wire',
                'category' => 'Steel',
                'unit' => 'kg',
                'unit_price' => 85.00,
            ],
            [
                'material_code' => 'MAT-007',
                'name' => 'PVC Pipe 4 inch',
                'description' => 'PVC pipe for drainage S1000',
                'category' => 'Plumbing',
                'unit' => 'pcs',
                'unit_price' => 450.00,
            ],
            [
                'material_code' => 'MAT-008',
                'name' => 'Electrical Wire THHN 3.5mm',
                'description' => 'Stranded copper wire 150m roll',
                'category' => 'Electrical',
                'unit' => 'roll',
                'unit_price' => 4500.00,
            ],
            [
                'material_code' => 'MAT-009',
                'name' => 'Roof Tiles Clay',
                'description' => 'Spanish type clay roof tiles',
                'category' => 'Roofing',
                'unit' => 'pcs',
                'unit_price' => 35.00,
            ],
            [
                'material_code' => 'MAT-010',
                'name' => 'Latex Paint White',
                'description' => 'Acrylic latex paint 4 liters',
                'category' => 'Finishing',
                'unit' => 'gallon',
                'unit_price' => 650.00,
            ],
        ];

        $this->db->table('materials')->insertBatch($data);
    }
}
