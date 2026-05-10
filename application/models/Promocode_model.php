<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]


class Promocode_model extends CRUD_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'promocodes';
        $this->field = "id";
        $this->update_expire_promocodes();
    }

    function get_promocode($id = '', $where = '') {
        if(!empty($id))
            $this->db->where('id', $id);
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_promocodes($where = '', $start = '', $offset = '', $order_by = 'asc')
    {
        if(!empty($where))
            $this->db->where($where);
        if (!empty($offset))
            $this->db->limit($offset, $start);
        if (!empty($order_by))
            $this->db->order_by('id', $order_by);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function is_valid_promocode($code, $where = '')
    {
        $this->db->where('code', $code);
        $this->db->where('code_used<', 'codes', FALSE);
        $this->db->where('status', 1);
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function update_expire_promocodes()
    {
        $this->db->set(array('status' => 0))
        ->where('status', 1)
        ->where("CURDATE()>expiry_date", null, false)
        ->update($this->table_name);
    }

    function total_promocodes($where = '')
    {
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return $query->num_rows();
    }

    function update_code_used($id, $sign = '+')
    {
        if ($row = $this->get_row($id)) {
            if($sign=='+' && $row->code_used<$row->codes){
                $this->db->set('code_used', 'code_used+1', FALSE);
                $this->db->where('id', $id);
                $this->db->where("code_used<codes");
                $this->db->update($this->table_name);
                if($row->codes > 0 && $row->code_used+1 >= $row->codes && $row->status == 1)
                    $this->save(array('status' => 0), $id);
                return true;
            }
            if($sign == '-' && $row->code_used > 0){
                $this->db->set('code_used', 'code_used-1', FALSE);
                $this->db->where('id', $id);
                $this->db->where("code_used<=codes");
                $this->db->update($this->table_name);
                if($row->codes > 0 && $row->code_used == $row->codes && $row->status == 0)
                    $this->save(array('status' => 1), $id);
                return true;
            }
        }
        return false;
    }
   /*
   function save_promocodes_transaction($vals, $id = '')
   {
        $this->db->set($vals);
        if ($id != '') {
            $this->db->where('id', $id);
            $this->db->update('promocodes_transactions');
            return $id;
        } else {
            $this->db->insert('promocodes_transactions');
            return $this->db->insert_id();
            
        }
    }

    function get_transactions($where = '', $start = '', $offset = '',$order_by = 'asc')
    {
        if(!empty($where))
            $this->db->where($where);
        if (!empty($offset))
            $this->db->limit($offset, $start);
        if (!empty($order_by))
            $this->db->order_by('id', $order_by);
        $query = $this->db->get($this->table_name.'_transactions');
        return $query->result();
    }

    function get_trx_detail($id, $where = '')
    {
        $this->db->where('id', $id);
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get('promocodes_transactions');
        $row = $query->row();
        if($row)
            $row->promocodes = $this->master->getRows($this->table_name, array('ct_id' => $row->id));
        return $row;
    }
    */
}
?>

