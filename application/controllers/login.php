<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/3/15
 * Time: 5:11 PM
 * To change this template use File | Settings | File Templates.
 */

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    function index()
    {
           $this->load->view('login/index');
    }

    function validate()
    {

        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        echo "user".$_REQUEST['username'];

        if($this->input->post('username') != "" && $this->input->post('password') != "")
        {

            $data = $this->login_model->verify_user($user,$pass);

            if($data != 0)
            {
                foreach($data as $row)
                {
                    if($row->user_type == "admin")
                    {
                        $user_id ="";
                        $login_type ="";

                        foreach ($data as $value) {
                            $user_id = $value->id;
                            $login_type = $value->user_type;
                            $loc_id = $value->location;
                        }

                        $sess_array = array(
                            'user_id' => $user_id,
                            'login_type' => $login_type,
                            'loc_id' => $loc_id,
                            'logged_in' => TRUE
                        );

                        // Add user data in session
                        $this->session->set_userdata('logged_in', $sess_array);

                        redirect('admin/dashboard');
                    }
                    else
                    {
                        $user_id ="";
                        $login_type ="";

                        foreach ($data as $value) {
                            $user_id = $value->id;
                            $login_type = $value->user_type;
                            $loc_id = $value->location;
                        }

                        $sess_array = array(
                            'user_id' => $user_id,
                            'login_type' => $login_type,
                            'loc_id' => $loc_id,
                            'logged_in' => TRUE
                        );

                        // Add user data in session
                        $this->session->set_userdata('logged_in', $sess_array);

                        redirect('user/dashboard');
                    }
                }

            }
            else
            {
                redirect('login');
            }

        }
        /*if value is null*/
        else{

            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}