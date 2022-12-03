<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'id_booking' => [
                'type'              => 'INT',
                'constraint'        => 11,
            ],
            'total_biaya' => [
                'type'              => 'INT',
                'constraint'        => 11,
            ],
            'metode_pembayaran' => [
                'type'              => 'INT',
                'constraint'        => 11,
            ],
            'status_pembayaran' => [
                'type'              => 'INT',
                'constraint'        => 11,
            ],
        ]);
        $this->forge->addPrimaryKey('id_pembayaran');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
