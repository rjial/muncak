<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimToBooking extends Migration
{
    public function up()
    {
        $field = [
            'id_tim' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_timbooking FOREIGN KEY(`id_tim`) REFERENCES `tim`(`id_tim`)'
        ];
        $this->forge->addColumn('booking', $field);
    }

    public function down()
    {
        //
    }
}
