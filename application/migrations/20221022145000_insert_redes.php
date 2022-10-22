<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_insert_redes extends CI_Migration
{

    public function up()
    {
        ## facebook ================
        $this->db->insert('nu_social', [
            'socialId'    => '1',
            'socialName'  => 'Facebook',
            'socialDescription'  => 'link de Facebook',
            'socialIcon'      => 'fa-facebook',
            'socialUrl'     => 'http://facebook.com',
            'moduleId'      => '1',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ## instagram ==============
        $this->db->insert('nu_social', [
            'socialId'    => '2',
            'socialName'  => 'Instagram',
            'socialDescription'  => 'link de Instagram',
            'socialIcon'      => 'fa-instagram',
            'socialUrl'     => 'http://instagram.com',
            'moduleId'      => '1',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ## youtube ================
        $this->db->insert('nu_social', [
            'socialId'    => '3',
            'socialName'  => 'Youtube',
            'socialDescription'  => 'link de Youtube',
            'socialIcon'      => 'fa-youtube',
            'socialUrl'     => 'http://youtube.com',
            'moduleId'      => '1',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ## linkedin ==============
        $this->db->insert('nu_social', [
            'socialId'    => '4',
            'socialName'  => 'Linkedin',
            'socialDescription'  => 'link de Linkedin',
            'socialIcon'      => 'fa-linkedin',
            'socialUrl'     => 'http://linkedin.com',
            'moduleId'      => '1',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ## twitter ===============
        $this->db->insert('nu_social', [
            'socialId'    => '5',
            'socialName'  => 'Twitter',
            'socialDescription'  => 'link de Twitter',
            'socialIcon'      => 'fa-twitter',
            'socialUrl'     => 'http://twitter.com',
            'moduleId'      => '1',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ##   RSS ===============
        $this->db->insert('nu_social', [
            'socialId'    => '6',
            'socialName'  => 'Rss',
            'socialDescription'  => 'link de Rss',
            'socialIcon'      => 'fa-rss',
            'socialUrl'     => 'http://rss.com',
            'moduleId'      => '1',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_table('nu_social', true);
    }
}
