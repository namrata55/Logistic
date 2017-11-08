<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/7/15
 * Time: 3:39 PM
 * To change this template use File | Settings | File Templates.
 */

class Truck_model extends CI_Model
{

    function get_all_trucks()
    {
        $this->db->select('t.*,d.name as driver_name');
        $this->db->from('truck_master t');
        $this->db->join('driver_master d','d.id = t.driver_id');
        $query = $this->db->get();
        return $query->result();
    }
    function insert_trucks($data)
    {
        $this->db->insert('truck_master',$data);
    }

    function update_truck($data,$truck_id)
    {
        $this->db->where('id',$truck_id);
        $this->db->update('truck_master',$data);
    }
}