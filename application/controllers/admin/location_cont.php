<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/2/15
 * Time: 11:24 AM
 * To change this template use File | Settings | File Templates.
 */

class Location_cont extends CI_Controller
{
    function index()
    {


        $this->load->model('admin/location_model');

        $data['query'] = $this->location_model->get_state();
        $data['query1'] = $this->location_model->get_location();

        /*menu*/
        $menu['main_menu'] = "setting,loc";
        $this->load->view('page_adders/header');
        $this->load->view('page_adders/sidebar_menu',$menu);

        $this->load->view('admin/location_view',$data);
    }

    function get_cities()
    {

        $state = $this->input->post('state');

        $this->load->model('admin/location_model');

        $data['query'] = $this->location_model->get_city($state);

        echo '<select name="city" id="city" class="form-control" ng-model="city">';

        foreach($data as $row)
        {
            foreach($row as $val)
            {
                echo '<option value="'.$val->id.'">'.$val->name.'</option>';
            }

        }

        echo '</select>';
    }

    function insert_location()
    {
        $city = $this->input->post('city');
        //die(print_r($city));
        $state = $this->input->post('state');
        $country = "India";
        $area = $this->input->post('area');
        $status = $this->input->post('status');
        $gps = $this->input->post('gps');

        $action = $this->input->post('action_type');

        $this->load->model('admin/location_model');

        if($action == '0')
        {
            $data = array('city'=>$city,'country'=>$country,'area'=>$area,'status'=>$status,'status'=>$status,'gps'=>$gps);
            $this->location_model->insert_location($data);
        }
        else
        {
            $loc_id = $this->input->post('loc_id');
            $data = array('city'=>$city,'country'=>$country,'area'=>$area,'status'=>$status,'gps'=>$gps);
            $this->location_model->update_location($data,$loc_id);
        }

        redirect('admin/location_cont');
    }

    function delete_loc()
    {
        $loc_id = $this->input->post('loc_id');
        $this->load->model('admin/location_model');
        $this->location_model->delete_location($loc_id);

    }
}