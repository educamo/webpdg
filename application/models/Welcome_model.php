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
        $data = $query->row();

        return $data;
    }

    public function __destruct()
    {
        $this->db->close();
    }
}
