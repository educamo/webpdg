<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_insert_config extends CI_Migration {

        public function up()
        {
                $this->db->insert('nu_config', [
                    'configId' => 'kywds',
                    'configName' => 'keywords',
                    'configValue' => 'Diseño, gráfico, logos, pendones, impresiones, tachira, rubio, Venezuela',
                    'configDescription' => 'Palabras claves para SEO',
                    'usuarioCreacion' => '1',
                    'usuarioModificacion' => '0',
                    'ipCreacion' => '127.0.0.0',
                    'ipModificacion' => '0.0.0.0',
                    'activo' => 1,
                ]);

                }

        public function down()
        {
                $this->dbforge->drop_table('nu_config', true);
        }
}