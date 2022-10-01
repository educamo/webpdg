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
                $this->dbforge->add_key('configId', TRUE);
                $this->dbforge->create_table('nu_config');
        }

        public function down()
        {
                $this->dbforge->drop_table('nu_config', true);
        }
}