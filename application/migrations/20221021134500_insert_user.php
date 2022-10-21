<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_insert_user extends CI_Migration
{

    public function up()
    {
        $this->db->insert('nu_users', [
            'userId'    => '1',
            'userName'  => 'Administrador',
            'password'  => '123456',
            'mail'      => 'admin@pdg.com',
            'rolId'     => '1',
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_table('nu_users', true);
    }
}