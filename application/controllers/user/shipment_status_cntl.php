<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/21/15
 * Time: 9:25 AM
 * To change this template use File | Settings | File Templates.
 */

class Shipment_status_cntl extends CI_Controller
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

        if ($this->session->userdata('logged_in') !== FALSE){

            $user_id = $this->session->userdata['logged_in']['user_id'];
            $loc_id = $this->session->userdata['logged_in']['loc_id'];


            $s_date = date('Y-m-d', strtotime('-1 day'));

            $data['s_date'] = $s_date;
            $data['t_date'] = $s_date;

            $data['query'] = $this->list_shipment_model->get_user_shipments($s_date);


            $data['s_truck'] = "";

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

            $menu['main_menu'] = "in,ship_stat";

            $this->load->view('user/page_adders/sidebar_menu',$menu);
            $this->load->view('user/shipment_status_view',$data);

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


        $truck_id = $this->input->post('truck_id');

        $data['s_date'] = $f_date;
        $data['t_date'] = $t_date;

        $data['s_truck'] = $truck_id;

        if($truck_id == '0')
        {
            $data['query'] = $this->shipment_status_model->get_user_shipments($f_date,$t_date);

        }
        else
        {
            $data['query'] = $this->shipment_status_model->get_by_truck($f_date,$t_date,$truck_id);
        }


        $this->load->view('user/page_adders/header');

        $menu['main_menu'] = "in,ship_stat";

        $this->load->view('user/page_adders/sidebar_menu',$menu);
        $this->load->view('user/shipment_status_view',$data);
    }

/*not in use
 *     function get_by_truck()
    {
        $truck_no = $this->input->post('truck_id');


        get active truck numbers
        $data['trucks'] = $this->add_shipment_model->get_trucks();


        $data['query'] = $this->shipment_status_model->get_by_truck($truck_no);


        $this->load->view('user/page_adders/header');

        $menu['main_menu'] = "status,ship_stat";

        $this->load->view('user/page_adders/sidebar_menu',$menu);
        $this->load->view('user/shipment_status_view',$data);
    }*/

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

        $status = $this->input->post('status');

        $ship_id = $this->input->post('shipping_id');

        $data['trucks'] = $this->add_shipment_model->get_trucks();

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

            }
        }

        redirect('user/shipment_status_cntl');

      }
      else
      {
            redirect('login/logout');
      }
    }




}