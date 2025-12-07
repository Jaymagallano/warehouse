<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'material_code' => 'RM-CEMENT-001',
                'name' => 'Portland Cement Type I (50kg)',
                'description' => 'High-strength Portland cement for general construction use',
                'category' => 'Cement',
                'unit' => 'bag',
                'unit_price' => 285.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'material_code' => 'RM-REBAR-001',
                'name' => 'Deformed Steel Rebar 10mm',
                'description' => 'Grade 40 deformed steel reinforcement bar, 6-meter length',
                'category' => 'Steel Reinforcement',
                'unit' => 'pcs',
                'unit_price' => 185.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'material_code' => 'RM-REBAR-002',
                'name' => 'Deformed Steel Rebar 16mm',
                'description' => 'Grade 60 deformed steel reinforcement bar, 6-meter length',
                'category' => 'Steel Reinforcement',
                'unit' => 'pcs',
                'unit_price' => 425.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'material_code' => 'RM-SAND-001',
                'name' => 'Washed Sand Fine',
                'description' => 'Clean washed fine sand for plastering and finishing',
                'category' => 'Aggregates',
                'unit' => 'cu.m',
                'unit_price' => 850.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'material_code' => 'RM-GRAVEL-001',
                'name' => 'Crushed Gravel 3/4"',
                'description' => 'Crushed stone aggregate for concrete mixing',
                'category' => 'Aggregates',
                'unit' => 'cu.m',
                'unit_price' => 920.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'material_code' => 'RM-PLYWOOD-001',
                'name' => 'Marine Plywood 4x8 (12mm)',
                'description' => 'Waterproof marine plywood for formworks and construction',
                'category' => 'Plywood & Lumber',
                'unit' => 'sheet',
                'unit_price' => 685.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'material_code' => 'RM-CHB-001',
                'name' => 'Concrete Hollow Blocks 4"',
                'description' => 'Standard 4-inch concrete hollow blocks for walls',
                'category' => 'Masonry',
                'unit' => 'pcs',
                'unit_price' => 12.50,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'material_code' => 'RM-CHB-002',
                'name' => 'Concrete Hollow Blocks 6"',
                'description' => 'Standard 6-inch concrete hollow blocks for load-bearing walls',
                'category' => 'Masonry',
                'unit' => 'pcs',
                'unit_price' => 18.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'material_code' => 'RM-GI-001',
                'name' => 'GI Roofing Sheet 0.5mm (10ft)',
                'description' => 'Galvanized iron corrugated roofing sheet',
                'category' => 'Roofing',
                'unit' => 'sheet',
                'unit_price' => 425.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'material_code' => 'RM-LUMBER-001',
                'name' => 'Coco Lumber 2x4x12',
                'description' => 'Coconut lumber for framing and structural support',
                'category' => 'Plywood & Lumber',
                'unit' => 'pcs',
                'unit_price' => 165.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('materials')->insertBatch($data);
    }
}
