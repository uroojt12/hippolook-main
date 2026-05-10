<?php
#[AllowDynamicProperties]

class Order_model extends CRUD_Model
{

    public function __construct()
    {
        $this->table_name = 'orders';
        $this->field = "id";
    }

    /*** start admin orders ***/

    function get_admin_orders($order_by = 'desc')
    {

        $this->db->select("o.*, concat(m.mem_fname, ' ', m.mem_lname) as mem_name,
         @product_total := IFNULL((select sum((qty*price) + if(lens_type_price, lens_type_price, 0) + if(classic_lenses_price, classic_lenses_price, 0) + if(lens_property_price, lens_property_price, 0)) from tbl_order_detail where o_id = o.id), 0) as product_total, count(od.id) as product_count, ROUND(@product_total*tax/100, 2) as tax_amount", FALSE);
        $this->db->from($this->table_name.' o');
        $this->db->join('order_detail od', 'od.o_id = o.id');
        $this->db->join('members m', 'm.mem_id = o.mem_id');
        $this->db->where('paid', 1);
        $this->db->group_by('o.id');
        if (!empty($order_by))
            $this->db->order_by("o.id", $order_by);
        $query = $this->db->get();
        return $query->result();
    }

    function get_admin_order($oid)
    {

        $this->db->select("o.*, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, m.mem_fname ,
         @product_total := IFNULL((select sum((qty*price) + if(lens_type_price, lens_type_price, 0) + if(classic_lenses_price, classic_lenses_price, 0) + if(lens_property_price, lens_property_price, 0)) from tbl_order_detail where o_id = o.id), 0) as product_total, count(od.id) as product_count, ROUND(@product_total*tax/100, 2) as tax_amount", FALSE);
        $this->db->from($this->table_name.' o');
        $this->db->join('order_detail od', 'od.o_id = o.id');
        $this->db->join('members m', 'm.mem_id = o.mem_id');
        $this->db->where('o.id', $oid);
        $this->db->where('paid', 1);
        $this->db->group_by('o.id');
        $query = $this->db->get();
        return $query->row();
    }

    /*** end admin orders ***/

    /*** start mem orders ***/

    function get_order_total($oid)
    {

        $this->db->select("o.* ,
         @product_total := IFNULL((select sum((qty*price) + if(lens_type_price, lens_type_price, 0) + if(classic_lenses_price, classic_lenses_price, 0) + if(lens_property_price, lens_property_price, 0)) from tbl_order_detail where o_id = o.id), 0) as product_total, count(od.id) as product_count, ROUND(@product_total*tax/100, 2) as tax_amount", FALSE);
        $this->db->from($this->table_name.' o');
        $this->db->join('order_detail od', 'od.o_id = o.id');
        $this->db->where('o.id', $oid);
        $this->db->group_by('o.id');
        $row = $this->db->get()->row();
        return floatval($row->product_total-$row->discount_amount+$row->delivery_cost+$row->tax_amount);
    }

    function get_mem_orders($mem_id, $start = '', $offset = '', $order_by = 'desc')
    {
        $this->db->select("o.*,
         @product_total := IFNULL((select sum((qty*price) + if(lens_type_price, lens_type_price, 0) + if(classic_lenses_price, classic_lenses_price, 0) + if(lens_property_price, lens_property_price, 0)) from tbl_order_detail where o_id = o.id), 0) as product_total, count(od.id) as product_count, ROUND(@product_total*o.tax/100, 2) as tax_amount", FALSE);
        $this->db->from($this->table_name.' o');
        $this->db->join('order_detail od', "o.id = od.o_id");
        $this->db->join('products p', "p.id = od.p_id");
        $this->db->where('o.mem_id', $mem_id);
        // $this->db->where('o.status', 2);
        $this->db->where('o.paid', 1);
        $this->db->group_by('o.id');

        if (!empty($order_by))
            $this->db->order_by("o.id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        $query = $this->db->get($this->table_name);
        $rows = array();
        foreach ($query->result() as $key => $row) {
            $row->products = $this->get_detail($row->id);
            $rows[$key] = $row;
        }
        return $rows;
    }

    function get_mem_order($mem_id, $o_id)
    {
        $this->db->select("o.*, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, m.mem_fname,
         @product_total := IFNULL((select sum((qty*price) + if(lens_type_price, lens_type_price, 0) + if(classic_lenses_price, classic_lenses_price, 0) + if(lens_property_price, lens_property_price, 0)) from tbl_order_detail where o_id = o.id), 0) as product_total, count(od.id) as product_count, ROUND(@product_total*o.tax/100, 2) as tax_amount", FALSE);
        $this->db->from($this->table_name.' o');
        $this->db->join('order_detail od', "o.id = od.o_id");
        $this->db->join('products p', "p.id = od.p_id");
        $this->db->join('members m', 'm.mem_id = o.mem_id');
        $this->db->where('o.mem_id', $mem_id);
        $this->db->where('o.id', $o_id);
        $this->db->group_by('o.id');
        
        $query = $this->db->get();
        $row = $query->row();
        if($row)
            $row->products = $this->get_detail($row->id);
        return $row;
    }

    function get_order($o_id)
    {
        $this->db->select("o.*, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, m.mem_fname,
         @product_total := IFNULL((select sum(qty*price) from tbl_order_detail where o_id = o.id), 0) as product_total, count(od.id) as product_count, ROUND(@product_total*o.tax/100, 2) as tax_amount", FALSE);
        $this->db->from($this->table_name.' o');
        $this->db->join('order_detail od', "o.id = od.o_id");
        $this->db->join('products p', "p.id = od.p_id");
        $this->db->join('members m', 'm.mem_id = o.mem_id');
        $this->db->where('o.id', $o_id);
        $this->db->group_by('o.id');
        
        $query = $this->db->get();
        $row = $query->row();
        if($row)
            $row->products = $this->get_detail($row->id);
        return $row;
    }

    function get_mem_recent_order($mem_id)
    {
        $this->db->select('o.*');
        $this->db->from($this->table_name.' o');
        $this->db->join('order_detail od', "o.id = od.o_id");
        $this->db->join('products p', "p.id = od.p_id");
        $this->db->where('o.mem_id', $mem_id);
        $this->db->where('o.status<>', 2);
        $this->db->group_by('o.id');
        $this->db->order_by('od.id', 'desc');
        $this->db->limit(1);
        
        $query = $this->db->get();
        // die($this->db->last_query());
        $row = $query->row();
        if($row)
            $row->products = $this->get_detail($row->id);
        return $row;
    }

    function total_mem_orders($mem_id = 0)
    {
        $this->db->select('o.*');
        $this->db->from($this->table_name.' o');
        $this->db->join('order_detail od', "o.id = od.o_id");
        $this->db->where('o.mem_id', $mem_id);
        $this->db->group_by('o.id');
        $query = $this->db->get();

        return intval($query->num_rows());
    }

    function get_mem_order_detail($mem_id, $o_id)
    {
        $this->db->select('od.*, title, detail, image');
        $this->db->from('order_detail od ');
        $this->db->join('products p', "p.id = od.p_id");
        $this->db->where('o_id', $o_id);
        $this->db->where('p.mem_id', $mem_id);

        $query = $this->db->get();
        return $query->result();
    }

    function is_valid_mem_od($mem_id, $od_id)
    {
        $this->db->select('od.*');
        $this->db->from('orders o ');
        $this->db->join('order_detail od', "od.o_id = o.id");
        $this->db->where('od.id', $od_id);
        $this->db->where('o.mem_id', $mem_id);
        $this->db->where('o.status', 2);
        $this->db->where('od.review', null);
        
        $query = $this->db->get();
        return $query->row();
    }

    /*** end mem orders ***/

    function get_detail($o_id)
    {
        $this->db->select('od.*, title, image, ((od.qty * od.price) + if(lens_type_price, lens_type_price, 0) + if(classic_lenses_price, classic_lenses_price, 0) + if(lens_property_price, lens_property_price, 0)) as total');
        $this->db->from('order_detail od');
        $this->db->join('products p', "p.id = od.p_id");
        $this->db->where('o_id', $o_id);
        $this->db->order_by('od.id', 'ASC');
        $query = $this->db->get();
        return $query->result();

    }

    function delete_detail($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('order_detail');
    }

    function save_detail($vals, $id = '')
    {
        $this->db->set($vals);
        if ($id != '') {
            $this->db->where('id', $id);
            $this->db->update('order_detail');
            return $id;
        } else {
            $this->db->insert('order_detail');
            return $this->db->insert_id();
        }
    }
}

?>
