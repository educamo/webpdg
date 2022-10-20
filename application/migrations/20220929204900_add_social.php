<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_social extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'socialId' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '16',
                                'unsigned' => TRUE,
                        ),
                        'socialName' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'socialDescription' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '250',
                                'null' => FALSE,
                        ),
                        'socialIcon' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE,
                        ),
                        'socialUrl' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '250',
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
                $this->dbforge->add_key('socialId', TRUE);
                $this->dbforge->create_table('nu_social');
        }

        public function down()
        {
                $this->dbforge->drop_table('nu_social', true);
        }
}