<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/8/15
 * Time: 9:35 AM
 * To change this template use File | Settings | File Templates.
 */

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/dashbosrd_model');
    }

    function index()
    {
        if ($this->session->userdata('logged_in') !== FALSE && $this->session->userdata['logged_in']['login_type'] == "user"){

            $this->load->view('user/page_adders/header');
            $menu['main_menu'] = "dashboard,dash";
            $this->load->view('user/page_adders/sidebar_menu',$menu);

            $t_truck = $this->dashbosrd_model->get_total_truck();
            $t_m = $this->dashbosrd_model->get_total_m();
            $t_b = $this->dashbosrd_model->get_total_b();

            $t_cons = $this->dashbosrd_model->get_total_cons();
            $t_pen_cons = $this->dashbosrd_model->get_total_pen_cons();
            $t_del_cons = $this->dashbosrd_model->get_total_del_cons();
            $t_cenc_cons = $this->dashbosrd_model->get_total_cenc_cons();
            $t_new_cons = $this->dashbosrd_model->get_total_new_cons();

            $t_per_del = (($t_del_cons/$t_cons)*100);
            $t_per_pen = (($t_pen_cons/$t_cons)*100);
            $t_per_canc = (($t_cenc_cons/$t_cons)*100);
            $t_per_new = (($t_new_cons/$t_cons)*100);
            //die(print_r($t_per_new));

            $t_revenue_price = $this->dashbosrd_model->get_total_revenue_price();
            $t_profit_price = $this->dashbosrd_model->get_total_profit_price();
            $t_pending_price = $this->dashbosrd_model->get_total_pending_price();
            $t_lost_price = $this->dashbosrd_model->get_total_lost_price();
            $t_price = $this->dashbosrd_model->get_total_price();

            $t_per_revenue_price = (($t_revenue_price/$t_price)*100);
            $t_per_profit_price = (($t_pen_cons/$t_price)*100);
            $t_per_pending_price = (($t_cenc_cons/$t_price)*100);
            $t_per_lost_price = (($t_new_cons/$t_price)*100);

            $data = array(
                't_truck' => $t_truck,
                't_m' => $t_m,
                't_b' => $t_b,
                't_cons' => $t_cons,
                't_pen_cons' => $t_pen_cons,
                't_del_cons' => $t_del_cons,
                't_cenc_cons' => $t_cenc_cons,
                't_new_cons' => $t_new_cons,
                't_per_del' => $t_per_del,
                't_per_pen' => $t_per_pen,
                't_per_canc' => $t_per_canc,
                't_per_new' => $t_per_new,
                't_revenue_price' => $t_revenue_price,
                't_profit_price' => $t_profit_price,
                't_pending_price' => $t_pending_price,
                't_lost_price' => $t_lost_price,
                't_per_revenue_price' => $t_per_revenue_price,
                't_per_profit_price' =>$t_per_profit_price,
                't_per_pending_price' => $t_per_pending_price,
                't_per_lost_price' => $t_per_lost_price,
            );

            $data['query'] = $this->dashbosrd_model->get_gps();
            //die(print_r($data));
            $data['query'] = $this->dashbosrd_model->get_cities();
            //die(print_r($data));

            $this->load->view('user/dashboard_view',$data);

        }
        else
        {

            redirect('login/logout');
        }
    }


}