<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/7/15
 * Time: 9:51 AM
 * To change this template use File | Settings | File Templates.
 */

class Truck_cont extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/truck_model');
        $this->load->model('admin/driver_model');
    }
    function index()
    {
        /*get driver name*/
        $data['query'] = $this->driver_model->get_active_drivers();

        /*get all trucks*/
        $data['query1'] = $this->truck_model->get_all_trucks();

        $menu['main_menu'] = "setting,truck";
        $this->load->view('page_adders/header');
        $this->load->view('page_adders/sidebar_menu',$menu);
       $this->load->view('admin/truck_view',$data);

    }

    function insert_tucks()
    {
        $truck_no = $this->input->post('truck_no');
        $driver_id = $this->input->post('driver');
        $status = $this->input->post('status');

        $tax_exp = $this->format_date($this->input->post('exp_date'));
        $puc_exp = $this->format_date($this->input->post('puc_exp_date'));
        $per_exp = $this->format_date($this->input->post('per_exp_date'));
        $inc_exp = $this->format_date($this->input->post('inc_exp_date'));
        $fit_exp = $this->format_date($this->input->post('fit_exp_date'));
        $model = $this->input->post('model_no');




        $action = $this->input->post('action');

        $truck_id = $this->input->post('truck_id');

        if($action == '1')
        {
            $data = array('truck_no'=>$truck_no,'model'=>$model,'tax_expiry'=>$tax_exp,'puc_expiry'=>$puc_exp,'permit_expiry'=>$per_exp,'insur_expiry'=>$inc_exp,'fit_expiry'=>$fit_exp,'driver_id'=>$driver_id,'status'=>$status);
            $this->truck_model->update_truck($data,$truck_id);
        }
        else{

            $data = array('truck_no'=>$truck_no,'model'=>$model,'tax_expiry'=>$tax_exp,'puc_expiry'=>$puc_exp,'permit_expiry'=>$per_exp,'insur_expiry'=>$inc_exp,'fit_expiry'=>$fit_exp,'driver_id'=>$driver_id,'status'=>$status);

            $this->truck_model->insert_trucks($data);

        }


        redirect('admin/truck_cont');
    }

    /*format date with respect to the sql yyyy-mm-dd */
    function format_date($date_f)
    {
        $fd = explode("/",$date_f);

        return $fd[2].'-'.$fd[1].'-'.$fd[0];

    }
}