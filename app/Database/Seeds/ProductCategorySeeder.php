<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukCategorySeeder extends Seeder
{
    public function run()
    {
        $this->db->table('product_categories')->truncate();

        $data = [
            [
                'name' => 'Skintint',
                'slug' => 'skintint',
                'description' => 'All Skintint products',
                'parent_id' => null,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cushion',
                'slug' => 'cushion',
                'description' => 'Various Cushion types',
                'parent_id' => 1, 
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Powder',
                'slug' => 'powder',
                'description' => 'All powder types',
                'parent_id' => 2, 
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Liptint',
                'slug' => 'liptint',
                'description' => 'All Liptint',
                'parent_id' => 3, 
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Blush',
                'slug' => 'blush',
                'description' => 'about blush',
                'parent_id' => 4, 
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
 
        ];

        // Gunakan ignore(true) untuk melewati error duplikat (jika ada)
        $this->db->table('product_categories')->ignore(true)->insertBatch($data);
    }
}