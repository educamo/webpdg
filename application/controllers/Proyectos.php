<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Proyectos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('proyectos_model');
    }

    public function like($id = '')
    {

        $id = $_POST['id'];


        $data = $this->proyectos_model->like($id);

        $sumLike = $data->like;

        $sumLike = $sumLike + 1;

        $data = $this->proyectos_model->updateLike($id, $sumLike);

        $data = $this->proyectos_model->like($id);

        $like = $data->like;
        echo $like;
        return true;
    }
    public function disLike($id = '')
    {

        $id = $_POST['id'];


        $data = $this->proyectos_model->disLike($id);

        $sumLike = $data->noLike;

        $sumLike = $sumLike + 1;

        $data = $this->proyectos_model->updateDisLike($id, $sumLike);

        $data = $this->proyectos_model->disLike($id);

        $disLike = $data->noLike;
        echo $disLike;
        return true;
    }
}
