<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_services extends CI_Migration
{

    public function up()
    {
        $fecha = date('Y-m-d H:i:s');
        $this->dbforge->add_field(array(
            'serviceId' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'unsigned' => TRUE,
            ),
            'serviceTitle' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'serviceImagen' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'servicePrice' => array(
                'type' => 'DOUBLE',
                'decimal' => '2',
            ),
            'serviceDescription' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => FALSE,
            ),
            'categoryId' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
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
                'default' => 0,
            ),
        ));
        $this->dbforge->add_key('serviceId', TRUE);
        $this->dbforge->create_table('nu_services');

        $this->db->query('
        ALTER TABLE nu_services
MODIFY COLUMN fechaCreacion timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP AFTER usuarioModificacion;
');

        $this->db->query('
        ALTER TABLE nu_services
MODIFY COLUMN fechaModificacion timestamp(0) NULL ON UPDATE CURRENT_TIMESTAMP(0) AFTER fechaCreacion;
        ');

        $this->db->query('
        ALTER TABLE nu_services
MODIFY COLUMN servicePrice double(20, 2) NULL AFTER serviceImagen;
        ');

    }

    public function down()
    {
        $this->dbforge->drop_table('nu_services', true);
    }
}
