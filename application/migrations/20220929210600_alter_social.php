<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Alter_social extends CI_Migration
{

    public function up()
    {

        $this->db->query('
        ALTER TABLE nu_social
MODIFY COLUMN fechaCreacion timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER usuarioModificacion;
');

        $this->db->query('
        ALTER TABLE nu_social
MODIFY COLUMN fechaModificacion timestamp(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) AFTER fechaCreacion;
        ');
    }

    public function down()
    {
        $this->dbforge->drop_table('nu_social', true);
    }
}
