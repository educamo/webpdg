<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_insert_rol extends CI_Migration
{

    public function up()
    {
        $this->db->insert('nu_rols', [
            'rolId'           => '1',
            'rolName'         => 'Administrador',
            'rolDescription'  => 'tiene permiso de super usuario para modificar cualquier aspecto del sitio',
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_table('nu_rols', true);
    }
}
