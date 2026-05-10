<?php

class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
    }
    
    public function index() {
        $this->data['pageView'] = ADMIN."/dashboard";
        $this->data['dashboard'] = "1";
        $this->data['total_members'] = intval($this->master->num_rows('members', array('mem_type' => 'member')));
        $this->data['total_products'] = intval($this->master->num_rows('products'));

        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }
    
}

?>  