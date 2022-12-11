<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JalurSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_jalur' => '1',
                'id_gunung' => '1',
                'nama' => 'Tretes'
            ],
            [
                'id_jalur' => '2',
                'id_gunung' => '1',
                'nama' => 'Purwosari'
            ],
            [
                'id_jalur' => '3',
                'id_gunung' => '1',
                'nama' => 'Lawang'
            ],
            [
                'id_jalur' => '4',
                'id_gunung' => '1',
                'nama' => 'Batu, Cangar'
            ],
            [
                'id_jalur' => '5',
                'id_gunung' => '2',
                'nama' => 'Desa Ranupani'
            ],
            [
                'id_jalur' => '6',
                'id_gunung' => '3',
                'nama' => 'Pasuruan'
            ],
            [
                'id_jalur' => '7',
                'id_gunung' => '3',
                'nama' => 'Probolinggo'
            ],
            [
                'id_jalur' => '8',
                'id_gunung' => '3',
                'nama' => 'Malang'
            ],
            [
                'id_jalur' => '9',
                'id_gunung' => '3',
                'nama' => 'Lumajang'
            ]
        ];
        $this->db->table('jalur')->insertBatch($data);
    }
}
