<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MidSubs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_midsubs'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'orderid_subs'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'gross_amount_subs'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'transaction_id_subs'              => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ]
            ]);
            $this->forge->addPrimaryKey('id_midsubs');
            $this->forge->createTable('mid_subs');
    }

    public function down()
    {
        $this->forge->dropTable('mid_subs'); 
    }
}
