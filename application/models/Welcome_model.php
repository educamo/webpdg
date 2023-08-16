<?Php

class Welcome_model extends CI_model
{
    public function getLogo($value = '')
    {
        $logo = $this->getConfig($value);
        return $logo;
    }
    public function getMap($value = '')
    {
        $map = $this->getConfig($value);
        return $map;
    }
    public function getTitle($value = '')
    {
        $title = $this->getConfig($value);
        return $title;
    }
    public function getAuthor($value = '')
    {
        $author = $this->getConfig($value);
        return $author;
    }
    public function getCompany($value = '')
    {
        $company = $this->getConfig($value);
        return $company;
    }
    public function getDomain($value = '')
    {
        $domain = $this->getConfig($value);
        return $domain;
    }
    public function getDEscription($value = '')
    {
        $description = $this->getConfig($value);
        return $description;
    }
    public function getContactmail($value = '')
    {
        $contactMail = $this->getConfig($value);
        return $contactMail;
    }
    public function getKeywords($value = '')
    {
        $keyWords = $this->getConfig($value);
        return $keyWords;
    }
    public function getRedes()
    {
        $datos = array(
            'campos' => 'socialName, socialIcon, socialUrl',
            'tabla'  => 'nu_social',
        );

        $social = $this->getData($datos);
        return $social;
    }
    public function getModules()
    {
        $datos = array(
            'campos' => 'moduleId, moduleName, moduleDescription',
            'tabla'  => 'nu_modules',
        );
        $modules = $this->getData($datos);
        return $modules;
    }
    public function getSlider()
    {
        $datos = array(
            'campos' => "sliderImagen, sliderTitle, sliderText",
            'tabla'  => "nu_slider",
        );
        $slider = $this->getData($datos);
        return $slider;
    }
    public function getProjects()
    {
        $datos = array(
            'campos' => "projectImagen, projectTitle, projectDescription",
            'tabla'  => "nu_projects",
        );
        $projects = $this->getData($datos);
        return $projects;
    }
    public function getCategorys()
    {
        $datos = array(
            'campos' => "categoryId, categoryName",
            'tabla'  => "nu_categorys",
        );
        $categorys = $this->getData($datos);
        return $categorys;
    }
    public function getServices($datos = NULL)
    {
        $datos = array(
            'campos' => "serviceId, serviceTitle, serviceImagen, servicePrice, serviceDescription, categoryId",
            'tabla'  => "nu_services",
        );
        $services = $this->getData($datos);
        return $services;
    }
    public function getAbout()
    {
        $datos = array(
            'campos' => "aboutTitle, aboutDescription, aboutModal",
            'tabla'  => "nu_about",
        );

        $abouts = $this->getData($datos);
        return $abouts;
    }
    public function getAboutmodal()
    {
        $datos = array(
            'campos' => "aboutTitle, aboutDescription, aboutModal",
            'tabla'  => "nu_about",
            'where'  => "aboutModal = 1",
        );

        $aboutsModal = $this->getData($datos);
        return $aboutsModal;
    }
    public function getPlantilla($value = '')
    {
        $plantilla = $this->getConfig($value);
        return $plantilla;
    }
    /**
     * función getConfig
     * realiza consulta a la bd buscando la configuración según el valor que recibe
     * devolviendo el nombre de la configuración y su valor siempre y cuando este activo
     *
     * @author César Carrasco <educamo@hotmail.com>
     * @param string $value
     *
     * @return $data (array)
     * @date: 2022/10/05
     */
    private function getConfig($value = '')
    {
        $this->db->select('configName, configValue');
        $this->db->from('nu_config');
        $this->db->where('configName', $value);
        $this->db->where('activo', 1);

        $query = $this->db->get();


        $num_filas = $query->num_rows();

        if (!($num_filas) || ($num_filas = 0)) {
            $data = '';
        } else {
            $data  = $query->row();
        }

        return $data;
    }
    private function getData($value = '')
    {
        if (isset($value['where'])) {
            $this->db->where($value['where']);
        }

        $this->db->select($value['campos']);
        $this->db->from($value['tabla']);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        $data  = $query->result_array();

        return $data;
    }

    public function __destruct()
    {
        $this->db->close();
    }
}
