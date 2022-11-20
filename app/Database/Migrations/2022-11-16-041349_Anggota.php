<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anggota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_anggota'              => [
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
            'nama_anggota'              => [
                'type'              => 'VARCHAR',
                'constraint'        => 11,
            ],
            'no_identitas'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'no_telpa'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ]
        ]);

        $this->forge->addPrimaryKey('id_anggota');
        $this->forge->addForeignKey('id_gunung', 'gunung', 'id_gunung', 'CASCADE', 'CASCADE');
        $this->forge->createTable('anggota'); 
    }

    public function down()
    {
        $this->forge->dropTable('anggota'); 
    }
}
