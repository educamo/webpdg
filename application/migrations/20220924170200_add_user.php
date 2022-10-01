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
                $this->dbforge->add_key('userId', TRUE);
                $this->dbforge->create_table('nu_users');
        }

        public function down()
        {
                $this->dbforge->drop_table('nu_users', true);
        }
}