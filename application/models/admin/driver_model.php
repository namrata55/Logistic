<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/7/15
 * Time: 1:02 PM
 * To change this template use File | Settings | File Templates.
 */

class Driver_model extends CI_Model
{

    /*Get all driver*/
    function get_drivers()
    {
       $query = $this->db->get('driver_master');
       return $query->result();
    }

    function insert_driver($data)
    {
        $this->db->insert('driver_master',$data);
    }

    function update_driver($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('driver_master',$data);
    }

    /*get Drivers whoes status is active*/
    function get_active_drivers()
    {
        $this->db->where('status','0');
        $query = $this->db->get('driver_master');
        return $query->result();
    }
}