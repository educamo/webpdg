<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'userId' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '16',
                                'unsigned' => TRUE,
                        ),
                        'userName' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),
                        'mail' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE,
                        ),
                        'rolId' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '10',
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
                $this->dbforge->add_key('userId', TRUE);
                $this->dbforge->create_table('nu_users');
        }

        public function down()
        {
                $this->dbforge->drop_table('nu_users', true);
        }
}