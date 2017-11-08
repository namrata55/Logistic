<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/11/15
 * Time: 3:06 PM
 * To change this template use File | Settings | File Templates.
 */

class List_shipment_model extends CI_Model
{
    /*get all the shipment status of the specific id*/
    function get_shipment($ship_id)
    {
        $this->db->select('csh.*, u.user_name , sm.status');
        $this->db->from('change_shipment_status csh');
        $this->db->join('user_master u','u.id = csh.user_id');
        $this->db->join('status_master sm','sm.id = csh.status_id');
        $this->db->where('csh.shipment_id',$ship_id);


        $query = $this->db->get();

        return $query->result();
    }


    /*update shipment status*/
    function insert_shipment_status($data)
    {
        $this->db->insert('change_shipment_status',$data);
    }

    /*update shipment status*/

    function update_shipment_status($dt,$ship_id)
    {
        $this->db->where('id',$ship_id);
        $this->db->update('shiping_master',$dt);
    }

    function get_user_shipments($s_date)
    {
        /*$this->db->select("s.* , sm.status, t.truck_no,d.name, CONCAT_WS(' ',co.name,lo.area) as location_org, CONCAT_WS(' ',cd.name,lo.area) as location_org");

        $this->db->from('shiping_master s');
        $this->db->join('status_master sm','sm.id = sm.status_id');
        $this->db->join('truck_master t','t.id = s.truck_id');
        $this->db->join('driver_master d','d.id = t.driver_id');

        $this->db->join('location_master lo','lo.id = s.origin');
        $this->db->join('cities co','co.id = lo.city');

        $this->db->join('location_master ld','ld.id = s.destination');
        $this->db->join('cities cd','cd.id = ld.city');
        $query =  $this->db->get();*/

        $query = $this->db->query("SELECT DISTINCT s.id,s.status_id,s.origin,s.destination,s.receipt_no,s.quantity,s.shipper_name,s.shipper_contact,s.receiver_name,s.receiver_contact,s.address,s.shipping_date,s.booking_date,s.price,s.h_charges,s.total_amount ,sm.status , concat(co.name,' ' ,lo.area) as location_org, concat(cd.name,' ', lo.area) as location_dest FROM (shiping_master s) JOIN status_master sm ON s.status_id = sm.id JOIN location_master lo ON lo.id = s.origin JOIN cities co ON co.id = lo.city JOIN location_master ld ON ld.id = s.destination JOIN cities cd ON cd.id = ld.city JOIN user_master um on um.location = s.destination where s.booking_date = '$s_date' ORDER BY s.id desc");



        return $query->result();
    }


}