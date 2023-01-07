<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Booking extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_booking'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'id_jalur'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'null'              => true
            ],
            'id_users'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'tanggal_naik'              => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'tanggal_turun'              => [
                'type'              => 'DATETIME',
                'null'              => true,
            ]
        ]);


        $this->forge->addPrimaryKey('id_booking');
        $this->forge->addForeignKey('id_jalur', 'jalur', 'id_jalur', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_users', 'users', 'id_users', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_tim', 'tim', 'id_tim', 'CASCADE', 'CASCADE');
        $this->forge->createTable('booking');
    }

    public function down()
    {
        $this->forge->dropTable('booking');
    }
}
