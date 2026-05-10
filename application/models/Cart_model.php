<?php
#[AllowDynamicProperties]

class Cart_model extends CRUD_model
{
    public function __construct()
    {
        $this->load->database();
        $this->table_name = 'cart';
        $this->field = "id";
    }

    /*** start admin orders ***/

    function get_abundant_carts()
    {

        $this->db->select("c.*, concat(m.mem_fname, ' ', m.mem_lname) as mem_name,
         IFNULL((select sum(qty*price) from tbl_cart where c.mem_id = m.mem_id), 0) as product_total, IFNULL((select count(id) from tbl_cart where c.mem_id = m.mem_id), 0) as product_count", FALSE);
        $this->db->from($this->table_name.' c');
        $this->db->join('members m', 'm.mem_id = c.mem_id');
        $this->db->group_by('c.mem_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_abundant_cart($id)
    {

        $this->db->select("c.*, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, mem_email,
         IFNULL((select sum(qty*price) from tbl_cart where c.mem_id = m.mem_id), 0) as product_total, IFNULL((select count(id) from tbl_cart where c.mem_id = m.mem_id), 0) as product_count", FALSE);
        $this->db->from($this->table_name.' c');
        $this->db->join('members m', 'm.mem_id = c.mem_id');
        $this->db->where('c.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function get_abundant_cart_items($mem_id)
    {
        $this->db->select("c.*, title, image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name,
         IFNULL((select sum(qty*price) from tbl_cart where c.mem_id = m.mem_id), 0) as product_total, IFNULL((select count(id) from tbl_cart where c.mem_id = m.mem_id), 0) as product_count", FALSE);
        $this->db->from($this->table_name.' c');
        $this->db->join('members m', 'm.mem_id = c.mem_id');
        $this->db->join('products p', "p.id = c.p_id");
        $this->db->where('c.mem_id', $mem_id);
        $query = $this->db->get();
        return $query->result();
    }

    /*** end admin orders ***/

    function get_cart_item($id, $where = '')
    {
        $this->db->where('id', $id);
        if(!empty($where))
            $this->db->where($where);

        if ($this->session->mem_id > 0):
            $this->db->where('mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;

        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_cart($start = '', $offset = '')
    {
        if ($this->session->mem_id > 0):
            $this->db->where('mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;

        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function shift_cart()
    {
        $this->product_duplication_check();
        $vals['mem_id'] = $this->session->mem_id;
        $vals['session_id'] = NULL;
        $this->db->set($vals);

        $this->db->where('session_id', $this->session->session_id);
        $this->db->update($this->table_name);
    }

    function product_duplication_check()
    {
        $this->db->where('mem_id', $this->session->mem_id);
        $query = $this->db->get($this->table_name);
        foreach ($query->result() as $key => $row) {
            if($sess_row = $this->master->getRow($this->table_name, array('session_id' => $this->session->session_id, 'p_id' => $row->p_id, 'size' => $row->size, 'color' => $row->color))){
                $this->save(array('qty' => ($row->qty+$sess_row->qty)), $row->id);
                
                $this->db->where('id', $sess_row->id);
                $this->db->delete($this->table_name);
            }
        }
    }

    function get_cart_products($start = '', $offset = '')
    {
        $this->db->select('c.*, title, image, cat_ids, ((c.qty * c.price) + if(lens_type_price, lens_type_price, 0) + if(classic_lenses_price, classic_lenses_price, 0) + if(lens_property_price, lens_property_price, 0)) as total');
        if ($this->session->mem_id > 0):
            $this->db->where('c.mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;

        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }

        $this->db->from($this->table_name.' c');
        $this->db->join('products p', "p.id = c.p_id");
        /*$this->db->join('images', 'images.ref_id = p.id');
        $this->db->where("tbl_images.ref_type = 'product'", null, false);*/
        $this->db->order_by('c.id', 'ASC');

        $query = $this->db->get();
        /*$rows = array();
        foreach ($query->result() as $key => $row) {
            $row->sizes = $this->master->getRows('product_sizes', ['p_id' => $row->p_id]);
            $row->colors = $this->master->getRows('product_colors', ['p_id' => $row->p_id]);
            $rows[$key] = $row;
        }
        return $rows;*/
        return $query->result();
    }

    function get_cart_group_products($start = '', $offset = '')
    {
        $this->db->select('c.p_id, title, count(c.id) as qty');
        if ($this->session->mem_id > 0):
            $this->db->where('c.mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;

        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }

        $this->db->from($this->table_name.' c');
        $this->db->join('products p', "p.id = c.p_id");
        $this->db->group_by('c.p_id', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }
    
    function item_exist($item)
    {
        if ($this->session->mem_id > 0):
            $this->db->where('mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;
        // foreach ($items as $key => $item) {
            $this->db->where($key, $item);
        // }
        $query = $this->db->get($this->table_name);
        return $query->row();
    }
    
    function item_count($p_id)
    {
        $this->db->select('count(id) as total');

        if ($this->session->mem_id > 0):
            $this->db->where('mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;
        $this->db->where('p_id', $p_id);

        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    function get_cart_total()
    {
        $this->db->select('sum((qty * price) + if(lens_type_price, lens_type_price, 0) + if(classic_lenses_price, classic_lenses_price, 0) + if(lens_property_price, lens_property_price, 0)) as total');

        if ($this->session->mem_id > 0):
            $this->db->where('mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;

        $query = $this->db->get($this->table_name);
        $res = $query->row();
        return floatval($res->total);
    }

    function get_cart_count()
    {
        $this->db->select('count(id) as total');

        if ($this->session->mem_id > 0):
            $this->db->where('mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;

        $query = $this->db->get($this->table_name);
        $rs = $query->row();
        return intval($rs->total);
    }

    function empty_cart()
    {
        if (intval($this->session->mem_id) > 0):
            $this->db->where('mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;
        $this->db->delete($this->table_name);
    }

    function delete_item($id)
    {
        if (intval($this->session->mem_id) > 0):
            $this->db->where('mem_id', $this->session->mem_id);
        else:
            $this->db->where('session_id', $this->session->session_id);
        endif;
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
    }

    function change_status($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_name);
        $rs = $query->row();

        if ($rs->status == '0') {
            $vals['status'] = '1';
        } else {
            $vals['status'] = '0';
        }
        $this->db->set($vals);
        $this->db->where('id', $id);
        $this->db->update($this->table_name);
        return $vals['status'];
    }

    function save_item($vals, $id = '')
    {
        if ($this->session->mem_id > 0):
            $vals['mem_id'] = $this->session->mem_id;
        else:
            $vals['session_id']=$this->session->session_id;
        endif;

        $this->db->set($vals);
        if ($id != '') {
            $this->db->where('id', $id);
            $this->db->update($this->table_name);
        } else {
            $this->db->insert($this->table_name);
        }
    }
}
?>
