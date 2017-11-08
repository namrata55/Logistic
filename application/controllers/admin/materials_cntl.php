<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/14/15
 * Time: 1:40 PM
 * To change this template use File | Settings | File Templates.
 */

    class Materials_cntl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/material_model');
    }

    function index()
    {
        $menu['main_menu'] = "setting,mat";
        $this->load->view('page_adders/header');
        $this->load->view('page_adders/sidebar_menu',$menu);

        $data['query']= $this->material_model->get_meterial();

        $this->load->view('admin/material_view',$data);
    }

    function insert_material()
    {
        $item = $this->input->post('material');
        $action = $this->input->post('action');


        if($action == '0')
        {
            $data = array('material'=>$item);
            $this->material_model->insert_material($data);
        }
        else{
            $id = $this->input->post('id');

            $data = array('material'=>$item);

            $this->material_model->update_mat($data,$id);
        }

        redirect('admin/materials_cntl');

    }

    function delete_mat()
    {
        $id = $this->input->post('id');

         $this->material_model->delete_mat($id);
    }
}