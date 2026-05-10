<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]

class Pet_model extends CRUD_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'pets';
        $this->field = "id";
    }

    /*** start admin***/
    function get_admin_pet($id, $where = '')
    {
        $this->db->select("p.*, g.image, b.breed, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name");
        $this->db->from($this->table_name.' p');
        $this->db->join('members m', 'm.mem_id = p.mem_id');
        $this->db->join('pet_breeds pb', "pb.id = p.breed_id", 'left');
        $this->db->join('gallery g', "p.id = g.ref_id and ref_type = 'pet' and g.main = 1", 'left');
        // $this->db->where('g.main', 1);

        $this->db->where('p.id', $id);
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }
    
    function get_admin_pets($where = '')
    {
        $this->db->select("p.*, g.image, b.breed, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name");
        $this->db->from($this->table_name.' p');
        $this->db->join('members m', 'm.mem_id = p.mem_id');
        $this->db->join('pet_breeds pb', "pb.id = p.breed_id, 'left'");
        $this->db->join('gallery g', "p.id = g.ref_id and ref_type = 'pet' and g.main = 1", 'left');
        // $this->db->where('g.main',1);

        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    /*** end admin***/

    function get_pet($id, $where = '')
    {
        $this->db->select("p.*, g.image, pb.breed");
        $this->db->from($this->table_name.' p');
        $this->db->join('members m', 'm.mem_id = p.mem_id');
        $this->db->join('pet_breeds pb', "pb.id = p.breed_id", 'left');
        $this->db->join('gallery g', "p.id = g.ref_id and ref_type = 'pet' and g.main = 1", 'left');
        // $this->db->where('g.main', 1);

        $this->db->where('p.id', $id);
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    function get_mem_pets($where = '', $start = '', $offset = '', $order_by = 'desc', $order_field = 'p.id')
    {
        $this->db->select("p.*, g.image, pb.breed");
        $this->db->from($this->table_name.' p');
        $this->db->join('members m', 'm.mem_id = p.mem_id');
        $this->db->join('pet_breeds pb', "pb.id = p.breed_id", 'left');
        $this->db->join('gallery g', "p.id = g.ref_id and ref_type = 'pet' and g.main = 1", 'left');
        // $this->db->where('g.main', 1);

        // $this->db->where("p.mem_id", $this->session->mem_id);

        // $this->db->where("l.lesson_date_time>=", date('Y-m-d h:i'));
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by($order_field, $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function total_mem_pets($where)
    {
        $this->db->select("count(p.id) as total");
        $this->db->from($this->table_name.' p');
        $this->db->join('members m', 'm.mem_id = p.mem_id');
        $this->db->join('pet_breeds pb', "pb.id = p.breed_id", 'left');
        $this->db->join('gallery g', "p.id = g.ref_id and ref_type = 'pet' and g.main = 1", 'left');
        // $this->db->where('g.main', 1);
        // $this->db->where("p.mem_id", $this->session->mem_id);
        $this->db->where($where);
        $query = $this->db->get();
        return intval($query->row()->total);
    }

    function search_pet($post)
    {
        $this->db->select("p.*, m.mem_image, m.mem_fname, m.mem_lname");
        $this->db->from($this->table_name.' p');
        $this->db->join('members m', 'm.mem_id = p.mem_id');
        $this->db->where("status", 1);

        if (!empty($post['subject'])){
            $this->db->group_start()
            ->like('title', $post['subject'], 'both')
            ->or_like('subject', $post['subject'], 'both')
            ->group_end();
        }

        if (!empty($post['price'])) {
            $ary = explode(';', str_replace('$', '', $post['price']));
            $min_price = floatval(trim($ary[0]));
            $max_price = floatval(trim($ary[1]));
            $this->db->where("( budget >= $min_price  AND budget <= $max_price ) ", null, false);
        }
        
        if (count($post['grades']) > 0  && $post['grades'][0]!='')
            $this->db->where_in('grade_level', $post['grades']);

        if (!empty($post['zip'])) 
            $this->db->where('zip', $post['zip']);

        if (!empty($post['sort']) && in_array($post['sort'], array('asc', 'desc'))) 
            $this->db->order_by('budget', $post['sort']);

        $query = $this->db->get();
        return $query->result();
    }
    
    /*
    function view($id)
    {
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update($this->table_name);
    }
    */
}
?>

