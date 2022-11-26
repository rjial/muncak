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
            'id_tim' => [
                'type'              => 'INT',
                'constraint'        => 11,
            ],
            'nama_anggota'              => [
                'type'              => 'VARCHAR',
                'constraint'        => 11,
            ],
            'no_identitas'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'jk' => [
                'type'              => 'VARCHAR',
                'constraint'        => '15',
            ],
            'no_hp'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ]
        ]);
        
        $this->forge->addPrimaryKey('id_anggota');
        //$this->forge->addForeignKey('id_tim', 'tim', 'id_tim', 'CASCADE', 'CASCADE');
        $this->forge->createTable('anggota');
    }

    public function down()
    {
        $this->forge->dropTable('anggota'); 
    }
}
