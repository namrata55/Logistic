<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/4/15
 * Time: 11:48 AM
 * To change this template use File | Settings | File Templates.
 */

class Driver_cont extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/driver_model');
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        $data['query'] = $this->driver_model->get_drivers();

        /*menu*/
        $menu['main_menu'] = "setting,driver";
        $this->load->view('page_adders/header');
        $this->load->view('page_adders/sidebar_menu',$menu);

        $this->load->view('admin/driver_view',$data);
    }

    function insert_drivers()
    {
        $name = $this->input->post('name');
        $c_no = $this->input->post('c_no');
        $c_no1 = $this->input->post('c_no1');
        $address = $this->input->post('address');
        $status = $this->input->post('status');
        $img_url = $this->input->post('driver_img');

        $action = $this->input->post('action');

        if($action == "0")
        {
            $this->load->library('upload');

            $config['upload_path'] = "./upload/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';



            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('driver_img'))
            {
                $error = array('error' => $this->upload->display_errors());

                $logo = "/upload/"."user1.png";
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $logo  = $data['upload_data']['full_path'];

            }


            $logo1 = explode("upload",$logo);
            $logo = "upload".$logo1[1];

            $data = array('name'=>$name,'contact_no'=>$c_no,'contact_no1'=>$c_no1,'address'=>$address,'status'=>$status,'img'=>$logo);
            $this->driver_model->insert_driver($data);
        }
        else{

            $this->load->library('upload');


            if(empty( $_FILES['driver_img']['name'])):


                $driver_id = $this->input->post('driver_id');

                $data = array('name'=>$name,'contact_no'=>$c_no,'contact_no1'=>$c_no1,'address'=>$address,'status'=>$status);
                $this->driver_model->update_driver($data,$driver_id);

            else:

                $config['upload_path'] = "./upload/";
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']	= '100';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';


                $this->upload->initialize($config);
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('driver_img'))
                {
                    $error = array('error' => $this->upload->display_errors());

                    $logo = "/upload/"."user1.png";
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $logo  = $data['upload_data']['full_path'];

                }

                $logo1 = explode("upload",$logo);
                $logo = "upload".$logo1[1];
                echo $logo;
                $driver_id = $this->input->post('driver_id');

                $data = array('name'=>$name,'contact_no'=>$c_no,'contact_no1'=>$c_no1,'address'=>$address,'status'=>$status,'img'=>$logo);

                $this->driver_model->update_driver($data,$driver_id);

            endif;
        }

        redirect('admin/driver_cont');
    }


}