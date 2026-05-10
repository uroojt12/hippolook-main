<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]

class Product_model extends CRUD_model
{

    public function __construct()
    {
    	parent::__construct();
        $this->table_name = "products";
        $this->field = "id";
    }

    function update_stock($id, $qty, $sign = '-')
    {
        if($sign == '+') {
            $this->db->set('stock', 'stock+'.$qty, FALSE);
            $this->db->where('id', $id);
            $this->db->update($this->table_name);
            return true;
        } elseif($sign == '-') {
            $this->db->set('stock', 'stock-'.$qty, FALSE);
            $this->db->where('id', $id);
            $this->db->update($this->table_name);
            return true;
        }
        return false;
    }

    function is_valid_product($id, $qty, $where = '')
    {
        $this->db->where('id', $id);
        $this->db->where('stock>=', $qty);
        $this->db->where('status', 1);
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_product($id, $status = 1)
    {
        $row = $this->get_row_where(['id' => $id, 'status' => 1]);
        if ($row) {
            $row->images = get_gallery_images($id);
            /*$row->sizes = $this->master->getRows('product_sizes', ['p_id' => $id]);
            $row->colors = $this->master->getRows('product_colors', ['p_id' => $id]);*/
        }
        return $row;
    }

    function get_related_products($product, $limit = 4)
    {
    	$this->db->select("p.*");
    	$this->db->where('id<>', $product->id);
    	$this->db->where('status', 1);

        $this->db->group_start()
        // ->where('cat_ids', $product->cat_id)
        ->or_where('gender', $product->gender)
        // ->or_where('color', $product->color)
        ->or_where('shape', $product->shape)
        // ->or_where('material', $product->material)
        // ->or_where('size', $product->size)
        ->group_end();

        $this->db->limit($limit);
        return $this->db->get($this->table_name.' p')->result();
    }

    function search($query, $start = '', $offset = '')
    {
		// pr($query);
        $this->db->select("p.*");
        $this->db->from($this->table_name.' p');
        /*$this->db->join('product_sizes ps', "ps.p_id = p.id");
        $this->db->join('product_colors pc', "pc.p_id = p.id");*/
        

        if (!empty($query['price'])) {
            $ary = @explode(';', $query['price']);
            $min_price = floatval(trim($ary[0]));
            $max_price = floatval(trim($ary[1]));
            $this->db->where("( p.price >= $min_price  AND p.price <= $max_price ) ", null, false);
        }

        $this->db->where('p.status', 1);
        // $this->db->where('p.stock>', 0);
        
        if (!empty($query['q']))
            $this->db->like('p.title', $query['q']);
        
        if(!empty($query['gender']) && $query['gender'] != 'Both')
        	$this->db->where("FIND_IN_SET('{$query['gender']}', p.gender)>", 0);
            // $this->db->where('p.gender', $query['gender']);

        if(!empty($query['cat_id']) && intval($query['cat_id']) > 0)
            $this->db->where("FIND_IN_SET({$query['cat_id']}, p.cat_ids)>", 0);
            // $this->db->where_in('p.cat_id', $query['cat_id']);
        /*if(!empty($query['cats']) && count($query['cats']) > 0 && $query['cats'][0] != '')
        	$this->db->where_in('p.sub_cat_id', $query['cats']);*/

        /*if(!empty($query['colors']) && count($query['colors']) > 0 && $query['colors'][0] != '')
        	$this->db->where_in('p.color', $query['colors']);*/
        if(!empty($query['shapes']) && count($query['shapes']) > 0 && $query['shapes'][0] != '')
        	$this->db->where_in('p.shape', $query['shapes']);
        /*if(!empty($query['materials']) && count($query['materials']) > 0 && $query['materials'][0] != '')
            $this->db->where_in('p.material', $query['materials']);*/
        if(!empty($query['sizes']) && count($query['sizes']) > 0 && $query['sizes'][0] != '')
            $this->db->where_in('p.size', $query['sizes']);

        
        if (!empty($query['sort_by']) && in_array($query['sort_by'], array('alphabets_asc', 'alphabets_desc', 'price_asc', 'price_desc', 'date_asc', 'date_desc'))) {
        	switch ($query['sort_by']) {
        		case 'alphabets_asc':
        			$field = 'title';
        			$order = 'asc';
        			break;
        		case 'alphabets_desc':
        			$field = 'title';
        			$order = 'desc';
        			break;
        		case 'price_asc':
        			$field = 'price';
        			$order = 'asc';
        			break;
        		case 'price_desc':
        			$field = 'price';
        			$order = 'desc';
        			break;
        		case 'date_desc':
        			$field = 'date';
        			$order = 'desc';
        			break;
        		default:
	        		$field = 'date';
	        		$order = 'asc';
	        		break;
        	}
            $this->db->order_by($field, $order);
        }
        
        $this->db->group_by('p.id');
        if (!empty($offset))
        	$this->db->limit($offset, $start);

        $query = $this->db->get();
        // print_query();
        $rows = array();
        foreach ($query->result() as $key => $row) {
            $rows[$key] = $row;
            // $rows[$key]->total_favorites=$this->total_favorites($row->id);
        }
        return $rows;
    }

    function count_search_result($query)
    {
        $this->db->select("p.id");
        $this->db->from($this->table_name.' p');
        /*$this->db->join('product_sizes ps', "ps.p_id = p.id");
        $this->db->join('product_colors pc', "pc.p_id = p.id");*/
        

        if (!empty($query['price'])) {
            $ary = @explode(';', $query['price']);
            $min_price = floatval(trim($ary[0]));
            $max_price = floatval(trim($ary[1]));
            $this->db->where("( p.price >= $min_price  AND p.price <= $max_price ) ", null, false);
        }

        $this->db->where('p.status', 1);
        // $this->db->where('p.stock>', 0);

        if (!empty($query['q']))
            $this->db->like('p.title', $query['q']);

        if(!empty($query['gender']) && $query['gender'] != 'Both')
            $this->db->where("FIND_IN_SET('{$query['gender']}', p.gender)>", 0);
            // $this->db->where('p.gender', $query['gender']);
        
        if(!empty($query['cat_id']) && intval($query['cat_id']) > 0)
        	$this->db->where("FIND_IN_SET({$query['cat_id']}, p.cat_ids)>", 0);
            // $this->db->where('p.cat_id', $query['cat_id']);
        /*if(!empty($query['sub_cats']) && count($query['sub_cats']) > 0 && $query['sub_cats'][0] != '')
        	$this->db->where_in('p.sub_cat_id', $query['sub_cats']);

        if(!empty($query['colors']) && count($query['colors']) > 0 && $query['colors'][0] != '')
        	$this->db->where_in('pc.color', $query['colors']);
        if(!empty($query['sizes']) && count($query['sizes']) > 0 && $query['sizes'][0] != '')
        	$this->db->where_in('ps.size', $query['sizes']);*/

        /*if(!empty($query['colors']) && count($query['colors']) > 0 && $query['colors'][0] != '')
            $this->db->where_in('p.color', $query['colors']);*/
        if(!empty($query['shapes']) && count($query['shapes']) > 0 && $query['shapes'][0] != '')
            $this->db->where_in('p.shape', $query['shapes']);
        /*if(!empty($query['materials']) && count($query['materials']) > 0 && $query['materials'][0] != '')
            $this->db->where_in('p.material', $query['materials']);*/
        if(!empty($query['sizes']) && count($query['sizes']) > 0 && $query['sizes'][0] != '')
            $this->db->where_in('p.size', $query['sizes']);

        $this->db->group_by('p.id');

        $query = $this->db->get();
        return count($query->result());
    }

    function get_max_rate()
    {
        $this->db->select_max('price');
        $query = $this->db->get($this->table_name);
        return floatval($query->row()->price);
    }

    function is_valid_color($color)
    // function is_valid_color($id, $color, $column = 'color')
    {
        /*$this->db->where('p_id', $id);
        $this->db->where($column, $color);
        $query = $this->db->get('product_colors');
        return $query->row();*/
        $this->db->where('title', $color);
        $query = $this->db->get('colors');
        return $query->row();
    }

    function is_valid_size($id, $size)
    {
        $this->db->where('p_id', $id);
        $this->db->where('size', $size);
        $query = $this->db->get('product_sizes');
        return $query->row();

    }



    /*** favorites ***/

    function get_favorites($mem_id)
    {
        $this->db->select("p.*");
        $this->db->from($this->table_name.' p');
        $this->db->join('favorites f', "f.ref_id = p.id");
        $this->db->where('f.ref_type', "product");
        $this->db->where('f.mem_id', $mem_id);
        return $this->db->get()->result();
    }

    function count_mem_favorites($mem_id)
    {
        $this->db->select('f.*');
        $this->db->from($this->table_name.' p');
        $this->db->join('favorites f', "f.ref_id = p.id");
        $this->db->where('f.ref_type', "product");
        $this->db->where('f.mem_id', $mem_id);
        return intval($this->db->get()->num_rows());
    }
}
?>

