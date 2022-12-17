<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBookingToPaymentHistory extends Migration
{
    public function up()
    {
        $field = [
            'id_booking' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_id_booking FOREIGN KEY(`id_booking`) REFERENCES `booking`(`id_booking`)'
        ];
        $this->forge->addColumn('payment_history', $field);
    }

    public function down()
    {
        //
    }
}
