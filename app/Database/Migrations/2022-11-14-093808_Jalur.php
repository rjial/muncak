<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jalur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jalur'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'id_gunung'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'nama'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            
        ]);

        $this->forge->addPrimaryKey('id_jalur');
        $this->forge->addForeignKey('id_gunung', 'gunung', 'id_gunung', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jalur'); 
    }

    public function down()
    {
        $this->forge->dropTable('jalur'); 
    }
}
