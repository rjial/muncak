<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gunung extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gunung'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'nama'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'deskripsi'              => [
                'type'              => 'TEXT',
            ],
            'url_gunung'            => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],
            'book_available'        => [
                'type'              => 'INT'
            ],
            'harga_masuk'        => [
                'type'              => 'INT'
            ],
            'tanggal_awal'        => [
                'type'              => 'DATE'
            ],
            'tanggal_akhir'        => [
                'type'              => 'DATE'
            ],
        ]);

        $this->forge->addPrimaryKey('id_gunung');
        $this->forge->createTable('gunung'); 
    }

    public function down()
    {
        $this->forge->dropTable('gunung'); 
    }
}
