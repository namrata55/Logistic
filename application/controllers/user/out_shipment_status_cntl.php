<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/21/15
 * Time: 9:25 AM
 * To change this template use File | Settings | File Templates.
 */

class Out_shipment_status_cntl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user/list_shipment_model');
        $this->load->model('user/view_shipment_model');

        $this->load->model('user/add_shipment_model');

        $this->load->model('user/shipment_status_model');

        date_default_timezone_set('Asia/Kolkata');
    }

    function index()
    {

        if ($this->session->userdata('logged_in') !== FALSE ){

            $user_id = $this->session->userdata['logged_in']['user_id'];
            $loc_id = $this->session->userdata['logged_in']['loc_id'];


            $s_date = date('Y-m-d');

            $data['s_date'] = $s_date;

            $data['query'] = $this->shipment_status_model->get_user_out_shipments($user_id,$s_date);

            /*get active truck numbers*/
            $data['trucks'] = $this->add_shipment_model->get_trucks();

            /*Driver name*/
            $data['driver'] = $this->shipment_status_model->get_drivers();

            /*get the location*/
            $data['loc'] = $this->add_shipment_model->get_loc();
            /*get all the status*/
            $data['status'] = $this->add_shipment_model->get_status();

            $data['origin_p'] = $this->add_shipment_model->get_origin($loc_id);

            $data['user_id'] = $user_id;

            $this->load->view('user/page_adders/header');

            $menu['main_menu'] = "out,out_ship_stat";

            $this->load->view('user/page_adders/sidebar_menu',$menu);
            $this->load->view('user/out_shipment_status_view',$data);

        }
        else
        {
            redirect('login/logout');
        }

    }


    function insert_item()
    {
        echo $this->input->post('date_f');
    }

    function get_by_date()
    {
        /*get active truck numbers*/
        $data['trucks'] = $this->add_shipment_model->get_trucks();

        /*Driver name*/
        $data['driver'] = $this->shipment_status_model->get_drivers();

        /*get all the status*/
        $data['status'] = $this->add_shipment_model->get_status();

        $dt = $this->input->post('date_f');

        $split_dt = explode("-",$dt);

        $f_date = $this->sql_date_convertion($split_dt[0]);

        $t_date = $this->sql_date_convertion($split_dt[1]);

        $data['query'] = $this->shipment_status_model->get_user_out_shipmentsbydate ($f_date , $t_date);


        $this->load->view('user/page_adders/header');

        $menu['main_menu'] = "out,out_ship_stat";

        $this->load->view('user/page_adders/sidebar_menu',$menu);
        $this->load->view('user/out_shipment_status_view',$data);
    }


    function sql_date_convertion($dat)
    {
        $dt = explode("/",$dat);

        return $dt[2].'-'.$dt[0].'-'.$dt[1];
    }

    function load_truck()
    {
        if ($this->session->userdata('logged_in') !== FALSE){

        $user_id = $this->session->userdata['logged_in']['user_id'];
        $loc_id = $this->session->userdata['logged_in']['loc_id'];

        date_default_timezone_set('Asia/Kolkata');

        $truck_no = $this->input->post('truck_no');
        $dirver = $this->input->post('driver');
        $status = $this->input->post('status');


        $ship_id = $this->input->post('shipping_id');


        /*Status date and time*/
       echo  $s_time = date('h:i:s A');
       echo  $s_date = date('d-m-Y');

        if(!empty($ship_id))
        {
            foreach($ship_id as $row)
            {
                echo $row;

                /*store into status_master */
                $data = array('shipment_id'=>$row,'status_id'=>$status,'user_id'=>$user_id,'st_date'=>$s_date,'st_time'=>$s_time);
                $this->list_shipment_model->insert_shipment_status($data);

                /*update the status of shipment_master*/

                $dt = array('status_id'=>$status);

                $this->list_shipment_model->update_shipment_status($dt,$row);


                $data_truck = array('truck_id'=>$truck_no,'driver_id'=>$dirver,'shipment_id'=>$row);
                $this->shipment_status_model->load_truck($data_truck);
            }
        }

        redirect('user/out_shipment_status_cntl');

      }
      else
      {
            redirect('login/logout');
      }
    }

    /*print all consignment*/
    function print_all_consignment()
    {
        $date_t = $this->input->post('date_t');
        $date_t = str_replace(' ', '', $date_t);
        $dat  = explode("-",$date_t);

        $from = $this->sql_date_convertion($dat[0]);
        $to = $this->sql_date_convertion($dat[1]);

        $data['query'] = $this->shipment_status_model->get_user_out_shipmentsbydate ($from , $to);

        $data['from'] = $from;
        $data['to'] = $to;

        $this->load->view('user/print_all_consignment',$data);
    }
}