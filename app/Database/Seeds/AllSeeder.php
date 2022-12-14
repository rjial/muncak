<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call("RoleSeeder");
        $this->call("UserSeeder");
        $this->call("GunungSeeder");
        $this->call("JalurSeeder");
    }
}
