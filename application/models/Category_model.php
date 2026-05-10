<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CRUD_model
{
    public function __construct()
    {
    	parent::__construct();
        $this->table_name = "categories";
        $this->field = "id";
    }

    function get_cats($type = 'product', $parent_id = 0, $status = 1)
    {
    	return $this->get_rows(['type' => 'product', 'parent_id' => $parent_id, 'status' => $status]);
    }
}
?>