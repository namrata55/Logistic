<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/11/15
 * Time: 10:00 AM
 * To change this template use File | Settings | File Templates.
 */

class List_shipment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
         $this->load->model('user/list_shipment_model');
        $this->load->model('user/view_shipment_model');

        $this->load->model('user/add_shipment_model');

    }


    function index()
    {
        if ($this->session->userdata('logged_in') !== FALSE){

            $user_id = $this->session->userdata['logged_in']['user_id'];
            $loc_id = $this->session->userdata['logged_in']['loc_id'];

            $s_date = date('Y-m-d');

            $data['s_date'] = $s_date;

            $data['query'] = $this->list_shipment_model->get_user_shipments($s_date);

            /*get active truck numbers*/
            $data['trucks'] = $this->add_shipment_model->get_trucks();
            /*get the location*/
            $data['loc'] = $this->add_shipment_model->get_loc();
            /*get all the status*/
            $data['status'] = $this->add_shipment_model->get_status();

            $data['origin_p'] = $this->add_shipment_model->get_origin($loc_id);

            $data['user_id'] = $user_id;

            $this->load->view('user/page_adders/header');

            $menu['main_menu'] = "in,list_ship";

            $this->load->view('user/page_adders/sidebar_menu',$menu);

            $this->load->view('user/list_shipement_view',$data);


        }
        else
        {
            redirect('login/logout');
        }


    }

    /*insert and update the shipment status*/
    function update_status()
    {

        $ship_id = $this->input->post('ship_id');
        $status_id = $this->input->post('status_id');
        $user_id = $this->input->post('user_id');
        $st_date = $this->input->post('sc_date');
        $st_time = $this->input->post('sc_time');

        $data = array('shipment_id'=>$ship_id,'status_id'=>$status_id,'user_id'=>$user_id,'st_date'=>$st_date,'st_time'=>$st_time);
        $this->list_shipment_model->insert_shipment_status($data);

        $dt = array('status_id'=>$status_id);

        $this->list_shipment_model->update_shipment_status($dt,$ship_id);

        redirect('user/list_shipment');
    }

    function get_shipment_status()
    {

        $dat = file_get_contents("php://input");
        $dat = json_decode($dat,true);

        foreach ($dat as $key) {
            # code...
            foreach ($key as $row) {

                # code...
                $ship_id = $row;
            }
        }


        $data = $this->list_shipment_model->get_shipment($ship_id);

        echo '<table class="table table-striped">
                <tbody><tr>
                <th style="width: 10px">#</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>';
        $i = 1;
        foreach($data as $row)
        {
            echo "<tr>
                <td>$i</td>
                <td>$row->st_date</td>
                <td>$row->st_time</td>
                <td>$row->status</td>
            </tr>";
            $i ++;
        }

        echo "</tbody></table>";


    }

    /*format date with respect to the sql yyyy-mm-dd */
    function format_date($date_f)
    {
        $fd = explode("/",$date_f);

        return $fd[2].'-'.$fd[1].'-'.$fd[0];

    }
}