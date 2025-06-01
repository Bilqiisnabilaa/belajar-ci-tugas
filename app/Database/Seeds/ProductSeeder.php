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
                'harga'  => 110000,
                'jumlah' => 5,
                'foto' => 'skintint.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Cushion Instaperfect',
                'harga'  => 120000,
                'jumlah' => 7,
                'foto' => 'cushion.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Powder Sea Make Up',
                'harga'  => 89000,
                'jumlah' => 5,
                'foto' => 'powder.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Liptint Raecca',
                'harga'  => 90000,
                'jumlah' => 8,
                'foto' => 'liptint.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Blush On Dazzle Me',
                'harga'  => 40000,
                'jumlah' => 6,
                'foto' => 'blush.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Eyeliner Pinkfllash',
                'harga'  => 35000,
                'jumlah' => 3,
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