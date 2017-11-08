<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/9/15
 * Time: 10:39 AM
 * To change this template use File | Settings | File Templates.
 */

class View_shipment_model extends CI_Model
{
    function get_user_shipments($user_id, $s_date)
    {
            /*$this->db->select('s.* , sm.status, t.truck_no,d.name, concat(co.name, ,lo.area) as location_org, concat(cd.name, ,lo.area) as location_org');
            $this->db->from('shiping_master s');
            $this->db->join('status_master sm','s.status_id = sm.id');
            $this->db->join('truck_master t','t.id = s.truck_id');
            $this->db->join('driver_master d','d.id = t.driver_id');

            $this->db->join('location_master lo','lo.id = s.origin');
            $this->db->join('cities co','co.id = lo.city');

            $this->db->join('location_master ld','ld.id = s.destination');
            $this->db->join('cities cd','cd.id = ld.city');
            $query =  $this->db->get();*/

            $query = $this->db->query("SELECT DISTINCT s.booking_date,s.id,s.status_id,s.origin,s.destination,s.receipt_no,s.quantity,s.shipper_name,s.shipper_contact,s.receiver_name,s.receiver_contact,s.address,s.shipping_date,s.price,s.h_charges,s.total_amount ,sm.status , concat(co.name,' ' ,lo.area) as location_org, concat(cd.name,' ', lo.area) as location_dest FROM (shiping_master s) JOIN status_master sm ON s.status_id = sm.id JOIN location_master lo ON lo.id = s.origin JOIN cities co ON co.id = lo.city JOIN location_master ld ON ld.id = s.destination JOIN cities cd ON cd.id = ld.city where s.booking_date = '$s_date' AND s.user_id = $user_id ORDER BY s.id Desc");


        return $query->result();
    }
}