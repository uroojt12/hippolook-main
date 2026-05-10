<?php

class Orders extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(4);
        $this->load->model('order_model');
    }

    function index()
    {

        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/orders';

        $this->data['rows'] = $this->order_model->get_admin_orders('desc');
        // pr($this->data['rows']);
        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);

    }

    function detail($id = 0)
    {
        $id = intval($id);
        if($this->data['row'] = $this->order_model->get_admin_order($id)){
            if ($this->input->post()) {
                $vals = $this->input->post();

                $mem_data = array('name' => $this->data['row']->mem_name, 'to_name' => $this->data['row']->mem_fname, "email" => $this->data['row']->contact_email, 'row' => $this->data['row']);
                if ($this->data['row']->status != $vals['status'] && $vals['status'] == 1) {
                    $mem_data['order_status'] = 'SHIPPED';
                    $mem_data['order_line'] = $vals['shipping_msg'];
                    send_site_email($mem_data, 'order', 'order');
                } elseif ($this->data['row']->status != $vals['status'] && $vals['status'] == 2) {
                    $mem_data['order_status'] = 'DELIVERED';
                    $mem_data['order_line'] = 'Your order has been shipped and you can start tracking your order';
                    send_site_email($mem_data, 'order', 'order');
                }


                $this->order_model->save($vals, $id);
                setMsg('success', 'Order status has been saved successfully.');
                redirect(ADMIN . '/Orders/detail/'.$id, 'refresh');
                exit;
            }
            $this->data['row']->products = $this->order_model->get_detail($id);
            $this->data['pageView'] = ADMIN . '/orders';
            $this->load->view(ADMIN . '/includes/siteMaster',$this->data);
        }
        else
            show_404();
    }

    function print_invoice($id)
    {
        $id = intval($id);
        if($this->data['row'] = $this->order_model->get_admin_order($id)) {
            $this->data['row']->products = $this->order_model->get_detail($id);

            $html = $this->load->view(ADMIN . '/order-print', $this->data, TRUE);
            $this->load->library('m_pdf');
            $this->m_pdf->pdf->WriteHTML($html);

            $file_name = url_title($this->data['adminsite_setting']->site_name, '-', TRUE).'-order-invoice-'.num_size($this->data['row']->id).'-'.date('y-m-d');

            $this->m_pdf->pdf->Output($file_name.'.pdf', 'I');
        }
        else
            show_404();
    }
}

?>