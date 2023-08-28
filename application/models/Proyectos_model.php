<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Proyectos_model extends CI_Model
{

    public function like($id = '')
    {

        $this->db->select('like');
        $this->db->from('nu_projects');
        $this->db->where('projectId', $id);

        $query = $this->db->get();
        return $query->row();
    }
    public function disLike($id = '')
    {

        $this->db->select('noLike');
        $this->db->from('nu_projects');
        $this->db->where('projectId', $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function updateLike($id ='', $sumLike ='')
     {
        $this->db->set('like', $sumLike);
        $this->db->where('projectId', $id);
        $this->db->update('nu_projects');

        return $this->db->affected_rows();
    }
    public function updateDislike($id ='', $sumLike ='')
     {
        $this->db->set('noLike', $sumLike);
        $this->db->where('projectId', $id);
        $this->db->update('nu_projects');

        return $this->db->affected_rows();
    }
}
