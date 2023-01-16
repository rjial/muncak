<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MidTiket extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_midtiket'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'orderid_tiket'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'gross_amount_tiket'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'transaction_id_tiket'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ]
            ]);
            $this->forge->addPrimaryKey('id_midtiket');
            $this->forge->createTable('mid_tiket');
    }

    public function down()
    {
        $this->forge->dropTable('mid_tiket'); 
    }
}
