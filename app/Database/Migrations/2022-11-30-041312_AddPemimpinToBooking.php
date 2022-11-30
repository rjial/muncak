<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPemimpinToBooking extends Migration
{
    public function up()
    {
        $field = [
            'id_pemimpin'           => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_pemimpintim FOREIGN KEY(`id_pemimpin`) REFERENCES `pemimpin_tim`(`id_pemimpin`)'
        ];
        $this->forge->addColumn('booking', $field);
    }

    public function down()
    {
        //
    }
}
