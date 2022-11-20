<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_categorys extends CI_Migration
{

    public function up()
    {
        $fecha = date('Y-m-d H:i:s');
        $this->dbforge->add_field(array(
            'categoryId' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'unsigned' => TRUE,
            ),
            'categoryName' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'categoryDescription' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => FALSE,
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
        $this->dbforge->add_key('categoryId', TRUE);
        $this->dbforge->create_table('nu_categorys');

        $this->db->query('
        ALTER TABLE nu_categorys
MODIFY COLUMN fechaCreacion timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP AFTER usuarioModificacion;
');

        $this->db->query('
        ALTER TABLE nu_categorys
MODIFY COLUMN fechaModificacion timestamp(0) NULL ON UPDATE CURRENT_TIMESTAMP(0) AFTER fechaCreacion;
        ');

    }

    public function down()
    {
        $this->dbforge->drop_table('nu_categorys', true);
    }
}
