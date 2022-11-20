<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_slider extends CI_Migration
{

    public function up()
    {
        $fecha = date('Y-m-d H:i:s');
        $this->dbforge->add_field(array(
            'sliderId' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'sliderImagen' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'sliderTitle' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'SliderText' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => FALSE,
            ),
            'moduleId' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'unsigned' => TRUE,
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
                'type' => 'timestamp',
                'null' => FALSE,
                'default' =>  $fecha,
            ),
            'fechaModificacion' => array(
                'type' => 'timestamp',
                'null' => FALSE,
                'default' => $fecha,
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
                'default' => 1,
            ),
        ));
        $this->dbforge->add_key('sliderId', TRUE);
        $this->dbforge->create_table('nu_slider');

        $this->db->query('
        ALTER TABLE nu_slider
MODIFY COLUMN fechaCreacion timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP AFTER usuarioModificacion;
');

        $this->db->query('
        ALTER TABLE nu_slider
MODIFY COLUMN fechaModificacion timestamp(0) NULL ON UPDATE CURRENT_TIMESTAMP(0) AFTER fechaCreacion;
        ');

    }

    public function down()
    {
        $this->dbforge->drop_table('nu_slider', true);
    }
}
