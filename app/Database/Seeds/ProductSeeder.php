<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // membuat data
        $data = [
            [
                'nama' => 'Skintint Somethinc',
                'harga'  => 300000,
                'jumlah' => 10,
                'foto' => 'skintint.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Cushion Instaperfect',
                'harga'  => 400000,
                'jumlah' => 8,
                'foto' => 'cushion.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Powder Sea Make Up',
                'harga'  => 340000,
                'jumlah' => 7,
                'foto' => 'powder.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Liptint Raecca',
                'harga'  => 270000,
                'jumlah' => 8,
                'foto' => 'liptint.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Blush On Dazzle Me',
                'harga'  => 240000,
                'jumlah' => 6,
                'foto' => 'blush.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Eyeliner Pinkfllash',
                'harga'  => 299000,
                'jumlah' => 8,
                'foto' => 'eyeliner.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('product')->insert($item);
        }
    }
}