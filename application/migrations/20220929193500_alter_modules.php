<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Alter_modules extends CI_Migration
{

    public function up()
    {

        $this->db->query('
        ALTER TABLE nu_modules
MODIFY COLUMN fechaCreacion timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER usuarioModificacion;
');

        $this->db->query('
        ALTER TABLE nu_modules
MODIFY COLUMN fechaModificacion timestamp(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) AFTER fechaCreacion;
        ');
    }

    public function down()
    {
        $this->dbforge->drop_table('nu_modules', true);
    }
}
