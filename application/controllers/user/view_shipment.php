<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/9/15
 * Time: 10:37 AM
 * To change this template use File | Settings | File Templates.
 */

class View_shipment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user/view_shipment_model');

        $this->load->model('user/add_shipment_model');

        $this->load->model('admin/material_model');

        date_default_timezone_set('Asia/Kolkata');
    }

    function index()
    {
        if ($this->session->userdata('logged_in') !== FALSE){

            $user_id = $this->session->userdata['logged_in']['user_id'];
            $loc_id = $this->session->userdata['logged_in']['loc_id'];

            $s_date = date('Y-m-d');

            $data['s_date'] = $s_date;


            $data['query'] = $this->view_shipment_model->get_user_shipments($user_id , $s_date);

            /*get active truck numbers*/
            $data['trucks'] = $this->add_shipment_model->get_trucks();
            /*get the location*/
            $data['loc'] = $this->add_shipment_model->get_loc();
            /*get all the status*/
            $data['status'] = $this->add_shipment_model->get_status();

            /*Add materials*/

            $data['materials'] = $this->material_model-> get_meterial();


            /*get the LR id*/
            $data['id'] = $this->add_shipment_model->get_id();

            $data['origin_p'] = $this->add_shipment_model->get_origin($loc_id);


             /*print_r($data);*/

            $this->load->view('user/page_adders/header');

            $menu['main_menu'] = "out,view_ship";

            $this->load->view('user/page_adders/sidebar_menu',$menu);

            $this->load->view('user/view_shipement_view',$data);
        }
        else
        {
            redirect('login/logout');
        }
    }


}