<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_about extends CI_Migration
{

    public function up()
    {
        $fecha = date('Y-m-d H:i:s');
        $this->dbforge->add_field(array(
            'aboutId' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'unsigned' => TRUE,
            ),
            'aboutTitle' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'aboutDescription' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => FALSE,
            ),
            'aboutModal' => array(
                'type' => 'INT',
                'constraint' => '1',
                'default' => 0,
            ),
            'moduleId' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'unsigned' => TRUE,
            ),
            'usuarioCreacion' => array(
                'type' => 'VARCHAR',
                'constraint' => '16',
                'null' => TRUE,
            ),
            'usuarioModificacion' => array(
                'type' => 'VARCHAR',
                'constraint' => '16',
                'null' => TRUE,
            ),
            'fechaCreacion' => array(
                'type' => 'timestamp',
                'null' => TRUE,
                'default' =>  $fecha,
            ),
            'fechaModificacion' => array(
                'type' => 'timestamp',
                'null' => TRUE,
                'default' => $fecha,
            ),
            'ipCreacion' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => TRUE,
            ),
            'ipModificacion' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => TRUE,
            ),
            'activo' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => TRUE,
                'default' => 1,
            ),
        ));
        $this->dbforge->add_key('aboutId', TRUE);
        $this->dbforge->create_table('nu_about');

        $this->db->query('
        ALTER TABLE nu_about
MODIFY COLUMN fechaCreacion timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP AFTER usuarioModificacion;
');

        $this->db->query('
        ALTER TABLE nu_about
MODIFY COLUMN fechaModificacion timestamp(0) NULL ON UPDATE CURRENT_TIMESTAMP(0) AFTER fechaCreacion;
        ');

    }

    public function down()
    {
        $this->dbforge->drop_table('nu_about', true);
    }
}
