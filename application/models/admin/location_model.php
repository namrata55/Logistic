<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/2/15
 * Time: 11:27 AM
 * To change this template use File | Settings | File Templates.
 */

class Location_model extends CI_Model
{
    function get_state()
    {
        $this->db->select('*');
        $this->db->where('country_id','101');
        $query = $this->db->get('states');
        return $query->result();
    }

    function get_city($state)
    {
        $this->db->select('*');
        $this->db->where('state_id',$state);
        $query = $this->db->get('cities');
        return $query->result();
    }

    function insert_location($data)
    {
        $this->db->insert('location_master',$data);
    }

    function update_location($data,$loc_id)
    {
        $this->db->where('id',$loc_id);
        $this->db->update('location_master',$data);
    }

    function get_location()
    {
        $this->db->select('c.name as city,s.name as state,l.country,l.status,l.id,s.id as s_id,l.city as city_id,l.area');
        $this->db->from('location_master l');
        $this->db->join('cities c','l.city = c.id');
        $this->db->join('states s','c.state_id = s.id');
        $query = $this->db->get();
        return $query->result();
    }

    function delete_location($loc_id)
    {
        $this->db->where('id',$loc_id);
        $this->db->delete('location_master');
    }
}