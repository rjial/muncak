<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPemimpinTimToTim extends Migration
{
    public function up()
    {
        $field = [
            'id_pemimpin' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_id_pemimpin_tim FOREIGN KEY(`id_pemimpin`) REFERENCES `pemimpin_tim`(`id_pemimpin`)'
        ];
        $this->forge->addColumn('tim', $field);}

    public function down()
    {
        //
    }
}
