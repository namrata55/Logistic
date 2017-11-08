<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/14/15
 * Time: 1:42 PM
 * To change this template use File | Settings | File Templates.
 */

class Material_model extends CI_Model
{
    function insert_material($data)
    {
        $this->db->insert('materials',$data);
    }

    function get_meterial()
    {
        $query = $this->db->get('materials');
        return $query->result();
    }

    function update_mat($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('materials',$data);
    }
    function delete_mat($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('materials');
    }
}