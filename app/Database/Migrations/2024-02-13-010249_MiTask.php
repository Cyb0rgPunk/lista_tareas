<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MiTask extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_task'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_category'       => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'id_status'       => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ]
        ]);
        $this->forge->addKey('id_task', true);
        $this->forge->createTable('t_tasks');
    }

    public function down()
    {
        $this->forge->dropTable('t_tasks');
    }
}
