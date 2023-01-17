<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsersToGunung extends Migration
{
    public function up()
    {
        $field = [
            'id_users' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_id_users_to_gunung FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`)'
        ];
        $this->forge->addColumn('gunung', $field);
    }

    public function down()
    {
        //
    }
}
