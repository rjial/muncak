<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_users' => '1',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin123',
                'nama_users' => 'Saiful Admin',
                'jenis_kelamin_users' => 'pria',
                'no_identitas_users' => '20113030',
                'no_hp_users' => '081111111',
                'alamat_users' => 'Jl. Jalan gk Jadian',
                'created_at' => '',
                'updated_at' => '',
                'id_role' => '1',
            ],
            [
                'id_users' => '2',
                'username' => 'aminmountguard',
                'email' => 'amin@gmail.com',
                'password' => 'amin123',
                'nama_users' => 'Amin Jaga Gunung',
                'jenis_kelamin_users' => 'pria',
                'no_identitas_users' => '21000401',
                'no_hp_users' => '082222222',
                'alamat_users' => 'Jl. Ninjaku',
                'created_at' => '',
                'updated_at' => '',
                'id_role' => '2',
            ],
            [
                'id_users' => '3',
                'username' => 'ritamountguard',
                'email' => 'rita@gmail.com',
                'password' => 'rita1234',
                'nama_users' => 'Rita Kasir Panderman',
                'jenis_kelamin_users' => 'wanita',
                'no_identitas_users' => '341111020',
                'no_hp_users' => '088888811',
                'alamat_users' => 'Jl. Jalan ke Dufan',
                'created_at' => '',
                'updated_at' => '',
                'id_role' => '2',
            ],
            [
                'id_users' => '4',
                'username' => 'astrajingga1',
                'email' => 'astra@gmail.com',
                'password' => 'astra1234',
                'nama_users' => 'Astra Jingga',
                'jenis_kelamin_users' => 'pria',
                'no_identitas_users' => '201111000',
                'no_hp_users' => '0861536777',
                'alamat_users' => 'Jl. Nangka no 13, Somalia Utara',
                'created_at' => '',
                'updated_at' => '',
                'id_role' => '3',
            ],
            [
                'id_users' => '5',
                'username' => 'roykiyoshi11',
                'email' => 'royp@gmail.com',
                'password' => 'roy12345',
                'nama_users' => 'Roy Andini Putri',
                'jenis_kelamin_users' => 'wanita',
                'no_identitas_users' => '223113356',
                'no_hp_users' => '08922211238',
                'alamat_users' => 'Jl. Flamboyan Utara no 42, Pakistan',
                'created_at' => '',
                'updated_at' => '',
                'id_role' => '3',
            ]
            ];
            $this->db->table('users')->insertBatch($data);
    }
}
