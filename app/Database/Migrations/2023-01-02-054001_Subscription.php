<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subscription extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id_subs'              => [
            'type'              => 'INT',
            'constraint'        => 11,
            'unsigned'          => true,
            'auto_increment'    => true,
        ],
        'nama_subs'              => [
            'type'              => 'VARCHAR',
            'constraint'        => '100',
        ],
        'harga_subs'              => [
            'type'              => 'INT'
        ],
        'keterangan_subs'              => [
            'type'              => 'TEXT'
        ]
        ]);
        $this->forge->addPrimaryKey('id_subs');
        $this->forge->createTable('subscription'); 
    }

    public function down()
    {
        $this->forge->dropTable('subscription'); 
    }
}
