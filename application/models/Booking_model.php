<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]

class Booking_model extends CRUD_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'bookings';
        $this->field = "id";
    }

    /*** start admin***/
    function get_admin_booking($id, $where = '')
    {
        // $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', LEFT(m.mem_lname, 1), '.') as mem_name, m.mem_image, m.mem_id, s.title as service");
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, m.mem_image, m.mem_city, m.mem_state, m.mem_zip, m.mem_address1, m.mem_id, s.title as service, s.price_label, s.price_overview");
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id=b.owner_id');
        $this->db->join('services s', 's.id=b.service_id');

        $this->db->where('b.id', $id);
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }
    /*** end admin***/

    function get_booking($id, $where = '')
    {
        // $this->db->select("b.*, m.mem_image,concat(m.mem_fname, ' ', LEFT(m.mem_lname, 1), '.') as mem_name, m.mem_image, m.mem_id, s.title as service");
        $this->db->select("b.*, m.mem_map_lat, m.mem_map_lng, m.mem_image, m.mem_fname, m.mem_lname, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, m.mem_image, m.mem_email, m.mem_phone, m.mem_city, m.mem_state, m.mem_zip, m.mem_address1, m.mem_id, s.title as service, s.price_label, s.price_overview, ms.cancellation_policy, email_new_message, email_new_booking, email_declined_booking, email_accept_booking, email_confirm_booking, email_checkin, email_cancel_booking, email_calendar, email_marketing, mobile_new_message, mobile_new_booking, mobile_declined_booking, mobile_accept_booking, mobile_confirm_booking, mobile_checkin, mobile_cancel_booking, mobile_calendar, mobile_marketing");
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id = b.sitter_id or m.mem_id = b.owner_id');
        $this->db->join('services s', 's.id = b.service_id');
        $this->db->join('mem_services ms', 's.id = ms.service_id and ms.mem_id = b.sitter_id');

        $this->db->where('b.id', $id);
        if (!empty($where))
            $this->db->where($where);
        $row = $this->db->get()->row();
        if ($row)
            $row->pet_rows = $this->get_booking_pets($row->id);
        return $row;
    }

    function get_booking_pets($booking_id)
    {
        $this->db->select("p.*, g.image, pb.breed");
        $this->db->from($this->table_name.' b');
        $this->db->join('pets p', 'FIND_IN_SET(p.id, b.pets)>0');
        $this->db->join('pet_breeds pb', "pb.id=p.breed_id", 'LEFT');
        $this->db->join('gallery g', "p.id=g.ref_id and ref_type='pet'", 'LEFT');
        $this->db->where('g.main', 1);
        $this->db->where('b.id', $booking_id);
        return $this->db->get()->result();
    }

    /*** start my sitters***/
    function total_owner_sitters()
    {
        $this->db->select("count(id) as total");
        $this->db->where('owner_id', $this->session->mem_id);
        $this->db->where('status', 2);
        $this->db->group_by('sitter_id');
        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    function get_owner_sitters($where = '', $start = '', $offset = '',$order_by = 'desc')
    {
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', LEFT(m.mem_lname, 1), '.') as mem_name");

        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id=b.sitter_id');

        $this->db->where('owner_id', $this->session->mem_id);
        $this->db->where('status', 2);
        $this->db->group_by('sitter_id');

        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by("b.id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);
        $query = $this->db->get();
        return $query->result();
    }

    /*** end my sitters***/

    function total_type_bookings($type = 'all', $where = '')
    {
        $this->db->select("count(b.id) as total");
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id = b.sitter_id or m.mem_id = b.owner_id');
        $this->db->join('services s','s.id = b.service_id');

        // $this->db->select("count(id) as total");
        switch ($type) {
            case 'pending':
                $this->db->where_in("b.status", array(0, 1));
                $this->db->where("b.completed", 0);
                $this->db->where("b.canceled", 0);
                break;
            case 'upcoming':
                $this->db->where("b.status", 2);
                $this->db->where("b.canceled", 0);
                if ($this->session->mem_type=='sitter')
                    $this->db->where_in("b.completed", 0);
                else
                    $this->db->where("b.completed<", 2);
                break;
            case 'completed':
                $this->db->where("b.status", 2);
                $this->db->where("b.canceled", 0);
                if ($this->session->mem_type=='sitter')
                    $this->db->where_in("b.completed", array(1, 2));
                else
                    $this->db->where("b.completed", 2);
                break;
            case 'cancelled':
                $this->db->group_start()
                ->where("b.status", 3)
                ->or_group_start()
                ->where("b.status", 2)
                ->where("b.canceled", 1)
                ->group_end()
                ->group_end();
                break;
        }
        // $this->db->where("booking_date_time>=", date('Y-m-d h:i'));
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        // print_query();
        return intval($query->row()->total);
    }

    function get_type_bookings($type = 'all', $where = '', $start = '', $offset = '', $order_by = 'asc', $field = 'b.start_date')
    {
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, s.title as service");
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id = b.sitter_id or m.mem_id = b.owner_id');
        $this->db->join('services s','s.id = b.service_id');

        switch ($type) {
            case 'pending':
                $this->db->where_in("b.status", array(0, 1));
                $this->db->where("b.completed", 0);
                $this->db->where("b.canceled", 0);
                break;
            case 'upcoming':
                $this->db->where("b.status", 2);
                $this->db->where("b.canceled", 0);
                if ($this->session->mem_type=='sitter')
                    $this->db->where_in("b.completed", 0);
                else
                    $this->db->where("b.completed<", 2);                
                break;
            case 'completed':
                $this->db->where("b.status", 2);
                $this->db->where("b.canceled", 0);
                if ($this->session->mem_type=='sitter')
                    $this->db->where_in("b.completed", array(1, 2));
                else
                    $this->db->where("b.completed", 2);
                break;
            case 'cancelled':
                $this->db->group_start()
                ->where("b.status", 3)
                ->or_group_start()
                ->where("b.status", 2)
                ->where("b.canceled", 1)
                ->group_end()
                ->group_end();
                break;
            case 'dashboard':
                $this->db->where("b.status<", 3);
                $this->db->where("b.completed<", 2);
                $this->db->where("b.canceled", 0);
                break;
            /*
            case 'all':
                $this->db->where("b.status", 2);
                $this->db->where("b.canceled", 0);
                $this->db->where("b.completed<>", 2);
                break;
            */
        }
        /*
        $this->db->where("b.completed", 0);
        $this->db->where("b.canceled", 0);
        */

        // $this->db->where("b.booking_date_time>=", date('Y-m-d h:i'));
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by($field, $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get();
        // print_query();
        return $query->result();
    }

    function get_profile_bookings($where = '', $start = '', $offset = '', $order_by = 'desc')
    {
        /*
        $this->db->select("c.*, concat(mem_fname, ' ', mem_lname) as mem_name, mem_image");
        $this->db->from($this->table_name.' c');
        $this->db->join('members m', 'm.mem_id=c.mem_id');
        */

        $this->db->where("status", 1);
        $this->db->where("deleted", 0);

        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by("id", $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get($this->table_name);
        $rows = array();
        foreach ($query->result() as $key => $row) {
            $row->total_favorites = $this->total_favorites($row->id);
            $rows[$key] = $row;
        }
        return $rows;
    }

    /*
    function search_bookings($post)
    {
        $this->db->where("status", 1);
        $this->db->where("deleted", 0);
        $this->db->where('main_service_id', intval($post['category']), false);

        if (!empty($post['title'])) 
            $this->db->like('title', $post['title'], 'both');
        if (!empty($post['price'])) {
            $ary = explode('-', str_replace('$', '', $post['price']));
            $min_price = floatval(trim($ary[0]));
            $max_price = floatval(trim($ary[1]));
            $this->db->where("( price >= $min_price  AND price <= $max_price ) ", null, false);
        }
        if (isset($post['cat_id']) && (min($post['cat_id']) != "")) {
            $this->db->where_in('sub_service_id', $post['cat_id']);
        }
        if (!empty($post['sort']) && in_array($post['sort'], array('asc', 'desc'))) 
            $this->db->order_by('price', $post['sort']);

        $query = $this->db->get($this->table_name);
        $rows = array();
        foreach ($query->result() as $key => $row) {
            $rows[$key] = $row;
            $rows[$key]->total_favorites = $this->total_favorites($row->id);
        }
        return $rows;
    }

    function view($id)
    {
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update($this->table_name);
    }
    */

    /*** Calendar ***/
    function calendar_bookings($sitter_id)
    {
        $this->db->select("b.encoded_id, b.start_date, b.end_date, b.status, b.completed, s.title, concat(m.mem_fname, ' ', m.mem_lname) as mem_name");
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id = b.owner_id');
        $this->db->join('services s', 's.id = b.service_id');
        $this->db->where('sitter_id', $sitter_id);
        return $this->db->get()->result();
    }
}
?>

