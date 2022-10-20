<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_modules extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'moduleId' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'unsigned' => TRUE,
            ),
            'moduleName' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'moduleDescription' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => FALSE,
            ),
            'usuarioCreacion' => array(
                'type' => 'VARCHAR',
                'constraint' => '16',
                'null' => FALSE,
            ),
            'usuarioModificacion' => array(
                'type' => 'VARCHAR',
                'constraint' => '16',
                'null' => FALSE,
            ),
            'fechaCreacion' => array(
                'type' => 'DATE',
                'null' => FALSE,
            ),
            'fechaModificacion' => array(
                'type' => 'DATE',
                'null' => FALSE,
            ),
            'ipCreacion' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => FALSE,
            ),
            'ipModificacion' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => FALSE,
            ),
            'activo' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('moduleId', TRUE);
        $this->dbforge->create_table('nu_modules');
    }

    public function down()
    {
        $this->dbforge->drop_table('nu_modules', true);
    }
}
