<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/8/15
 * Time: 9:07 AM
 * To change this template use File | Settings | File Templates.
 */

class Login_model extends CI_Model
{
    function verify_user($user,$pass)
    {
        $this->db->select('id,user_type,location');
        $this->db->where('user_id',$user);
        $this->db->where('pass',$pass);
        $this->db->where('status','0');
        $query = $this->db->get('user_master');

        if ($query->num_rows() > 0){

            return $query->result();
        }
        else{
            return 0;
        }

    }
}