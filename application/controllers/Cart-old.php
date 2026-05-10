<?php
class Cart extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('cart_model');
        $this->load->model('member_model');
        $this->load->model('product_model');
    }

    public function index()
    {
        // $this->isMemLogged($this->session->mem_type);

        /*if ($this->input->post('cart_update') == 'posted') {
            $vals = html_escape($this->input->post());
            if (count($vals['qty']) > 0) {
                foreach ($vals['qty'] as $key => $val){
                    $new_vals['qty'] = $val;
                    $this->cart_model->save($new_vals, $key);
                }
            }
            setMsg('success', 'Cart items updated successfully !');
            redirect('cart', 'refresh');
            exit;
        }*/

        // $this->data['cart_items'] = $this->cart_model->get_cart_products();
        $product = $this->product_model->get_product($this->data['cart_items'][0]->p_id, 1);

        $this->data['related_products'] = $this->product_model->get_related_products($product, 8);

        $this->load->view('pages/shopping-cart', $this->data);
    }

    public function information()
    {
        // $this->isMemLogged($this->session->mem_type);
        $this->data['gtotal'] = $this->cart_model->get_cart_total();
        if ($this->data['gtotal'] <= 0) {
            redirect('cart', 'refresh');
            exit;
        }

        if ($this->input->post()) {
            $res = array();
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $res['msg'] = '';
            $this->form_validation->set_message('integer', 'Please select a valid {field}');

            $this->form_validation->set_rules('ship_fname', 'First Name', 'required');
            $this->form_validation->set_rules('ship_lname', 'Last Name', 'required');
            $this->form_validation->set_rules('ship_address', 'Address', 'required');
            $this->form_validation->set_rules('ship_house_number', 'House Number', 'required');
            $this->form_validation->set_rules('ship_zip', 'Postal Code', 'required');
            $this->form_validation->set_rules('ship_city', 'City', 'required');
            $this->form_validation->set_rules('ship_country', 'Country', 'required');
            $this->form_validation->set_rules('ship_phone', 'Phone Number', 'required');
            if (!$this->data['mem_data']) {
                $this->form_validation->set_rules('fname', 'First Name', 'required');
                $this->form_validation->set_rules('lname', 'Last Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                // $this->form_validation->set_rules('phone', 'Phone', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                // $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
            }

            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());

                if (!$country_row = $this->master->getRow('countries', ['name' => $post['ship_country']])) {
                    $res['msg'] = showMsg('error', 'Please select a valid color');
                    exit(json_encode($res));
                }

                if (!$this->data['mem_data']) {
                    $mem_row = $this->member_model->emailExists($post['email']);
                    if (count($mem_row) == '0') {
                        $rando = doEncode($post['email'] . '-' . rand(99, 999));
                        $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

                        $mem_data = array('mem_fname' => $post['fname'], 'mem_lname' => $post['lname'], 'mem_email' => $post['email'], 'mem_pswd' => doEncode($post['password']), 'mem_code' => $rando, 'mem_type' => 'member', 'mem_status' => 1, 'mem_address1' => $post['ship_address'], 'mem_house_number' => $post['ship_house_number'], 'mem_zip' => $post['ship_zip'], 'mem_country' => $post['ship_country'], 'mem_phone' => $post['ship_phone']);
                        $mem_id = $this->member_model->save($mem_data);

                        if (!empty($post['notified'])) {
                            $row = $this->master->getRow('newsletter', array('email' => $post['email']));
                            if (!$row)
                                $this->master->save('newsletter', array('email' => $post['email'], 'mem_id' => $this->session->mem_id));
                        }
                    } else {
                        $res['msg'] = showMsg('error', 'E-mail address already In use, If you have account please login first to process checkout');
                        // $res['msg'] = '<div class="alert alert-danger alert-sm">E-mail address already In use, If you have account please login first to process checkout</div>';
                        exit(json_encode($res));
                    }
                }
                $mem_id = $this->session->mem_id ? $this->session->mem_id : $mem_id;

                $this->session->set_userdata('mem_id', $mem_id);
                $this->session->set_userdata('mem_type', 'member');

                $this->cart_model->shift_cart();

                $mem_data = array('contact_email' => $post['email'], 'ship_fname' => $post['ship_fname'], 'ship_lname' => $post['ship_lname'], 'ship_company' => $post['ship_company'], 'ship_address' => $post['ship_address'], 'ship_house_number' => $post['ship_house_number'], 'ship_zip' => $post['ship_zip'], 'ship_city' => $post['ship_city'], 'ship_country' => $post['ship_country'], 'ship_phone' => $post['ship_phone']);
                $this->session->set_userdata('shipping_data', $mem_data);

                $this->session->set_userdata('delivery_cost', $country_row->delivery_cost);

                $res['redirect_url'] = site_url('cart/shipping');
                $res['status'] = 1;
            }
            exit(json_encode($res));
        }

        $this->load->view('pages/information', $this->data);
    }

    public function shipping()
    {
        $this->isMemLogged($this->session->mem_type, false);
        $this->data['gtotal'] = $this->cart_model->get_cart_total();
        if ($this->data['gtotal'] <= 0) {
            redirect('cart', 'refresh');
            exit;
        }

        if ($this->input->post()) {
            $res = array();
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $res['msg'] = '';
            $this->form_validation->set_message('integer', 'Please select a valid {field}');

            $this->form_validation->set_rules('shipment', 'Shipping  method', 'required|in_list[Free]', array('in_list' => '{field} should be valid'));

            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());

                $shipping_array = $this->session->shipping_data;
                $shipping_array['shipment'] = $post['shipment'];
                $this->session->set_userdata('shipping_data', $shipping_array);

                $res['redirect_url'] = site_url('cart/payment');
                $res['status'] = 1;
            }
            exit(json_encode($res));
        }

        $this->load->view('pages/shipping', $this->data);
    }

    public function payment()
    {
        $this->isMemLogged($this->session->mem_type, false);
        $this->data['gtotal'] = $this->cart_model->get_cart_total();
        if ($this->data['gtotal'] <= 0) {
            redirect('cart', 'refresh');
            exit;
        }


        if ($this->input->post()) {
            $res = array();
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $res['msg'] = '';
            $post = html_escape($this->input->post());

            $cart_items = $this->cart_model->get_cart_products();
            foreach ($cart_items as $key => $item) {
                if (!$product_row = $this->product_model->is_valid_product($item->p_id)) {
                    $res['msg'] = showMsg('error', "{$product_row->title} is out of Stock!");
                    exit(json_encode($res));
                }
            }

            $this->form_validation->set_message('integer', 'Please select a valid {field}');

            $this->form_validation->set_rules('shipment', 'Shipping  method', 'required|in_list[Free]', array('in_list' => '{field} should be valid'));
            $this->form_validation->set_rules('payment', 'Payment', 'required|in_list[credit-card,paypal]', array('in_list' => '{field} should be valid'));
            if ($post['payment'] == 'credit-card')
                $this->form_validation->set_rules('nonce', 'Nonce', 'required', array('required' => "Something went wrong!"));
            else
                $this->form_validation->set_rules('paypal_email', 'PayPal Address', 'required');
            $this->form_validation->set_rules('billing_option', 'Billing address option', 'required|in_list[same,different]', array('in_list' => 'Please select a valid {field}'));
            
            if($post['billing_address'] == 'different'){
                $this->form_validation->set_rules('billing_fname', 'First Name', 'required');
                $this->form_validation->set_rules('billing_lname', 'Last Name', 'required');
                $this->form_validation->set_rules('billing_address', 'Address', 'required');
                $this->form_validation->set_rules('billing_house_number', 'House Number', 'required');
                $this->form_validation->set_rules('billing_zip', 'Postal Code', 'required');
                $this->form_validation->set_rules('billing_city', 'City', 'required');
                $this->form_validation->set_rules('billing_country', 'Country/Region', 'required');
                $this->form_validation->set_rules('billing_phone', 'Phone Number', 'required');
            }
            
            if($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {

                $total_tax = round(($this->data['cart_total']*$this->data['site_settings']->site_tex_percentage)/100, 2);
                $amount = $this->data['cart_total'] + $this->session->delivery_cost + $total_tax - $this->session->discount_amount;
                if ($amount < 0.5) {
                    $res['msg']= showMsg('error', 'Order amount is too low to charge!');
                    exit(json_encode($res));
                }
                $paid = 0;
                if ($post['payment'] == 'credit-card') {
                    $this->load->library('my_stripe');
                    $charge_id = $this->my_stripe->charge_by_nonce($post['nonce'], $amount, "Charge for customer ".$this->data['mem_data']->mem_email);
                    if(empty($charge_id)){
                        $res['msg'] = showMsg('error', 'Something went worng please try again later!');
                        exit(json_encode($res));
                    }
                    $paid = 1;
                }

                // $this->load->model('cart_model');
                $this->load->model('order_model');

                if(!empty($post['remember'])) {
                    $mem_data = array('ship_fname' => $this->session->shipping_data['ship_fname'], 'ship_lname' => $this->session->shipping_data['ship_lname'], 'ship_company' => $this->session->shipping_data['ship_company'], 'ship_address' => $this->session->shipping_data['ship_address'], 'ship_house_number' => $this->session->shipping_data['ship_house_number'], 'ship_zip' => $this->session->shipping_data['ship_zip'], 'ship_city' => $this->session->shipping_data['ship_city'], 'ship_country' => $this->session->shipping_data['ship_country'], 'ship_phone' => $this->session->shipping_data['ship_phone']);
                    $this->member_model->save($mem_data, $this->session->mem_id);
                }
                $ovals = array('mem_id' => $this->session->mem_id, 'contact_email' => $this->session->shipping_data['contact_email'], 'ship_fname' => $this->session->shipping_data['ship_fname'], 'ship_lname' => $this->session->shipping_data['ship_lname'], 'ship_company' => $this->session->shipping_data['ship_company'], 'ship_address' => $this->session->shipping_data['ship_address'], 'ship_house_number' => $this->session->shipping_data['ship_house_number'], 'ship_zip' => $this->session->shipping_data['ship_zip'], 'ship_city' => $this->session->shipping_data['ship_city'], 'ship_country' => $this->session->shipping_data['ship_country'], 'ship_phone' => $this->session->shipping_data['ship_phone'], 'billing_fname' => $this->session->shipping_data['ship_fname'], 'billing_lname' => $this->session->shipping_data['ship_lname'], 'billing_company' => $this->session->shipping_data['ship_company'], 'billing_address' => $this->session->shipping_data['ship_address'], 'billing_house_number' => $this->session->shipping_data['ship_house_number'], 'billing_zip' => $this->session->shipping_data['ship_zip'], 'billing_city' => $this->session->shipping_data['ship_city'], 'billing_country' => $this->session->shipping_data['ship_country'], 'billing_phone' => $this->session->shipping_data['ship_phone'], 'discount_code' => $this->session->promocode, 'discount_amount' => $this->session->discount_amount, 'tax' => $this->data['site_settings']->site_tex_percentage, 'delivery_cost' => $this->session->delivery_cost, 'paid' => $paid);

                if($post['billing_address'] == 'different') {
                    $ovals['billing_fname'] = $post['billing_fname'];
                    $ovals['billing_lname'] = $post['billing_lname'];
                    $ovals['billing_company'] = $post['billing_company'];
                    $ovals['billing_address'] = $post['billing_address'];
                    $ovals['billing_house_number'] = $post['billing_house_number'];
                    $ovals['billing_zip'] = $post['billing_zip'];
                    $ovals['billing_city'] = $post['billing_city'];
                    $ovals['billing_country'] = $post['billing_country'];
                    $ovals['billing_phone'] = $post['billing_phone'];
                }

                $o_id = $this->order_model->save($ovals);
                foreach ($cart_items as $cart) {
                    if ($paid == 1)
                        $this->product_model->update_stock($cart->p_id, 1);
                    $items_data = array(
                        'o_id' => $o_id,
                        'p_id' => $cart->p_id,
                        'qty' => $cart->qty,
                        'size' => $cart->size,
                        // 'color' => $cart->color,
                        'shape' => $cart->shape,
                        // 'material' => $cart->material,
                        'price' => $cart->price,
                        'glasses' => $cart->glasses,
                        'status' => 0
                    );
                    switch ($cart->glasses) {
                        case 'Frame Only':
                            $items_data['lens_type'] = $cart->lens_type;
                            $items_data['lens_type_price'] = $cart->lens_type_price;
                            break;
                        case 'Prescription Lens':
                            $items_data['od_left_sph'] = $cart->od_left_sph;
                            $items_data['od_left_cyl'] = $cart->od_left_cyl;
                            $items_data['od_left_axis'] = $cart->od_left_axis;
                            $items_data['od_left_pd'] = $cart->od_left_pd;

                            $items_data['os_right_sph'] = $cart->os_right_sph;
                            $items_data['os_right_cyl'] = $cart->os_right_cyl;
                            $items_data['os_right_axis'] = $cart->os_right_axis;
                            $items_data['os_right_pd'] = $cart->os_right_pd;

                            $items_data['prescription_file'] = $cart->prescription_file;
                            $items_data['prescription_file_name'] = $cart->prescription_file_name;

                            $items_data['lens_type'] = $cart->lens_type;
                            $items_data['lens_type_price'] = $cart->lens_type_price;
                            $items_data['classic_lenses'] = $cart->classic_lenses;
                            $items_data['classic_lenses_price'] = $cart->classic_lenses_price;
                            break;
                        case 'Polarized Lens':
                            $items_data['lens_color'] = $cart->lens_color;
                            $items_data['lens_type'] = $cart->lens_type;
                            $items_data['lens_type_price'] = $cart->lens_type_price;
                            if ($cart->lens_type == 'Prescription') {

                                $items_data['od_left_sph'] = $cart->od_left_sph;
                                $items_data['od_left_cyl'] = $cart->od_left_cyl;
                                $items_data['od_left_axis'] = $cart->od_left_axis;
                                $items_data['od_left_pd'] = $cart->od_left_pd;

                                $items_data['os_right_sph'] = $cart->os_right_sph;
                                $items_data['os_right_cyl'] = $cart->os_right_cyl;
                                $items_data['os_right_axis'] = $cart->os_right_axis;
                                $items_data['os_right_pd'] = $cart->os_right_pd;

                                $items_data['prescription_file'] = $cart->prescription_file;
                                $items_data['prescription_file_name'] = $cart->prescription_file_name;
                            }
                            $items_data['classic_lenses'] = $cart->classic_lenses;
                            $items_data['classic_lenses_price'] = $cart->classic_lenses_price;
                            break;
                        case 'Transition Lens':
                            $items_data['lens_type'] = $cart->lens_type;
                            $items_data['lens_type_price'] = $cart->lens_type_price;
                            if ($cart->lens_type == 'Prescription') {

                                $items_data['od_left_sph'] = $cart->od_left_sph;
                                $items_data['od_left_cyl'] = $cart->od_left_cyl;
                                $items_data['od_left_axis'] = $cart->od_left_axis;
                                $items_data['od_left_pd'] = $cart->od_left_pd;

                                $items_data['os_right_sph'] = $cart->os_right_sph;
                                $items_data['os_right_cyl'] = $cart->os_right_cyl;
                                $items_data['os_right_axis'] = $cart->os_right_axis;
                                $items_data['os_right_pd'] = $cart->os_right_pd;

                                $items_data['prescription_file'] = $cart->prescription_file;
                                $items_data['prescription_file_name'] = $cart->prescription_file_name;
                            }

                            $items_data['lens_property'] = $cart->lens_property;
                            $items_data['lens_property_price'] = $cart->lens_property_price;

                            $items_data['classic_lenses'] = $cart->classic_lenses;
                            $items_data['classic_lenses_price'] = $cart->classic_lenses_price;
                            break;
                        case 'Progressive Lens':
                            $items_data['od_left_sph'] = $cart->od_left_sph;
                            $items_data['od_left_cyl'] = $cart->od_left_cyl;
                            $items_data['od_left_axis'] = $cart->od_left_axis;
                            $items_data['od_left_pd'] = $cart->od_left_pd;
                            $items_data['od_left_add'] = $cart->od_left_add;

                            $items_data['os_right_sph'] = $cart->os_right_sph;
                            $items_data['os_right_cyl'] = $cart->os_right_cyl;
                            $items_data['os_right_axis'] = $cart->os_right_axis;
                            $items_data['os_right_pd'] = $cart->os_right_pd;
                            $items_data['os_right_add'] = $cart->os_right_add;

                            $items_data['prescription_file'] = $cart->prescription_file;
                            $items_data['prescription_file_name'] = $cart->prescription_file_name;

                            $items_data['lens_type'] = $cart->lens_type;
                            $items_data['lens_type_price'] = $cart->lens_type_price;
                            
                            $items_data['classic_lenses'] = $cart->classic_lenses;
                            $items_data['classic_lenses_price'] = $cart->classic_lenses_price;
                            break;
                    }
                    $this->order_model->save_detail($items_data);
                }

                $this->cart_model->empty_cart();
                $this->session->unset_userdata('shipping_data');
                $this->session->unset_userdata('promocode');
                $this->session->unset_userdata('discount_amount');

                if ($post['payment'] == 'paypal') {
                    $res['msg'] = showMsg('success', "Order has been saved successfully, You will be redirected to Paypal");
                    $res['redirect_url'] = site_url('pay-now/'.doEncode($o_id));
                } else {
                    $order = $this->order_model->get_mem_order($this->session->mem_id, $o_id);

                    $mem_data = array('name' => $order->mem_name, 'to_name' => $order->mem_fname, "email" => $order->contact_email, 'row' => $order, 'order_status' => 'CONFIRMED');
                    send_site_email($mem_data, 'order', 'order');
                    send_site_admin_email($mem_data, 'order', 'order-admin');

                    $this->load->model('transaction_model');
                    $this->transaction_model->save(array('mem_id' => $this->session->mem_id, 'order_id' => $o_id, 'amount' => $amount, 'note' => 'Payment against order#'.num_size($o_id), 'charge_id' => $charge_id, 'status' => 1, 'date' => date('Y-m-d H:i:s')));
                    if(empty($this->data['mem_data']->mem_verified))
                        $res['msg'] = showMsg('success', "Order has been saved successfully. Please verify your email to access your account. Check your email!");
                    else
                        $res['msg'] = showMsg('success', "Order has been saved successfully!");
                    $res['redirect_url'] = site_url('account');
                }

                $res['status'] = 1;
            }
            exit(json_encode($res));
        }
        $this->load->view('pages/payment', $this->data);
    }

    public function add_item($id)
    {
        $id = intval($id);
        if ($product = $this->product_model->is_valid_product($id)) {
            if($this->input->post()) {
                $glasses = $this->master->getRows('glasses');
                $msg = '';
                $post = html_escape($this->input->post());

                $this->form_validation->set_message('integer', 'Please select a valid {field}');
                if (!empty($product->sunglasses))
                    $this->form_validation->set_rules('glasses', 'Choose Glasses', 'required|in_list[Non Prescription,Prescription Lens,Polarized Lens,Transition Lens,Progressive Lens]', array("in_list", "Please select valid {field} option"));
                else
                    $this->form_validation->set_rules('glasses', 'Choose Glasses', 'required');
                    // $this->form_validation->set_rules('glasses', 'Choose Glasses', 'required|in_list[Frame Only,Prescription Lens,Polarized Lens,Transition Lens,Progressive Lens]', array("in_list", "Please select valid {field} option"));

                switch ($post['glasses']) {
                    case 'Frame Only':
                        $this->form_validation->set_rules('frame_lens_type', 'Lens Type', 'required');
                        // $this->form_validation->set_rules('frame_lens_type', 'Lens Type', 'required|in_list[Clear Lenses,Blue Light Blocking]', array("in_list" => "Please select valid {field} option"));
                        break;
                    case 'Prescription Lens':
                        $this->form_validation->set_rules('prescription_lens_type', 'Lens Type', 'required');
                        // $this->form_validation->set_rules('prescription_lens_type', 'Lens Type', 'required|in_list[Classic Lenses,Blue Light Blocking]', array("in_list" => "Please select valid {field} option"));
                        $this->form_validation->set_rules('prescription_classic_lenses', 'Classic Lenses', 'required');
                        // $this->form_validation->set_rules('prescription_classic_lenses', 'Classic Lenses', 'required|in_list[Standard,Recommend,Advanced]', array("in_list" => "Please select valid {field} option"));
                        break;
                    case 'Polarized Lens':
                        $this->form_validation->set_rules('polarized_color', 'Choose colors', 'required');
                        // $this->form_validation->set_rules('polarized_lens_type', 'Lens Type', 'required');
                        $this->form_validation->set_rules('polarized_lens_type', 'Lens Type', 'required|in_list[Normal,Prescription]', array("in_list" => "Please select valid {field} option"));
                        
                        if ($post['polarized_lens_type'] == 'Prescription') {
                            // $this->form_validation->set_rules('dates', 'Dates', 'required', array('required' => 'Please select {field}!'));
                        }
                        $this->form_validation->set_rules('polarized_classic_lenses', 'Classic Lenses', 'required');
                        // $this->form_validation->set_rules('polarized_classic_lenses', 'Classic Lenses', 'required|in_list[Standard,Recommend,Advanced]', array("in_list" => "Please select valid {field} option"));

                        if (!empty($post['polarized_color']) && !$this->product_model->is_valid_color($post['polarized_color']))
                            $msg .= showMsg('error', 'Please select a valid color');
                        break;
                    case 'Transition Lens':
                        // $this->form_validation->set_rules('transition_lens_type', 'Lens Type', 'required');
                        $this->form_validation->set_rules('transition_lens_type', 'Lens Type', 'required|in_list[Clear Lens,Prescription]', array("in_list" => "Please select valid {field} option"));
                        
                        if ($post['transition_lens_type'] == 'Prescription') {
                            // $this->form_validation->set_rules('dates', 'Dates', 'required', array('required' => 'Please select {field}!'));
                        }
                        // $this->form_validation->set_rules('transition_lens_property', 'Lens Property', 'required');
                        $this->form_validation->set_rules('transition_lens_property', 'Lens Property', 'required|in_list[Normal Lens,Blue Light Blocking]', array("in_list" => "Please select valid {field} option"));
                        $this->form_validation->set_rules('transition_classic_lenses', 'Classic Lenses', 'required');
                        // $this->form_validation->set_rules('transition_classic_lenses', 'Classic Lenses', 'required|in_list[Standard,Recommend,Advanced]', array("in_list" => "Please select valid {field} option"));
                        break;
                    case 'Progressive Lens':
                        $this->form_validation->set_rules('progressive_lens_type', 'Lens Type', 'required');
                        // $this->form_validation->set_rules('progressive_lens_type', 'Lens Type', 'required|in_list[Normal Lenses,Blue Light Blocking,Transition Lense]', array("in_list" => "Please select valid {field} option"));
                        $this->form_validation->set_rules('progressive_classic_lenses', 'Classic Lenses', 'required');
                        // $this->form_validation->set_rules('progressive_classic_lenses', 'Classic Lenses', 'required|in_list[Standard,Recommend,Advanced]', array("in_list" => "Please select valid {field} option"));
                        break;
                }

                if($this->form_validation->run() === FALSE)
                    $msg .= validation_errors();
                    
                if (!empty($msg)) {
                    $this->session->set_userdata('error_msg', $msg);
                    redirect('product-detail/'.$product->id.'/'.url_title($product->title, '-', TRUE), 'refresh');
                    exit;
                }

                $item = array(
                    'p_id' => $id,
                    'size' => $product->size,
                    // 'color' => $product->color,
                    'shape' => $product->shape,
                    // 'material' => $product->material,
                    'qty' => 1,
                    'price' => $product->price,
                    'glasses' => $post['glasses'],
                );

                switch ($post['glasses']) {
                    case 'Frame Only':
                        $item['lens_type'] = $post['frame_lens_type'];
                        $item['lens_type_price'] = ($post['frame_lens_type'] == 'Clear Lenses' ? $glasses[0]->type_first_price : $glasses[0]->type_second_price);
                        break;
                    case 'Prescription Lens':
                        $item['od_left_sph'] = $post['prescription_od_left_sph'];
                        $item['od_left_cyl'] = $post['prescription_od_left_cyl'];
                        $item['od_left_axis'] = $post['prescription_od_left_axis'];
                        $item['od_left_pd'] = $post['prescription_od_left_pd'];

                        $item['os_right_sph'] = $post['prescription_os_right_sph'];
                        $item['os_right_cyl'] = $post['prescription_os_right_cyl'];
                        $item['os_right_axis'] = $post['prescription_os_right_axis'];
                        $item['os_right_pd'] = $post['prescription_os_right_pd'];

                        if (!empty($post['image'])) {
                            $file_names = @explode(',', $post['image']);
                            $item['prescription_file'] = $file_names[0];
                            $item['prescription_file_name'] = $file_names[1];
                        }

                        $item['lens_type'] = $post['prescription_lens_type'];
                        $item['lens_type_price'] = ($post['prescription_lens_type'] == 'Classic Lenses' ? $glasses[1]->type_first_price : $glasses[1]->type_second_price);
                        $item['classic_lenses'] = $post['prescription_classic_lenses'];
                        $classic_lenses = ['Standard' => $glasses[1]->classic_first_price, 'Recommend' => $glasses[1]->classic_second_price, 'Advanced' => $glasses[1]->classic_third_price];
                        $item['classic_lenses_price'] = $classic_lenses[$post['prescription_classic_lenses']];
                        break;
                    case 'Polarized Lens':
                        $item['lens_color'] = $post['polarized_color'];
                        $item['lens_type'] = $post['polarized_lens_type'];
                        if ($post['polarized_lens_type'] == 'Prescription') {
                            $item['lens_type_price'] = $glasses[2]->type_second_price;

                            $item['od_left_sph'] = $post['polarized_od_left_sph'];
                            $item['od_left_cyl'] = $post['polarized_od_left_cyl'];
                            $item['od_left_axis'] = $post['polarized_od_left_axis'];
                            $item['od_left_pd'] = $post['polarized_od_left_pd'];

                            $item['os_right_sph'] = $post['polarized_os_right_sph'];
                            $item['os_right_cyl'] = $post['polarized_os_right_cyl'];
                            $item['os_right_axis'] = $post['polarized_os_right_axis'];
                            $item['os_right_pd'] = $post['polarized_os_right_pd'];

                            if (!empty($post['image'])) {
                                $file_names = @explode(',', $post['image']);
                                $item['prescription_file'] = $file_names[0];
                                $item['prescription_file_name'] = $file_names[1];
                            }
                        } else {
                            $item['lens_type_price'] = $glasses[2]->type_first_price;
                        }
                        $item['classic_lenses'] = $post['polarized_classic_lenses'];
                        $classic_lenses = ['Standard' => $glasses[2]->classic_first_price, 'Recommend' => $glasses[2]->classic_second_price, 'Advanced' => $glasses[2]->classic_third_price];
                        $item['classic_lenses_price'] = $classic_lenses[$post['polarized_classic_lenses']];
                        break;
                    case 'Transition Lens':
                        $item['lens_type'] = $post['transition_lens_type'];
                        if ($post['transition_lens_type'] == 'Prescription') {
                            $item['lens_type_price'] = $glasses[3]->type_second_price;

                            $item['od_left_sph'] = $post['transition_od_left_sph'];
                            $item['od_left_cyl'] = $post['transition_od_left_cyl'];
                            $item['od_left_axis'] = $post['transition_od_left_axis'];
                            $item['od_left_pd'] = $post['transition_od_left_pd'];

                            $item['os_right_sph'] = $post['transition_os_right_sph'];
                            $item['os_right_cyl'] = $post['transition_os_right_cyl'];
                            $item['os_right_axis'] = $post['transition_os_right_axis'];
                            $item['os_right_pd'] = $post['transition_os_right_pd'];

                            if (!empty($post['image'])) {
                                $file_names = @explode(',', $post['image']);
                                $item['prescription_file'] = $file_names[0];
                                $item['prescription_file_name'] = $file_names[1];
                            }
                        } else {
                            $item['lens_type_price'] = $glasses[3]->type_first_price;
                        }

                        $item['lens_property'] = $post['transition_lens_property'];
                        $item['lens_property_price'] = ($post['transition_lens_property'] == 'Normal Lens' ? $glasses[3]->property_first_price : $glasses[3]->property_second_price);

                        $item['classic_lenses'] = $post['transition_classic_lenses'];
                        $classic_lenses = ['Standard' => $glasses[3]->classic_first_price, 'Recommend' => $glasses[3]->classic_second_price, 'Advanced' => $glasses[3]->classic_third_price];
                        $item['classic_lenses_price'] = $classic_lenses[$post['transition_classic_lenses']];
                        break;
                    case 'Progressive Lens':
                        $item['od_left_sph'] = $post['progressive_od_left_sph'];
                        $item['od_left_cyl'] = $post['progressive_od_left_cyl'];
                        $item['od_left_axis'] = $post['progressive_od_left_axis'];
                        $item['od_left_pd'] = $post['progressive_od_left_pd'];
                        $item['od_left_add'] = $post['progressive_od_left_add'];

                        $item['os_right_sph'] = $post['progressive_os_right_sph'];
                        $item['os_right_cyl'] = $post['progressive_os_right_cyl'];
                        $item['os_right_axis'] = $post['progressive_os_right_axis'];
                        $item['os_right_pd'] = $post['progressive_os_right_pd'];
                        $item['os_right_add'] = $post['progressive_os_right_add'];

                        if (!empty($post['image'])) {
                            $file_names = @explode(',', $post['image']);
                            $item['prescription_file'] = $file_names[0];
                            $item['prescription_file_name'] = $file_names[1];
                        }

                        $item['lens_type'] = $post['progressive_lens_type'];
                        $lens_types = ['Normal Lenses' => $glasses[4]->type_first_price, 'Blue Light Blocking' => $glasses[4]->type_second_price, 'Transition Lense' => $glasses[4]->type_third_price];
                        $item['lens_type_price'] = $lens_types[$post['progressive_lens_type']];
                        
                        $item['classic_lenses'] = $post['progressive_classic_lenses'];
                        $classic_lenses = ['Standard' => $glasses[4]->classic_first_price, 'Recommend' => $glasses[4]->classic_second_price, 'Advanced' => $glasses[4]->classic_third_price];
                        $item['classic_lenses_price'] = $classic_lenses[$post['progressive_classic_lenses']];
                        break;
                }
                $this->cart_model->item_exist($item);
                if ($cart_item = $this->cart_model->item_exist($item)) {
                    $item['qty'] = $cart_item->qty + intval($qty);
                    $this->cart_model->save_item($item, $cart_item->id);
                } else {
                    $this->cart_model->save_item($item);
                }
                setMsg('success', 'Product added to cart successfully !');
                redirect('cart', 'refresh');
                exit;


            }
        } else {
            setMsg('error', 'Product out of stock!');
            redirect('cart', 'refresh');
            exit;
            // redirect('product-detail/'.doEncode('p-'.$product->id).'/'.toSlugUrl($product->title), 'refresh');
        }
    }

    public function update_item($id)
    {
        $id = intval(substr(doDecode($id), 2));
        if ($row = $this->cart_model->get_cart_item($id)) {
            $post = html_escape($this->input->post());
            $qty = intval($post['qty']) > 0 ? $post['qty'] : 1;
            $size = $post['size'];
            $color = $post['color'];

            $product = $this->product_model->get_product($row->p_id, 1);

            if (empty($product->availability)) {
                setMsg('error', 'Product is out of stock !');
                redirect("product-detail/{$row->p_id}/" . url_title($product->title, '-', TRUE), 'refresh');
            }
            if (!$this->product_model->is_valid_color($row->p_id, $color)) {
                setMsg('error', 'Product color is not valid!');
                redirect("product-detail/{$row->p_id}/" . url_title($product->title, '-', TRUE), 'refresh');
            }
            if (!$size_row = $this->product_model->is_valid_size($row->p_id, $size)) {
                setMsg('error', 'Product size is not valid!');
                redirect("product-detail/{$row->p_id}/" . url_title($product->title, '-', TRUE), 'refresh');
            }
            $item = array(
                'size' => $size,
                'color' => $color,
                'qty' => $qty,
                'price' => $size_row->price
            );

            $this->cart_model->save_item($item, $id);

            setMsg('success', 'Cart updated successfully !');
            redirect('cart', 'refresh');
            exit;
        } else
            show_404();
    }

    public function remove_item($id)
    {
        $id = intval(substr(doDecode($id), 2));
        if ($this->cart_model->get_cart_item($id)) {
            $this->cart_model->delete_item($id);
            if (empty($this->cart_model->get_cart_count())) {
                $this->session->unset_userdata('promocode');
                $this->session->unset_userdata('discount_amount');
            }
            setMsg("success", "Product deleted from cart successfully !");
            redirect('cart', 'refresh');
            exit;
        } else
            show_404();
    }

    public function delete_item($cart_id)
    {
        $this->cart_model->delete_item($cart_id);
        $items = $this->cart_model->get_cart_count();
        $amount = $this->cart_model->get_cart_total();
        echo $items . '<|>' . $amount;
    }

    public function complete()
    {
        $this->data = array(
            'pageView' => 'pages/order_complete',
            'order_id' => $this->session->userdata('order_id'),
            'order_amount' => $this->session->userdata('order_amount'),
            'order_payment' => $this->session->userdata('order_payment')
        );

        if (empty($this->data['order_id']) || empty($this->data['order_amount']) || empty($this->data['order_payment'])) {
            redirect('products', 'refresh');
            exit;
        }

        $this->load->view('includes/siteMaster', $this->data);
    }

    public function reference()
    {
        $this->data = array(
            'pageView' => 'pages/reference'
        );

        if ($post = $this->input->post()) {
            $site = getSite();

            if (isset($_FILES["up_file"]["name"]) && $_FILES["up_file"]["name"] != "") {
                $image = upload_file('./uploads/files/', 'up_file');
                //pr($image);exit;
                if (!empty($image['file_name'])) {
                    $post["up_file"] = $image['file_name'];
                } else {
                    $this->session->set_flashdata('errorMsg', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect('admin/banners', 'refresh');
                }
            }

            $msg_body = "
            <style type='text/css'>
            .borderColor {
                background-color: #f7f7f7;
                border: 1px solid #f0f0f0;
            }
            .textWhiteHeader {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                color: #FFFFFF;
                font-weight: bold;
            }
            .mainText {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                line-height: 18px;
                color: #666;
            }
            .mainHeading {
                font-family: Arial;
                font-size: 20px;
                line-height: normal;
                color: #ED1C24;
                font-weight: bold;
                padding-left: 15px;
            }
            .footer {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                color: #000;
            }
            p {
                color: #484848;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                line-height: 18px;
                font-weight: normal;
            }
            .borderColor2 {
                background-color: #ffffff;
                border: 1px solid #f0f0f0;
                padding-top: 5px;
                padding-left: 10px;
                padding-bottom: 5px;
                padding-right: 10px;
                font-family: Arial;
                font-size: 14px;
                color: #ED1C24;
            }
            </style>
            <table  border='0' align='center' cellpadding='0' cellspacing='0' width='650'>
            <tr>
            <td ><table width='100%'  border='0'>
            <tr>
            <td width='25%' style='background:#fff;height:85px;' align='center' ><a href='" . base_url() . "'><img src='" . base_url() . "assets/images/logo.png' height='80' /></a></td>
            <td align='left' valign='middle' style='background:#fff;font-family: Arial;font-size:14px;line-height: normal;color: #DA251C;font-weight: bold;vertical-align:middle;text-align:right'>Dated (" . date('d M, Y h:i A') . ") </td>
            </tr>
            </table></td>
            </tr>
            <tr>
            <td height='2'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
            <td height='2' bgcolor='#DA251C' class='textWhiteHeader' style='padding:5px;'></td>
            </tr>
            </table></td>
            </tr>
            <tr>
            <td>
            <table width='100%'  border='0' cellpadding='0' cellspacing='0'>
            <tr>
            <td valign='top' bgcolor='#fafafa' style='padding:15px;'>
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
            <td height='2' bgcolor='#DA251C' class='textWhiteHeader' style='padding-left:10px;padding-bottom:5px;padding-right:10px;'></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td>
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
            <td style='background-color: #ffffff;border: 1px solid #f0f0f0;padding-top:5px; padding-left:10px;padding-bottom:5px;padding-right:10px;font-family: Arial;font-size: 14px;color: #333;line-height:25px;' align='center'>

            <p style='text-align:left;padding:1px 20px;'>Dear Admin,</p>
            <p style='text-align:left;padding:1px 20px;'>Your have received the following payment detail:</p>
            <div style='text-align:left;padding:5px 20px;'>
            <table width='100%' border='0' style='font-size:12px;'>
            <tr>
            <td width='20%'><strong>Name</strong></td>
            <td width='80%'>" . $vals['mem_name'] . "</td>
            </tr>
            <tr>
            <td><strong>Email</strong></td>
            <td>" . $vals['mem_email'] . "</td>
            </tr>
            <tr>
            <td><strong>Order #</strong></td>
            <td>" . setInvoiceNo($vals['mem_order']) . "</td>
            </tr>
            <tr>
            <td><strong>Paid Amount</strong></td>
            <td>" . ($vals['mem_payed_amount']) . " PKR</td>
            </tr>
            <td><strong>Payment Method</strong></td>
            <td>" . ($vals['mem_payed_method']) . "</td>
            </tr>";
            if (isset($vals['up_file']) && !empty($vals['up_file'])) {
                $msg_body .= "<tr>
                <td><strong>Attachment</strong></td>
                <td><a href='" . base_url() . "uploads/files/" . $vals['up_file'] . "' target='_blank'>Click here to see</a></td>
                </tr>";
            }
            $msg_body .= "
            <tr>
            <td><strong>Payment Detail</strong></td>
            <td>" . $vals['mem_detail'] . "</td>
            </tr>
            <tr>
            <td colspan='2'>&nbsp;</td>
            </tr>                      
            </table>
            </div>		
            </td>
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td height='2' bgcolor='#DA251C' class='textWhiteHeader' style='padding-left:10px;padding-bottom:5px;padding-right:10px;'></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            </table>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td height='30' bgcolor='#DA251C' class='footer' style='padding-left:20px;color:#fff;'>" . getSite('site_copyright') . "</td>
            </tr>
            </table>";

            $emailto = $site->site_email;
            $subject = getSite('site_name') . " : ORDER PAYMENT REFERENCE";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html;charset=utf-8\r\n";
            $headers .= "From: " . $vals['mem_name'] . " <" . $vals['mem_email'] . ">" . "\r\n";
            $headers .= "Reply-To: '" . $vals['mem_name'] . " <" . $vals['mem_email'] . ">" . "\r\n";
            $body = $msg_body;
            @mail($emailto, $subject, $body, $headers);

            $msg_body = "
            <style type='text/css'>
            .borderColor {
                background-color: #f7f7f7;
                border: 1px solid #f0f0f0;
            }
            .textWhiteHeader {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                color: #FFFFFF;
                font-weight: bold;
            }
            .mainText {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                line-height: 18px;
                color: #666;
            }
            .mainHeading {
                font-family: Arial;
                font-size: 20px;
                line-height: normal;
                color: #ED1C24;
                font-weight: bold;
                padding-left: 15px;
            }
            .footer {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                color: #000;
            }
            p {
                color: #484848;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                line-height: 18px;
                font-weight: normal;
            }
            .borderColor2 {
                background-color: #ffffff;
                border: 1px solid #f0f0f0;
                padding-top: 5px;
                padding-left: 10px;
                padding-bottom: 5px;
                padding-right: 10px;
                font-family: Arial;
                font-size: 14px;
                color: #ED1C24;
            }
            </style>
            <table  border='0' align='center' cellpadding='0' cellspacing='0' width='650'>
            <tr>
            <td ><table width='100%'  border='0'>
            <tr>
            <td width='25%' style='background:#fff;height:85px;' align='center' ><a href='" . base_url() . "'><img src='" . base_url() . "assets/images/logo.png' height='80' /></a></td>
            <td align='left' valign='middle' style='background:#fff;font-family: Arial;font-size:14px;line-height: normal;color: #DA251C;font-weight: bold;vertical-align:middle;text-align:right'>Dated (" . date('d M, Y h:i A') . ") </td>
            </tr>
            </table></td>
            </tr>
            <tr>
            <td height='2'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
            <td height='2' bgcolor='#DA251C' class='textWhiteHeader' style='padding:5px;'></td>
            </tr>
            </table></td>
            </tr>
            <tr>
            <td>
            <table width='100%'  border='0' cellpadding='0' cellspacing='0'>
            <tr>
            <td valign='top' bgcolor='#fafafa' style='padding:15px;'>
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
            <td height='2' bgcolor='#DA251C' class='textWhiteHeader' style='padding-left:10px;padding-bottom:5px;padding-right:10px;'></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td>
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
            <td style='background-color: #ffffff;border: 1px solid #f0f0f0;padding-top:5px; padding-left:10px;padding-bottom:5px;padding-right:10px;font-family: Arial;font-size: 14px;color: #333;line-height:25px;' align='center'>

            <p style='text-align:left;padding:1px 20px;'>Dear " . $vals['mem_name'] . ",</p>
            <p style='text-align:left;padding:1px 20px;'>Your have sent the following payment detail:</p>
            <div style='text-align:left;padding:5px 20px;'>
            <table width='100%' border='0' style='font-size:12px;'>
            <tr>
            <td width='20%'><strong>Name</strong></td>
            <td width='80%'>" . $vals['mem_name'] . "</td>
            </tr>
            <tr>
            <td><strong>Email</strong></td>
            <td>" . $vals['mem_email'] . "</td>
            </tr>
            <tr>
            <td><strong>Order #</strong></td>
            <td>" . setInvoiceNo($vals['mem_order']) . "</td>
            </tr>
            <tr>
            <td><strong>Paid Amount</strong></td>
            <td>" . ($vals['mem_payed_amount']) . " PKR</td>
            </tr>
            <td><strong>Payment Method</strong></td>
            <td>" . ($vals['mem_payed_method']) . "</td>
            </tr>";
            if (isset($vals['up_file']) && !empty($vals['up_file'])) {
                $msg_body .= "<tr>
                <td><strong>Attachment</strong></td>
                <td><a href='" . base_url() . "uploads/files/" . $vals['up_file'] . "' target='_blank'>Click here to see</a></td>
                </tr>";
            }
            $msg_body .= "
            <tr>
            <td><strong>Payment Detail</strong></td>
            <td>" . $vals['mem_detail'] . "</td>
            </tr>
            <tr>
            <td colspan='2'>&nbsp;</td>
            </tr>                      
            </table>
            </div>		
            </td>
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td height='2' bgcolor='#DA251C' class='textWhiteHeader' style='padding-left:10px;padding-bottom:5px;padding-right:10px;'></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            </table>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td height='30' bgcolor='#DA251C' class='footer' style='padding-left:20px;color:#fff;'>" . getSite('site_copyright') . "</td>
            </tr>
            </table>";

            $emailto = $vals['mem_email'];
            $subject = getSite('site_name') . " : ORDER PAYMENT REFERENCE";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html;charset=utf-8\r\n";
            $headers .= "From: " . $site->site_name . " <" . $site->site_email . ">" . "\r\n";
            $headers .= "Reply-To: '" . $site->site_name . " <" . $site->site_email . ">" . "\r\n";
            $body = $msg_body;
            @mail($emailto, $subject, $body, $headers);

            setMsg("success", "Your payment detail has been sent to admin successfully.");
            redirect('order/reference', 'refresh');
            exit;
        }

        if ($this->uri->segment(3) != '') {
            $this->data['ref_no'] = setInvoiceNo($this->uri->segment(3));
            $this->data['ref_disable'] = 'yes';
        } else if ($this->session->userdata('order_id') != '') {
            $this->data['ref_no'] = setInvoiceNo($this->session->userdata('order_id'));
            $this->data['ref_disable'] = 'no';
        }

        $this->load->view('includes/siteMaster', $this->data);
    }

    public function empty_cart()
    {
        $this->cart_model->empty_cart();
        setMsg("error", "Products deleted from cart successfully!");
        redirect('cart', 'refresh');
        exit;
    }

    function redeem_code()
    {
        if ($this->input->post()) {
            $res = array();
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $res['msg'] = '';

            $post = html_escape($this->input->post());
            $this->form_validation->set_rules('promocode', 'Discount Code', 'required');

            if ($this->form_validation->run() === FALSE)
                $res['msg'] = validation_errors();

            $this->load->model('promocode_model');
            if (!empty($post['promocode']) && !$promocode_row = $this->promocode_model->is_valid_promocode($post['promocode']))
                $res['msg'] .= showMsg('error', 'Invalid Discount code!');
            if (!empty($this->session->promocode) && $post['promocode'] == $this->session->promocode)
                $res['msg'] .= showMsg('error', 'You already used this Discount code!');

            if (!empty($res['msg']))
                exit(json_encode($res));

            $discount = $promocode_row->code_type == 'fixed' ? floatval($promocode_row->amount) : floatval(round(($this->data['cart_total'] * $promocode_row->amount) / 100, 2));

            if ($discount > $this->data['cart_total']) {
                $res['msg'] = showMsg('error', 'This code is Invalid for this total!');
                exit(json_encode($res));
            }


            $this->session->set_userdata('discount_amount', $discount);
            $this->session->set_userdata('promocode', $promocode_row->code);

            $this->promocode_model->update_code_used($promocode_row->id);

            $res['status'] = 1;
            $res['redirect_url'] = ' ';
            exit(json_encode($res));
        } else
            show_404();
    }
}
