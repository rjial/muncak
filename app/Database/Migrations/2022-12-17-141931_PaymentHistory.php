<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentHistory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_payment'              => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'date' => [
                'type'              => 'DATE',
            ],
            'status'   => [
                'type'              => 'ENUM',
                'constraint'        => "'Complete','In Progress'",
            
            ],
        ]);
        $this->forge->addPrimaryKey('no_payment');
        //$this->forge->addForeignKey('id_pemimpin', 'pemimpin', 'id_pemimpin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('payment_history');
    }

    public function down()
    {
        $this->forge->dropTable('payment_history');
    }
}
