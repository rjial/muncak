<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id_users'              => [
                    'type'              => 'INT',
                    'constraint'        => 11,
                    'unsigned'          => true,
                    'auto_increment'    => true,
                ],
                'username'              => [
                    'type'              => 'VARCHAR',
                    'constraint'        => '20',
                ],
                'email'                 => [
                    'type'              => 'VARCHAR',
                    'constraint'        => '200',
                ],
                'password'              => [
                    'type'              => 'VARCHAR',
                    'constraint'        => '255',
                ],
                'nama_users'                  => [
                    'type'              => 'VARCHAR',
                    'constraint'        => '255',
                ],
                'jenis_kelamin_users'   => [
                    'type'              => 'ENUM',
                    'constraint'        => "'pria','wanita'",
                
                ],
                'no_identitas_users'    => [
                    'type'              => 'VARCHAR',
                    'constraint'        => '20',
                ],
                'no_hp_users'           => [
                    'type'              => 'VARCHAR',
                    'constraint'        => '15',
                ],
                'alamat_users'                => [
                    'type'              => 'VARCHAR',
                    'constraint'        => '100'
                ],
                'created_at'            => [
                    'type'              => 'DATETIME',
                    'null'              => true,
                ],
                'updated_at'            => [
                    'type'              => 'DATETIME',
                    'null'              => true,
                ]
            ]);

            $this->forge->addPrimaryKey('id_users');
            $this->forge->createTable('users'); 
    }

    public function down()
    {
        $this->forge->dropTable('users'); 
    }
}
