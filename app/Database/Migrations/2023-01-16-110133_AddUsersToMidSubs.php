<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsersToMidSubs extends Migration
{
    public function up()
    {
        $field = [
            'id_users' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_id_users_to_midsubs FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`)'
        ];
        $this->forge->addColumn('mid_subs', $field);
    }

    public function down()
    {
        //
    }
}
