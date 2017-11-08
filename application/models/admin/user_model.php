<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/2/15
 * Time: 5:32 PM
 * To change this template use File | Settings | File Templates.
 */

class User_model extends CI_Model{

    function get_location()
    {
        $this->db->select('c.name,l.id,l.area');
        $this->db->from('cities c');
        $this->db->join('location_master l','l.city = c.id');
        $this->db->where('l.status',"0");
        $query = $this->db->get();
        return $query->result();
    }

    function insert_user($data)
    {
        $this->db->insert('user_master',$data);
    }

    function get_users()
    {
        $this->db->select('u.*,c.name as location,l.id as c_id,l.area');
        $this->db->from('user_master u');
        $this->db->join('location_master l','u.location=l.id');
        $this->db->join('cities c','c.id = l.city');
        $query = $this->db->get();
        return $query->result();
    }

    /*validate email address*/
    function val_email($email)
    {
        $this->db->where('email',$email);
        $query = $this->db->get('user_master');
        if ($query->num_rows() > 0){

            return 1;
        }
        else{
            return 0;
        }
    }

    /*validate user id*/
    function validate_user($user)
    {
        $this->db->where('user_id',$user);
        $query = $this->db->get('user_master');
        if ($query->num_rows() > 0){

            return 1;
        }
        else{
            return 0;
        }
    }

    /*update user profile*/
    function update($data,$u_id)
    {
        $this->db->where('id',$u_id);
        $this->db->update('user_master',$data);
    }
}?>