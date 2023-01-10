<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_subs'       => '1',
                'nama_subs'     => 'Free',
                'harga_subs'     => 0,
                'keterangan_subs'     => 'Lorem Ipsum',
            ],
            [
                'id_subs'       => 2,
                'nama_subs'     => 'Premium',
                'harga_subs'     => 100000,
                'keterangan_subs'     => 'Lorem Ipsum',
            ],
        ];

        $this->db->table('subscription')->insertBatch($data);
    }
}
