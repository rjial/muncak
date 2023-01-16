<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
            'nama_role'     => 'administrator',
            ],
            [
            'nama_role'     => 'pengelola gunung',
            ],
            [
            'nama_role'     => 'pengguna',
            ]
        ];
        
        $this->db->table('role')->insertBatch($data);

    }
}
