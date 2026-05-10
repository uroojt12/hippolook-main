<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[AllowDynamicProperties]

class Payment_methods_model extends CRUD_model
{

    public function __construct()
    {
    	parent::__construct();
        $this->table_name = "payment_methods";
        $this->field = "id";
    }

    function get_mem_method($id, $mem_id = 0)
    {
        $mem_id = $mem_id > 0 ? $mem_id : $this->session->mem_id;
        $this->db->where('mem_id', $mem_id);
        $this->db->where('id', $id);
        $query=$this->db->get($this->table_name);
        return $query->row();
    }

    function get_default_method($mem_id = 0)
    {
        $mem_id = $mem_id > 0 ? $mem_id : $this->session->mem_id;
        $this->db->where('mem_id', $mem_id);
        $this->db->where('default_method', 1);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_methods($mem_id = 0, $banks = false)
    {
        $mem_id = $mem_id > 0 ? $mem_id : $this->session->mem_id;
        $this->db->where('mem_id', $mem_id);
        if ($banks)
            $this->db->where('method_token', NULL);

        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_credit_cards($mem_id = 0)
    {
        $mem_id = $mem_id > 0 ? $mem_id : $this->session->mem_id;
        $this->db->where('mem_id', $mem_id);
        $this->db->where('paypal', NULL);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
}
?>
