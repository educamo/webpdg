<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_services extends CI_Migration
{

    public function up()
    {
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
                'default' =>  '0000-00-00 00:00:00',
            ),
            'fechaModificacion' => array(
                'type' => 'timestamp',
                'null' => FALSE,
                'default' => '0000-00-00 00:00:00',
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
                'default' => '0',
            ),
        ));
        $this->dbforge->add_key('serviceId', TRUE);
        $this->dbforge->create_table('nu_services');

        $this->db->query('
        ALTER TABLE nu_services
MODIFY COLUMN fechaCreacion timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER usuarioModificacion;
');

        $this->db->query('
        ALTER TABLE nu_services
MODIFY COLUMN fechaModificacion timestamp(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) AFTER fechaCreacion;
        ');

        $this->db->query('
        ALTER TABLE `db_pdg`.`nu_services` 
MODIFY COLUMN `servicePrice` double(20, 2) NOT NULL AFTER `serviceImagen`;
        ');

    }

    public function down()
    {
        $this->dbforge->drop_table('nu_services', true);
    }
}
