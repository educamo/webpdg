<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_insert_modules extends CI_Migration
{

    public function up()
    {
        ## social-icons ================
        $this->db->insert('nu_modules', [
            'moduleId'    => '1',
            'moduleName'  => 'social-icons',
            'moduleDescription'  => 'barra de iconos de redes sociales en el siderbar',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ## slider ==============
        $this->db->insert('nu_modules', [
            'moduleId'    => 'slider',
            'moduleName'  => 'slider',
            'moduleDescription'  => 'modulo del slider de imágenes',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ## proyectos ================
        $this->db->insert('nu_modules', [
            'moduleId'    => 'featured',
            'moduleName'  => 'Proyectos - Recientes',
            'moduleDescription'  => 'Estos son solo algunos de nuestros trabajos de mayor calidad Puedes darles un vistazo y decidirlo tu mismo.',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ## Servicios ==============
        $this->db->insert('nu_modules', [
            'moduleId'    => 'projects',
            'moduleName'  => 'Servicios - Ofrecidos',
            'moduleDescription'  => 'Aqui tenemos algunos de nuestro proyectos mas recientes, puedes mirarlos y decidir por tu mismo. ¿Cual es tu favorito?',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ## nosotros ===============
        $this->db->insert('nu_modules', [
            'moduleId'    => 'video',
            'moduleName'  => 'Cual es el objetivo de nuestra - Compañía',
            'moduleDescription'  => '<p>Cosmo <em>Imagine</em> te ofrece un servicio de calidad cuando se trata de cumplir las expectativas del cliente en base al tipo de diseño que ha elegido <br> al igual con la eficiencia y creatividad del mismo.</p>',
            'usuarioCreacion'       => '1',
            'usuarioModificacion' => '0',
            'fechaCreacion' => '',
            'fechaModificacion' => '0000-00-00 00:00:00',
            'ipCreacion' => '127.0.0.0',
            'ipModificacion' => '000.000.000.000',
            'activo' => '1',
        ]);
        ##   contacto ===============
        $this->db->insert('nu_modules', [
            'moduleId'    => 'contact',
            'moduleName'  => 'Contacta a - Nuestro Equipo',
            'moduleDescription'  => 'lCurabitur hendrerit mauris mollis ipsum vulputate rutrum. Phasellus luctus odio eget dui imperdiet.',
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
        $this->dbforge->drop_table('nu_modules', true);
    }
}
