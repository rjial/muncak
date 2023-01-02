<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSubsToUser extends Migration
{
    public function up()
    {
        $field = [
            'id_subs' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_id_subs_to_users FOREIGN KEY(`id_subs`) REFERENCES `subscription`(`id_subs`)'
        ];
        $this->forge->addColumn('users', $field);
    }

    public function down()
    {
        //
    }
}
