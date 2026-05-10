<?php

class Abundant_cart extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('cart_model');
    }

    function index()
    {

        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/abundant-cart';

        $this->data['rows'] = $this->cart_model->get_abundant_carts();
        // pr($this->data['rows']);
        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);

    }

    function detail($id = 0)
    {
        $id = intval($id);
        if($this->data['row'] = $this->cart_model->get_abundant_cart($id)){
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


                $this->cart_model->save($vals, $id);
                setMsg('success', 'Order status has been saved successfully.');
                redirect(ADMIN . '/Orders/detail/'.$id, 'refresh');
                exit;
            }
            $this->data['row']->products = $this->cart_model->get_abundant_cart_items($this->data['row']->mem_id);
            $this->data['pageView'] = ADMIN . '/abundant-cart';
            $this->load->view(ADMIN . '/includes/siteMaster',$this->data);
        }
        else
            show_404();
    }
}

?>