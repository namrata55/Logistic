<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/8/15
 * Time: 10:07 AM
 * To change this template use File | Settings | File Templates.
 */

class Add_shipment_model extends CI_Model
{

    function get_trucks()
    {
        $this->db->select('*');
        $this->db->where('status','0');
        $query = $this->db->get('truck_master');
        return $query->result();
    }

    function get_driver($val)
    {
        $this->db->select('d.name');
        $this->db->from('driver_master d');
        $this->db->join('truck_master t','t.driver_id = d.id');
        $this->db->where('t.id',$val);

        $query = $this->db->get();
        return $query->result();
    }

    function get_loc()
    {
        $this->db->select('c.name as city,s.name as state,l.country,l.status,l.id as locid,s.id as s_id,l.city as city_id,l.area');
        $this->db->from('location_master l');
        $this->db->join('cities c','l.city = c.id');
        $this->db->join('states s','c.state_id = s.id');
        $this->db->where('l.status','0');
        $query = $this->db->get();
        return $query->result();
    }

    function get_origin($loc_id)
    {
        $this->db->select('c.name as city,s.name as state,l.country,l.status,l.id as locid,s.id as s_id,l.city as city_id,l.area');
        $this->db->from('location_master l');
        $this->db->join('cities c','l.city = c.id');
        $this->db->join('states s','c.state_id = s.id');
        $this->db->where('l.status','0');
        $this->db->where('l.id',$loc_id);
        $query = $this->db->get();
        return $query->result();
    }

    function insert_shipment($data)
    {
        $this->db->insert('shiping_master',$data);
    }
    function get_status()
    {
        $this->db->select('id,status');
        $this->db->where('action_status','0');
        $query = $this->db->get('status_master');
        return $query->result();
    }

    function update_shipment($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('shiping_master',$data);
    }

    /*get id*/
    function get_id()
    {
        $this->db->select_max('receipt_no');
        $query = $this->db->get('shiping_master');
        return  $query->result();
    }

    /*delete shipment*/
    function delete_ship($ship_id)
    {
        $this->db->where('id',$ship_id);

        $this->db->delete('shiping_master');
    }



    /*print the shipment*/
    function print_shipment($lr)
    {

       /* $this->db->select('* ,CONCAT(c.name,'.',l.area) as dest');
        $this->db->from('shiping_master s');
        $this->db->join('location_master l','l.id = s.destination');
        $this->db->join('cities c','c.id=l.city');
        $this->db->where('s.receipt_no',$lr);
        $query = $this->db->get();*/

        $sql = "SELECT s.* , CONCAT(l.area,' ',c.name) as dest FROM shiping_master s JOIN location_master l on l.id = s.destination JOIN cities c ON c.id=l.city WHERE s.receipt_no = $lr ";

        $query = $this->db->query($sql);
        return $query->result();
    }
}