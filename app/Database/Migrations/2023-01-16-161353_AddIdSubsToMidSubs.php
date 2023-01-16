<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIdSubsToMidSubs extends Migration
{
    public function up()
    {
        $field = [
            'id_subs' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_id_users_to_gunung FOREIGN KEY(`id_subs`) REFERENCES `subscription`(`id_subs`)'
        ];
        $this->forge->addColumn('mid_subs', $field);
    }

    public function down()
    {
        //
    }
}
