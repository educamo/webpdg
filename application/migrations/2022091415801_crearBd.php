<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_crearDb extends CI_Migration {

        public function up()
        {
            $this->dbforge->create_database('db_pdg');
        }

        public function down()
        {
            $this->dbforge->drop_database('db_pdg');
        }
}