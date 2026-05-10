<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Policy_model extends CRUD_model
{

    public function __construct()
    {
    	parent::__construct();
        $this->table_name = "policies";
        $this->field = "id";
    }
}
?>

