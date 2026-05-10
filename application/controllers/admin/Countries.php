<?php
class Countries extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(10);
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/countries';
        $this->data['rows'] = $this->master->getRows('countries');
        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['pageView'] = ADMIN . '/countries';
        if ($this->input->post()) {
            $vals = html_escape($this->input->post());
            $this->master->save('countries', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Country has been saved successfully!');
            redirect( ADMIN . '/countries', 'refresh');
            exit;
        }
        $this->data['row'] = $this->master->getRow('countries', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Country" : "Add New Country";
        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('countries', 'id', $this->uri->segment('4'));
        setMsg('success', 'Country has been deleted successfully!');
        redirect(ADMIN . '/countries', 'refresh');
        exit;
    }
}
?>