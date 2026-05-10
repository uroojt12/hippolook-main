<?php
class Cities extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        has_access(19);
    }

    function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/cities';
        $this->data['rows'] = $this->master->getRows('cities');
        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['pageView'] = ADMIN . '/cities';
        if ($this->input->post()) {
            $vals = html_escape($this->input->post());
            $this->master->save('cities',$vals,'id', $this->uri->segment(4));
            setMsg('success', 'City has been saved successfully.');
            redirect( ADMIN . '/cities', 'refresh');
            exit;
        }
        $this->data['row'] = $this->master->getRow('cities',array('id'=>$this->uri->segment('4')));
        $this->data['page_title']=$this->data['row']?"Edit City":"Add New City";
        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }

    function delete() {
        $this->master->delete('cities', 'id', $this->uri->segment('4'));
        setMsg('success', 'City has been deleted successfully.');
        redirect(ADMIN . '/cities', 'refresh');
        exit;
    }
}
?>