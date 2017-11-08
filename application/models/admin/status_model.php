<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/8/15
 * Time: 1:03 PM
 * To change this template use File | Settings | File Templates.
 */

class Status_model extends CI_Model
{
    function insert_status($data)
    {
        $this->db->insert('status_master',$data);
    }

    function update_status($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('status_master',$data);
    }

    function get_all_status()
    {
       $query = $this->db->get('status_master');
       return $query->result();
    }
}