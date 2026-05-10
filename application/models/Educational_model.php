<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Educational_model extends CRUD_model
{
    public function __construct()
    {
    	parent::__construct();
        $this->table_name = "educational_videos";
        $this->field = "id";
    }
}
?>

