<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimToAnggota extends Migration
{
    public function up()
    {
        $field = [
            'id_tim' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'CONSTRAINT foreign_id_tim_to_anggota FOREIGN KEY(`id_tim`) REFERENCES `tim`(`id_tim`)'
        ];
        $this->forge->addColumn('anggota', $field);
    }

    public function down()
    {
        //
    }
}
