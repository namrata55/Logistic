<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/8/15
 * Time: 10:04 AM
 * To change this template use File | Settings | File Templates.
 */

class Add_shipment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('user/add_shipment_model');
        $this->load->model('admin/material_model');

        $this->load->model('user/view_shipment_model');
    }

    function index()
    {
        if ($this->session->userdata('logged_in') !== FALSE){

            $user_id = $this->session->userdata['logged_in']['user_id'];
            $loc_id = $this->session->userdata['logged_in']['loc_id'];

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

        $this->load->view('user/page_adders/header');
        $menu['main_menu'] = "add,add_ship";
        $this->load->view('user/page_adders/sidebar_menu',$menu);

        $this->load->view('user/add_shipment_view',$data);

        }

        else
        {
            redirect('login/logout');
        }
    }

    function insert_shipment()
    {


        if ($this->session->userdata('logged_in') !== FALSE){

            $user_id = $this->session->userdata['logged_in']['user_id'];
            $loc_id = $this->session->userdata['logged_in']['loc_id'];

            $r_no = $this->input->post('r_no');
            $s_name = $this->input->post('s_name');
            $s_contact = $this->input->post('s_contact');
            $qty = $this->input->post('qty');
            $r_name = $this->input->post('r_name');
            $r_contact = $this->input->post('r_cont');
            $r_add = $this->input->post('r_add');
            $r_date = $this->input->post('r_date');
            $origin = $this->input->post('origin');
            $dest = $this->input->post('dest');

            $status = $this->input->post('status');
            $price = $this->input->post('price');
            $h_charges = $this->input->post('h_charges');
            $total = $this->input->post('total');

            $mat = $this->input->post('mat');
            $b_date = $this->format_date ($this->input->post('b_date'));


            $date_f = $this->format_date($r_date);

           /* echo $date_f;*/
            $action = $this->input->post('action_type');

            /**/
            $msg ="";

            if($action == 0)
            {

                    $data = array('receipt_no'=> $r_no,'shipper_contact'=>$s_contact,'shipper_name'=>$s_name,'quantity'=>$qty,'status_id'=>$status,
                            'receiver_name'=>$r_name,'receiver_contact'=>$r_contact,'address'=>$r_add,'shipping_date'=>$date_f,'origin'=>$origin,'destination'=>$dest,'status_id'=>$status,
                            'price'=>$price,'h_charges'=>$h_charges,'total_amount'=>$total,'user_id'=>$user_id,'booking_date'=>$b_date,'material'=>$mat);


                        $this->add_shipment_model->insert_shipment($data);

                $msg = "Your Consignment has been booked";

                $this->send_sms($msg,$s_contact);

            }
            else{

                $id = $this->input->post('shipment_id');
                $data = array('receipt_no'=> $r_no,'shipper_contact'=>$s_contact,'shipper_name'=>$s_name,'quantity'=>$qty,
                    'receiver_name'=>$r_name,'receiver_contact'=>$r_contact,'address'=>$r_add,'shipping_date'=>$date_f,'origin'=>$origin,'destination'=>$dest,'status_id'=>$status,
                    'price'=>$price,'h_charges'=>$h_charges,'total_amount'=>$total,'user_id'=>$user_id,'booking_date'=>$b_date,'material'=>$mat);

                $this->add_shipment_model->update_shipment($data,$id);
            }



            redirect('user/view_shipment');

        }
        else
        {
            redirect('login/logout');
        }
    }

    function print_shipment()
    {

        if ($this->session->userdata('logged_in') !== FALSE){

            $user_id = $this->session->userdata['logged_in']['user_id'];

            $str = $this->input->post('lr_no');
            $lr_no = ltrim($str, '0');

            $data['query'] = $this->add_shipment_model->print_shipment($lr_no);

            /*print_r($data);*/
            $this->load->view('user/print_shipment',$data);
        }
        else
        {
            redirect('login/logout');
        }
    }


    /*format date with respect to the sql yyyy-mm-dd */
    function format_date($date_f)
    {
        $fd = explode("/",$date_f);

        return $fd[2].'-'.$fd[1].'-'.$fd[0];

    }

    /*get drivers name */
    function get_driver()
    {
        $dat = file_get_contents("php://input");
        $dat = json_decode($dat,true);

        foreach ($dat as $key) {
            # code...
            foreach ($key as $row) {

                # code...
                $val = $row;
            }
        }

        $data = $this->add_shipment_model->get_driver($val);

        foreach($data as $row)
        {
            echo $row->name;
        }

    }

    /*delete shipment*/
    function delte_shipment()
    {
        $ship_id = $this->input->post('ship_id');

        $this->add_shipment_model->delete_ship($ship_id);

        redirect('user/add_shipment');
    }


    /*sending the sms*/
    function send_sms($msg,$to)
    {

        $msg = str_replace(' ', '%20', $msg);

        $curl_handle=curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,'http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=credenceis&password=9379499565&sendername=NETSMS&mobileno='.$to.'&message='.$msg);
        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        /*$url = "http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=credenceis&password=9379499565&sendername=NETSMS&mobileno=".$to."&message=".$msg;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec ($ch);
        curl_close ($ch);*/
    }
}