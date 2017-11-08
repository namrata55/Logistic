<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/2/15
 * Time: 4:45 PM
 * To change this template use File | Settings | File Templates.
 */

class Create_user extends CI_Controller {

    function index()
    {

        $this->load->model('admin/user_model');

        /*Get Active location*/
        $data['query'] = $this->user_model->get_location();

        /*Get all users*/
        $data['query1'] = $this->user_model->get_users();

        /*menu*/

        $menu['main_menu'] = "dashboard,user";

        $this->load->view('page_adders/header');

        $this->load->view('page_adders/sidebar_menu',$menu);

        $this->load->view('admin/create_user',$data);


    }

    /*Create and update users*/
    function insert_user()
    {
        $full_name = $this->input->post('full_name');
        $user_id = $this->input->post('user_id');
        $pass = $this->input->post('pass');
        $loc = $this->input->post('location');
        $status = $this->input->post('status');
        $action = $this->input->post('action');
        $email = $this->input->post('email');
        $user_type = $this->input->post('user_type');
        $this->load->model('admin/user_model');

        $data = array('user_name'=>$full_name,'email'=>$email,'user_id'=>$user_id,'pass'=>$pass,'location'=>$loc,'user_type'=>$user_type,'status'=>$status);
        $this->user_model->insert_user($data);

        redirect('admin/create_user');
    }


    /*update user profile*/
    function update_user ()
    {
        $full_name = $this->input->post('e_full_name');
        $user_id = $this->input->post('e_user_id');
        $loc = $this->input->post('e_location');
        $status = $this->input->post('e_status');
        $action = $this->input->post('e_action');
        $email = $this->input->post('e_email');
        $user_type = $this->input->post('e_user_type');
        $this->load->model('admin/user_model');

        $u_id = $this->input->post('u_id');

        $c_pass = $this->input->post('ch_pass');

        if(!empty($c_pass))
        {
            $data = array('user_name'=>$full_name,'email'=>$email,'user_id'=>$user_id,'pass'=>$c_pass,'location'=>$loc,'user_type'=>$user_type,'status'=>$status);
            $this->user_model->update($data,$u_id);
        }
        else
        {
            $data = array('user_name'=>$full_name,'email'=>$email,'user_id'=>$user_id,'location'=>$loc,'user_type'=>$user_type,'status'=>$status);
            $this->user_model->update($data,$u_id);
        }

        redirect('admin/create_user');
    }

    /*validate user email address*/

    function validate_email()
    {
        $email = $this->input->post('email');

        $this->load->model('admin/user_model');

        $data['query'] = $this->user_model->val_email($email);



      foreach ($data as $row)
        {
           if($row == '1')
           {
               /*value present inside the database*/
               echo "false";
           }
            else{

                /*value not present inside the database*/
                echo "true";
            }
        }
    }

    /*validate user id */

    function validate_user()
    {
        $user_id = $this->input->post('user_id');

        $this->load->model('admin/user_model');

        $data['query'] = $this->user_model->validate_user($user_id);



        foreach ($data as $row)
        {
            if($row == '1')
            {
                /*value present inside the database*/
                echo "false";
            }
            else{

                /*value not present inside the database*/
                echo "true";
            }
        }
    }
}