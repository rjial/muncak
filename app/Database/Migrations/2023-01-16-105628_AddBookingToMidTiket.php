<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBookingToMidTiket extends Migration
{
    public function up()
    {
        $field = [
            'id_booking' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_id_booking_to_midtiket FOREIGN KEY(`id_booking`) REFERENCES `booking`(`id_booking`)'
        ];
        $this->forge->addColumn('mid_tiket', $field);
    }

    public function down()
    {
        //
    }
}
