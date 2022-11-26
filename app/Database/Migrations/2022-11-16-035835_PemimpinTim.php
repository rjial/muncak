<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemimpinTim extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id_pemimpin'           => [
            'type'              => 'INT',
            'constraint'        => 11,
            'unsigned'          => true,
            'auto_increment'    => true,
        ],
        'nama_pemimpin_tim'              => [
            'type'              => 'varchar',
            'constraint'        => '50',
        ],
        'no_identitas'              => [
            'type'              => 'varchar',
            'constraint'        => '15',
        ],
        'no_hp_pemimpin'           => [
            'type'              => 'VARCHAR',
            'constraint'        => '15',
        ],
        'tempat_lahir'              => [
            'type'              => 'varchar',
            'constraint'        => '20',
        ],
        'tanggal_lahir'              => [
            'type'              => 'DATE',
        ],
        'desa_kelurahan'              => [
        'type'              => 'varchar',
        'constraint'        => '50',
        ],
        'kecamatan'              => [
            'type'              => 'varchar',
            'constraint'        => '50',
        ],
        'kota'              => [
            'type'              => 'varchar',
            'constraint'        => '50',
        ],
        'provinsi'              => [
            'type'              => 'varchar',
            'constraint'        => '50',
        ],
        'alamat_lengkap'              => [
            'type'              => 'varchar',
            'constraint'        => '75',
        ]
    ]);
        $this->forge->addPrimaryKey('id_pemimpin');
        $this->forge->createTable('pemimpin_tim');
        //$this->forge->addForeignKey('id_anggota', 'anggota', 'id_anggota', 'CASCADE', 'CASCADE');
    }
    public function down()
    {
        $this->forge->dropTable('pemimpin_tim'); 
    }
}
