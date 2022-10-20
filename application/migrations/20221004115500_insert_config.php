<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_insert_config extends CI_Migration {

        public function up()
        {
                $this->db->insert('nu_config', [
                    'configId' => 'Map',
                    'configName' => 'Mapa',
                    'configValue' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424.01823977953916!2d-72.36756770237544!3d7.693578184167264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e663e439229c16f%3A0xa0e8d1a10fc2c852!2sRubio%205030%2C%20T%C3%A1chira!5e1!3m2!1ses!2sve!4v1663280352794!5m2!1ses!2sve',
                    'configDescription' => 'url del mapa de googlemaps',
                    'usuarioCreacion' => '1',
                    'usuarioModificacion' => '0',
                    'ipCreacion' => '127.0.0.0',
                    'ipModificacion' => '0.0.0.0',
                    'activo' => 1,
                ]);

                $this->db->insert('nu_config', [
                        'configId' => 'mailEmp',
                        'configName' => 'emailcontacto',
                        'configValue' => 'contacto@empresa.com',
                        'configDescription' => 'Correo del formulario de contacto',
                        'usuarioCreacion' => '1',
                        'usuarioModificacion' => '0',
                        'ipCreacion' => '127.0.0.0',
                        'ipModificacion' => '0.0.0.0',
                        'activo' => 1,
                    ]);

                    $this->db->insert('nu_config', [
                            'configId' => 'Emp',
                            'configName' => 'nombreEmpresa',
                            'configValue' => 'CosmoImagen',
                            'configDescription' => 'El nombre de la Empresa',
                            'usuarioCreacion' => '1',
                            'usuarioModificacion' => '0',
                            'ipCreacion' => '127.0.0.0',
                            'ipModificacion' => '0.0.0.0',
                            'activo' => 1,
                        ]);

                    $this->db->insert('nu_config', [
                            'configId' => 'Design',
                            'configName' => 'Design',
                            'configValue' => 'C. Carrasco',
                            'configDescription' => 'Nombre del desarrollador en el footer',
                            'usuarioCreacion' => '1',
                            'usuarioModificacion' => '0',
                            'ipCreacion' => '127.0.0.0',
                            'ipModificacion' => '0.0.0.0',
                            'activo' => 1,
                        ]);

                    $this->db->insert('nu_config', [
                            'configId' => 'Ttl',
                            'configName' => 'title',
                            'configValue' => 'Cosmo Imagine - Diseñadora Gráfica',
                            'configDescription' => 'Titulo del website',
                            'usuarioCreacion' => '1',
                            'usuarioModificacion' => '0',
                            'ipCreacion' => '127.0.0.0',
                            'ipModificacion' => '0.0.0.0',
                            'activo' => 1,
                        ]);

                    $this->db->insert('nu_config', [
                            'configId' => 'Dom',
                            'configName' => 'Dominio',
                            'configValue' => 'www.cosmoimagen.com',
                            'configDescription' => 'El dominio del sitio web',
                            'usuarioCreacion' => '1',
                            'usuarioModificacion' => '0',
                            'ipCreacion' => '127.0.0.0',
                            'ipModificacion' => '0.0.0.0',
                            'activo' => 1,
                        ]);

                    $this->db->insert('nu_config', [
                            'configId' => 'Descp',
                            'configName' => 'Description',
                            'configValue' => 'SitioWeb de la marca de diseño gráfico cosmo imagine.',
                            'configDescription' => 'Descripción del sitioweb',
                            'usuarioCreacion' => '1',
                            'usuarioModificacion' => '0',
                            'ipCreacion' => '127.0.0.0',
                            'ipModificacion' => '0.0.0.0',
                            'activo' => 1,
                        ]);

                    $this->db->insert('nu_config', [
                            'configId' => 'Logo',
                            'configName' => 'Logo',
                            'configValue' => 'Logo.jpg',
                            'configDescription' => 'El logo del sitio web o de la empresa',
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