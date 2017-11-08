<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/8/15
 * Time: 1:01 PM
 * To change this template use File | Settings | File Templates.
 */

class Status_cont extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/status_model');
    }

    function index()
    {
        $menu['main_menu'] = "setting,status";
        $this->load->view('page_adders/header');
        $this->load->view('page_adders/sidebar_menu',$menu);

        $data['query'] = $this->status_model->get_all_status();
        $this->load->view('admin/status_view',$data);
    }

    function insert_status()
    {
        $status = $this->input->post('status');
        $action_status = $this->input->post('action_status');

        $action = $this->input->post('action');

        if($action == "0")
        {
            $data = array('status'=>$status,'action_status'=>$action_status);
            $this->status_model->insert_status($data);
        }
        else{

            $id = $this->input->post('id');

            $data = array('status'=>$status,'action_status'=>$action_status);
            print_r($data);
            $this->status_model->update_status($data,$id);

        }

        redirect('admin/status_cont');
    }
}