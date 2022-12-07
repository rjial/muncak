<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
            'id_role'       => '1',
            'nama_role'     => 'administrator',
            ],
            [
            'id_role'       => '2',
            'nama_role'     => 'pengelola gunung',
            ],
            [
            'id_role'       => '3',
            'nama_role'     => 'pengguna',
            ]
        ];
        
        $this->db->table('role')->insertBatch($data);

    }
}
