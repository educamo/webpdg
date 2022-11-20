<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_config extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'configId' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                'unsigned' => TRUE,
                        ),
                        'configName' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'configValue' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '250',
                                'null' => FALSE,
                        ),
                        'configDescription' => array(
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
                            'type' => 'DATE',
                            'null' => TRUE,
                        ),
                        'fechaModificacion' => array(
                            'type' => 'DATE',
                            'null' => TRUE,
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
                            'Default' => 1,
                        ),
                ));
                $this->dbforge->add_key('configId', TRUE);
                $this->dbforge->create_table('nu_config');
        }

        public function down()
        {
                $this->dbforge->drop_table('nu_config', true);
        }
}