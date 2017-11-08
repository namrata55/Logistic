<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/23/15
 * Time: 9:24 AM
 * To change this template use File | Settings | File Templates.
 */

class Shipment_status_model extends CI_Model
{

    /* Incoming shipments status */
    function get_user_shipments($f_date , $t_date)
    {

        $f_date = str_replace(' ', '', $f_date);
        $t_date = str_replace(' ', '', $t_date);

        $query = $this->db->query("SELECT DISTINCT s.booking_date,s.id,s.status_id,s.origin,s.destination,s.receipt_no,s.quantity,s.shipper_name,s.shipper_contact,s.receiver_name,s.receiver_contact,s.address,s.shipping_date,s.price,s.h_charges,s.total_amount ,sm.status , concat(co.name,' ' ,lo.area) as location_org, concat(cd.name,' ', lo.area) as location_dest FROM (shiping_master s) JOIN status_master sm ON s.status_id = sm.id JOIN location_master lo ON lo.id = s.origin JOIN cities co ON co.id = lo.city JOIN location_master ld ON ld.id = s.destination JOIN cities cd ON cd.id = ld.city JOIN user_master um on um.location = s.destination
        WHERE s.booking_date BETWEEN '$f_date' AND '$t_date' ORDER BY s.id Desc");

        /*$this->db->select('booking_date');
        $this->db->from('shiping_master');


        $where = "booking_date <= '$f_date' AND booking_date >= '$t_date''";
        $this->db->where('booking_date <=',$f_date);
        $this->db->where('booking_date >=',$t_date);

        $query = $this->db->get();*/

        return $query->result();
    }


    function get_drivers()
    {
        $this->db->select('id,name');
        $query = $this->db->get('driver_master');
        return $query->result();
    }


    function load_truck($data)
    {
        $this->db->insert('truck_load_master',$data);
    }


    /*outgoing shipment status*/
    /* get out going shipments*/
    function get_user_out_shipments($user_id,$s_date)
    {
        $query = $this->db->query("SELECT s.booking_date,s.id,s.status_id,s.origin,s.destination,s.receipt_no,s.quantity,s.shipper_name,s.shipper_contact,s.receiver_name,s.receiver_contact,s.address,s.shipping_date,s.price,s.h_charges,s.total_amount ,sm.status , concat(co.name,' ' ,lo.area) as location_org, concat(cd.name,' ', lo.area) as location_dest FROM (shiping_master s) JOIN status_master sm ON s.status_id = sm.id JOIN location_master lo ON lo.id = s.origin JOIN cities co ON co.id = lo.city JOIN location_master ld ON ld.id = s.destination JOIN cities cd ON cd.id = ld.city where s.booking_date = '$s_date' AND s.user_id = $user_id ORDER BY s.id Desc");


        return $query->result();
    }


    function get_user_out_shipmentsbydate ($f_date , $t_date)
    {

        $f_date = str_replace(' ', '', $f_date);
        $t_date = str_replace(' ', '', $t_date);

        $query = $this->db->query("SELECT DISTINCT s.booking_date,s.id,s.status_id,s.origin,s.destination,s.receipt_no,s.quantity,s.shipper_name,s.shipper_contact,s.receiver_name,s.receiver_contact,s.address,s.shipping_date,s.price,s.h_charges,s.total_amount ,sm.status , concat(co.name,' ' ,lo.area) as location_org, concat(cd.name,' ', lo.area) as location_dest FROM (shiping_master s) JOIN status_master sm ON s.status_id = sm.id JOIN location_master lo ON lo.id = s.origin JOIN cities co ON co.id = lo.city JOIN location_master ld ON ld.id = s.destination JOIN cities cd ON cd.id = ld.city
        WHERE s.booking_date BETWEEN '$f_date' AND '$t_date' ORDER BY s.id Desc");



        /*$this->db->select('booking_date');
        $this->db->from('shiping_master');


        $where = "booking_date <= '$f_date' AND booking_date >= '$t_date''";
        $this->db->where('booking_date <=',$f_date);
        $this->db->where('booking_date >=',$t_date);

        $query = $this->db->get();*/

        return $query->result();
    }

    function get_by_truck($f_date , $t_date, $truck_no)
    {
       /* $query = $this->db->query("SELECT DISTINCT s.booking_date,s.id,s.status_id,s.origin,s.destination,s.receipt_no,s.quantity,s.shipper_name,s.shipper_contact,s.receiver_name,s.receiver_contact,s.address,s.shipping_date,s.price,s.h_charges,s.total_amount ,sm.status , concat(co.name,' ' ,lo.area) as location_org, concat(cd.name,' ', lo.area) as location_dest FROM (shiping_master s) JOIN status_master sm ON s.status_id = sm.id JOIN location_master lo ON lo.id = s.origin JOIN cities co ON co.id = lo.city JOIN location_master ld ON ld.id = s.destination JOIN cities cd ON cd.id = ld.city join
        truck_load_master tl on tl.shipment_id = s.id join truck_master t on t.id = tl.truck_id WHERE tl.truck_id = $truck_no");*/


        $f_date = str_replace(' ', '', $f_date);
        $t_date = str_replace(' ', '', $t_date);

        $query = $this->db->query("SELECT DISTINCT s.booking_date,s.id,s.status_id,s.origin,s.destination,s.receipt_no,s.quantity,s.shipper_name,s.shipper_contact,s.receiver_name,s.receiver_contact,s.address,s.shipping_date,s.price,s.h_charges,s.total_amount ,sm.status , concat(co.name,' ' ,lo.area) as location_org, concat(cd.name,' ', lo.area) as location_dest FROM (shiping_master s) JOIN status_master sm ON s.status_id = sm.id JOIN location_master lo ON lo.id = s.origin JOIN cities co ON co.id = lo.city JOIN location_master ld ON ld.id = s.destination JOIN cities cd ON cd.id = ld.city JOIN user_master um on um.location = s.destination
        join truck_load_master tl on tl.shipment_id = s.id join truck_master t on t.id = tl.truck_id WHERE  tl.truck_id = $truck_no AND s.booking_date BETWEEN '$f_date' AND '$t_date' ORDER BY s.id Desc");
        /*$this->db->select('booking_date');
        $this->db->from('shiping_master');


        $where = "booking_date <= '$f_date' AND booking_date >= '$t_date''";
        $this->db->where('booking_date <=',$f_date);
        $this->db->where('booking_date >=',$t_date);

        $query = $this->db->get();*/

        return $query->result();
    }
}