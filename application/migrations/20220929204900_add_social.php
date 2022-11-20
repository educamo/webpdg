<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_social extends CI_Migration {

        public function up()
        {
            $fecha = date('Y-m-d H:i:s');
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
                $this->dbforge->add_key('socialId', TRUE);
                $this->dbforge->create_table('nu_social');
        }

        public function down()
        {
                $this->dbforge->drop_table('nu_social', true);
        }
}