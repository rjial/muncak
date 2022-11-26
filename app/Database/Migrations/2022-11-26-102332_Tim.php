<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tim extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tim'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'id_pemimpin' => [
                'type'              => 'INT',
                'constraint'        => 11,
            ],

        ]);
        $this->forge->addPrimaryKey('id_tim');
        //$this->forge->addForeignKey('id_pemimpin', 'pemimpin', 'id_pemimpin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tim');
    }

    public function down()
    {
        //
    }
}
