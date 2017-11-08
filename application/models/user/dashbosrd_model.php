<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nashiruddin.k
 * Date: 10/30/15
 * Time: 9:35 AM
 * To change this template use File | Settings | File Templates.
 */

class Dashbosrd_model extends CI_Model{

    function get_total_truck(){
        return $this->db->count_all_results('truck_master');
        //die(print_r(($query)));
    }

    function get_total_cons(){
        return $this->db->count_all_results('shiping_master');
    }

    function get_total_pen_cons(){
        $this->db->select('*');
        $this->db->from('shiping_master sh');
        $this->db->join('status_master st', 'st.id = sh.status_id');
        $this->db->where('st.status','Pending');
        $data = $this->db->get();
        $query = $data->num_rows();
        return $query;
        //die(print_r($query));
    }

    function get_total_del_cons(){
        $this->db->select('*');
        $this->db->from('shiping_master sh');
        $this->db->join('status_master st', 'st.id = sh.status_id');
        $this->db->where("(st.status='At Delivery Point' OR st.status='Out for Delivery')");
        $data = $this->db->get();
        $query = $data->num_rows();
        return $query;
        //die(print_r($query));
    }

    function get_total_new_cons(){
        $this->db->select('*');
        $this->db->from('shiping_master sh');
        $this->db->join('status_master st', 'st.id = sh.status_id');
        $this->db->where("(st.status='In Transit' OR st.status='Booked')");
        $data = $this->db->get();
        $query = $data->num_rows();
        return $query;
        //die(print_r($query));
    }

    function get_total_cenc_cons(){
        $this->db->select('*');
        $this->db->from('shiping_master sh');
        $this->db->join('status_master st', 'st.id = sh.status_id');
        $this->db->where('st.status','Cancel');
        $data = $this->db->get();
        $query = $data->num_rows();
        return $query;
        //die(print_r($query));
    }

//Belgaum,Mumbai
    function get_total_m(){
        $this->db->select('*');
        $this->db->from('shiping_master sh');
        $this->db->join('location_master lm','lm.id = sh.origin','INNER');
        $this->db->join('cities c','c.id = lm.city','INNER');
        $this->db->where('c.name','Mumbai');
        $data = $this->db->get();
        $query = $data->num_rows();
        return $query;
        //die(print_r($query));
    }

    function get_total_b(){
        $this->db->select('*');
        $this->db->from('shiping_master sh');
        $this->db->join('location_master lm','lm.id = sh.origin','INNER');
        $this->db->join('cities c','c.id = lm.city','INNER');
        $this->db->where('c.name','Belgaum');
        $data = $this->db->get();
        $query = $data->num_rows();
        return $query;
        //die(print_r($query));
    }

    function get_gps(){
        $this->db->from('location_master');
        $query = $this->db->get();
        return $query->result();
        //die(print_r($query));
    }

    function get_cities(){
        $this->db->select('*');
        $this->db->from('cities c');
        $this->db->join('location_master lm','lm.city = c.id');
        $query = $this->db->get();
        return $query->result();
        //die(print_r($query));
    }

    function get_total_revenue_price(){
        $this->db->select_sum('sh.total_amount');
        $this->db->from('shiping_master sh');
        $this->db->join('status_master st', 'st.id = sh.status_id');
        $this->db->where("(st.status='In Transit' OR st.status='Booked')");
        $query = $this->db->get();
        return $query->row()->total_amount;
    }

    function get_total_profit_price(){
        $this->db->select_sum('sh.total_amount');
        $this->db->from('shiping_master sh');
        $this->db->join('status_master st', 'st.id = sh.status_id');
        $this->db->where("(st.status='At Delivery Point' OR st.status='Out for Delivery')");
        $query = $this->db->get();
        return $query->row()->total_amount;
    }

    function get_total_pending_price(){
        $this->db->select_sum('sh.total_amount');
        $this->db->from('shiping_master sh');
        $this->db->join('status_master st', 'st.id = sh.status_id');
        $this->db->where('st.status','Pending');
        $query = $this->db->get();
        return $query->row()->total_amount;
    }

    function get_total_lost_price(){
        $this->db->select_sum('sh.total_amount');
        $this->db->from('shiping_master sh');
        $this->db->join('status_master st', 'st.id = sh.status_id');
        $this->db->where('st.status','Cancel');
        $query = $this->db->get();
        return $query->row()->total_amount;
    }

    function get_total_price(){
        $this->db->select_sum('sh.total_amount');
        $this->db->from('shiping_master sh');
        $query = $this->db->get();
        return $query->row()->total_amount;
    }

}