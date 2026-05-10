<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]

class Bcategory_model extends CRUD_model
{
    public function __construct()
    {
    	parent::__construct();
        $this->table_name = "blog_categories";
        $this->field = "id";
    }
}
?>
