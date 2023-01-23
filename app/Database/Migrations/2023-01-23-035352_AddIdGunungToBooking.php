<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIdGunungToBooking extends Migration
{
    public function up()
    {
        $field = [
            'id_gunung' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_id_gunung_to_booking FOREIGN KEY(`id_gunung`) REFERENCES `gunung`(`id_gunung`)'
        ];
        $this->forge->addColumn('booking', $field);
    }

    public function down()
    {
        //
    }
}
