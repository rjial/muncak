<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleToUsers extends Migration
{
    public function up()
    {
        $field = [
            'id_role' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_roleusers FOREIGN KEY(`id_role`) REFERENCES `role`(`id_role`)'
        ];
        $this->forge->addColumn('users', $field);
    }

    public function down()
    {
        //
    }
}
