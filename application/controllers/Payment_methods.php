<?php

class Payment_methods extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->isMemLogged($this->session->mem_type);
		$this->load->model('payment_methods_model');
		$this->load->model('transaction_model');
		$this->load->library('my_stripe');
	}
	
	function index()
	{
		$this->isMemLogged('owner');
		if ($this->input->post()) {
			$res = array();
			$res['hide_msg'] = 0;
			$res['scroll_to_msg'] = 1;
			$res['status'] = 0;
			$res['frm_reset'] = 0;
			$res['redirect_url'] = 0;
			$post = html_escape($this->input->post());

			// if ($post['type'] == 'credit-card')
				$this->form_validation->set_rules('nonce', 'Nonce', 'required', array('required' => "Something went wrong!"));
			/*else
				$this->form_validation->set_rules('email', 'Paypal address', 'required|valid_email');*/

			if($this->form_validation->run() === FALSE)
			{
				$res['msg'] = validation_errors();
			}else{
				// if ($post['type'] == 'credit-card'){
					if(!$payment_method=$this->my_stripe->create_payment_method($this->data['mem_data']->mem_stripe_id, $post['nonce'])){
						$res['msg'] =showMsg("error", "Something went wrong, Please try again latter!");
						exit(json_encode($res));
					}

					$last_digits = $payment_method->last4;
					$method_token = $payment_method->id;
					$expiry = get_month_name($payment_method->exp_month).', '.$payment_method->exp_year;
					$image=str_replace(' ', '-', strtolower($payment_method->brand)).'.png';

					$save_data=array('mem_id' => $this->session->mem_id, 'last_digits' => $last_digits, 'expiry' => $expiry, 'method_token' => $method_token, 'image' => $image);

					if(!$this->payment_methods_model->get_default_method())
						$save_data['default_method'] = 1;

					$res['msg'] = showMsg('success', 'Credit card has been saved successfully!');
				/*}else{
					$save_data=array('mem_id' => $this->session->mem_id, 'paypal' => $post['email'], 'image' => 'paypal.png');
					$res['msg'] = showMsg('success', 'Paypal address has been saved successfully!');
				}*/

				$id = $this->payment_methods_model->save($save_data);
				$this->payment_methods_model->save(array('encoded_id' => doEncode('pm-'.$id)), $id);

				$res['redirect_url'] = site_url('payment-methods');
				$res['status'] = 1;
				$res['hide_msg'] = 1;
			}
			exit(json_encode($res));
		}
		else{
			// $this->data['clientToken'] = $this->my_stripe->generate_client_token();
			$this->data['rows'] = $this->payment_methods_model->get_methods();
			$this->load->view("owner/payments", $this->data);
		}
	}

	function save_paypal()
	{
        $res = array();
        $res['hide_msg'] = 0;
        $res['scroll_top'] = 0;
        $res['status'] = 0;
        $res['frm_reset'] = 0;
        $res['redirect_url'] = 0;

        $this->form_validation->set_rules('paypal', 'Paypal address', 'required|valid_email');
        if($this->form_validation->run() === FALSE)
        {
            $res['msg'] = validation_errors();
        }else{
            $post = html_escape($this->input->post());

            if($this->payment_methods_model->get_row_where(array('paypal' => $post['paypal']))){
            	$res['msg'] = showMsg('error', 'This is email already in use!');
            	exit(json_encode($res));
            }
            $id=$this->payment_methods_model->save(array('mem_id' => $this->session->mem_id, 'paypal' => $post['paypal']));
			$this->payment_methods_model->save(array('encoded_id' => doEncode('pm-'.$id)),$id);
            $res['msg'] = showMsg('success', 'Paypal address has been saved successfully!');
            $res['redirect_url'] = site_url('bank-account');
            $res['status'] = 1;
            $res['hide_msg'] =1;
        }
        exit(json_encode($res));
    }

	function bank_accounts()
	{
		$this->isMemLogged('sitter');
		if ($this->input->post()) {
			$res = array();
			$res['hide_msg'] = 0;
			$res['scroll_to_msg'] = 1;
			$res['status'] = 0;
			$res['frm_reset'] = 0;
			$res['redirect_url'] = 0;

			$this->form_validation->set_rules('type', 'Account Type', 'required|in_list[Checking,Saving]');
			$this->form_validation->set_rules('account_title', 'Account Title', 'required');
			$this->form_validation->set_rules('routing_number', 'Routing Number', 'required');
			$this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
			$this->form_validation->set_rules('account_number', 'Account Number', 'required');
            $this->form_validation->set_rules('caccount_number', 'Confirm Account Number', 'required|matches[account_number]');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');

			if($this->form_validation->run() === FALSE)
			{
				$res['msg'] = validation_errors();
			}else{
				$post = html_escape($this->input->post());

				$save_data = array('mem_id' => $this->session->mem_id/*, 'acc_swift_code' => $post['swift_code']*/, 'acc_type' => $post['type'], 'acc_routing_number' => $post['routing_number'], 'acc_bank_name' => $post['bank_name'], 'acc_title' => $post['account_title'], 'acc_number' => $post['account_number'], 'acc_city' => $post['city'], 'acc_state' => $post['state'], 'acc_country' => 'United States');

				$id = $this->payment_methods_model->save($save_data);
				$this->payment_methods_model->save(array('encoded_id' => doEncode('pm-'.$id)),$id);

				$res['msg'] = showMsg('success', 'Bank Account has been saved successfully!');
				$res['redirect_url'] = site_url('bank-accounts');
				$res['status'] = 1;
				$res['hide_msg'] = 1;
			}
			exit(json_encode($res));
		}else{
			$this->data['rows'] = $this->payment_methods_model->get_methods($this->session->mem_id, true);
			$this->load->view("sitter/bank-account", $this->data);
		}
	}

	function edit_account()
	{
		$this->isMemLogged('sitter');
		$id = intval(substr(doDecode($this->input->post('store')), 3));
		if ($row = $this->payment_methods_model->get_mem_method($id, $this->session->mem_id)) {
			if ($this->input->post()) {
				$res = array();
				$res['hide_msg'] = 0;
				$res['scroll_to_msg'] = 1;
				$res['status'] = 0;
				$res['frm_reset'] = 0;
				$res['redirect_url'] = 0;

				$this->form_validation->set_rules('type', 'Account Type', 'required|in_list[Checking,Saving]');
				$this->form_validation->set_rules('account_title', 'Account Title', 'required');
				$this->form_validation->set_rules('routing_number', 'Routing Number', 'required');
				$this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
				$this->form_validation->set_rules('account_number', 'Account Number', 'required');
				$this->form_validation->set_rules('caccount_number', 'Confirm Account Number', 'required|matches[account_number]');
				$this->form_validation->set_rules('city', 'City', 'required');
				$this->form_validation->set_rules('state', 'State', 'required');

				if($this->form_validation->run() === FALSE)
				{
					$res['msg'] = validation_errors();
				}else{
					$post = html_escape($this->input->post());

					$save_data = array('acc_type' => $post['type'], 'acc_routing_number' => $post['routing_number'], 'acc_bank_name' => $post['bank_name'], 'acc_title' => $post['account_title'], 'acc_number' => $post['account_number'], 'acc_city' => $post['city'], 'acc_state' => $post['state'], 'acc_country' => 'United States');

					$id = $this->payment_methods_model->save($save_data, $id);
					$res['msg'] = showMsg('success', 'Bank Account has been saved successfully!');
					$res['redirect_url'] = site_url('bank-accounts');
					$res['status'] = 1;
					$res['hide_msg'] = 1;
				}
				exit(json_encode($res));
			}
		}
		else
			show_404();
	}
	
	function earnings()
	{
		$this->isMemLogged('sitter');
		$this->data['pending_blnc'] = $this->transaction_model->get_pending_blnc($this->session->mem_id, $this->data['site_settings']->site_hold_payment);
        $this->data['available_blnc'] = $this->transaction_model->get_balance_due($this->session->mem_id, $this->data['site_settings']->site_hold_payment);
		$this->data['total_payout'] = $this->transaction_model->get_total_payout($this->session->mem_id);

        
		$this->data['pending_balances'] = $this->transaction_model->pending_balances($this->session->mem_id, $this->data['site_settings']->site_hold_payment);
		$this->data['available_balances'] = $this->transaction_model->available_balances($this->session->mem_id, $this->data['site_settings']->site_hold_payment);
		$this->data['processing_payouts'] = $this->transaction_model->get_processing_payouts($this->session->mem_id);
		$this->data['cleared_payouts'] = $this->transaction_model->get_cleared_payouts($this->session->mem_id);
		$this->data['rows'] = $this->payment_methods_model->get_methods($this->session->mem_id, true);

		$this->load->view("sitter/earnings", $this->data); 
	}

	function delete($id = '')
	{
		$id = intval(substr(doDecode($id), 3));
		if($row = $this->payment_methods_model->get_mem_method($id))
		{
			if($this->session->mem_type=='owner'){
				if(!$this->my_stripe->delete_payment_method($this->data['mem_data']->mem_stripe_id, $row->method_token)){
					setMsg('error', 'Something went wrong, Please try again latter!');
					redirect("payment-methods", 'refresh');
					exit;
				}

			}

			$this->payment_methods_model->delete($id);
			setMsg('success', 'Payment Method has been deleted successfully!');
			
			$url=$this->session->mem_type=='owner'?'payment-methods':'bank-accounts';
			redirect($url, 'refresh');
			exit;
		}
		else
			show_404();
	}

	function make_default($id = '')
	{
		$id=intval(substr(doDecode($id), 3));
		if($row=$this->payment_methods_model->get_mem_method($id)) {
			if($this->session->mem_type == 'owner') {
				if(!$this->my_stripe->make_defualt_payment_method($this->data['mem_data']->mem_stripe_id,$row->method_token)){
					setMsg('error', 'Something went wrong, Please try again latter!');
					redirect("payment-methods", 'refresh');
					exit;
				}
			}

			$this->payment_methods_model->save(array('default_method' => 0), $this->session->mem_id, 'mem_id');
			$this->payment_methods_model->save(array('default_method' => 1), $id);
			setMsg('success', 'Payment Method has been set to default successfully!');
			$url = $this->session->mem_type == 'owner' ? 'payment-methods' : 'payment-methods';
			redirect($url, 'refresh');
			exit;
		}
		else
			show_404();
	}

	function transactions($page = 1)
	{
        $this->isMemLogged('owner');

        $page=intval($page);
        $per_page=20;

        $total=$this->transaction_model->num_rows(array('mem_id' => $this->session->mem_id));
        $total_pages=ceil($total/$per_page);
        
        if($page<=$total_pages || $page>0){

            $this->load->library('pagination');
            $this->config->load('pagination');
            
            $config = $this->config->item('pagination');        
            $config['base_url'] = site_url('transactions');
            $config['total_rows'] = $total;
            $config['per_page'] = $per_page;
            $this->pagination->initialize($config); 
            $this->data['links'] = $this->pagination->create_links();

            $start=($page-1)*$per_page;

            $this->data['rows'] = $this->transaction_model->get_rows(array('mem_id' => $this->session->mem_id),$start,$per_page, 'desc');
            $this->load->view("owner/transactions", $this->data); 
        }
        else
            show_404();
    }

    function transaction_detail()
    {
        $this->isMemLogged('sitter');

        $encoded_id=$this->input->post('store');
        $id=intval(substr(doDecode($encoded_id),4));
        if($row = $this->transaction_model->get_sitter_transaction($id,$this->session->mem_id)){
            $res['data'] ='
            <div class="crosBtn"></div>
            <h3>Transaction Detail</h3>
            <ul class="list">
            <li><strong>Name:</strong><span>'.$row->mem_name.'</span></li>
            <li><strong>Email:</strong><span>'.$row->mem_email.'</span></li>
            <li><strong>Subject:</strong><span>'.$row->subject.'</span></li>
            <li><strong>Date:</strong><span>'.format_date($row->lesson_date_time).'</span></li>
            <li><strong>Start Time:</strong><span>'.format_date($row->lesson_date_time, 'h:m A').'</span></li>
            <li><strong>Hours:</strong><span>'.$row->hours.'</span></li>
            <li><strong>Amount:</strong><span>$'.$row->trx_amount.'</span></li>
            <li><strong>Status:</strong><span>Complete</span></li>
            <li><strong>Location:</strong><span>'.$row->address.'</span></li>
            <li><strong>Detail:</strong><span>'.$row->detail.'</span></li>
            </ul>';
            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied!');
    }

    function withdraw()
    {
        $this->isMemLogged('sitter');
        $res = array();
        $res['hide_msg'] = 0;
        $res['scroll_top'] = 0;
        $res['status'] = 0;
        $res['frm_reset'] = 0;
        $res['redirect_url'] = 0;

        $this->form_validation->set_rules('payment_method', 'Bank Account', 'required', array('required' => 'Please select {field}'));
        if($this->form_validation->run() === FALSE) {
            $res['msg'] = validation_errors();
        } else {
        	$id = intval($this->input->post('payment_method'));
        	
        	if(!$method_row = $this->payment_methods_model->get_mem_method($id, $this->session->mem_id)) {
        		$res['msg'] = showMsg('error', "Please select valid Bank Account!");
        		exit(json_encode($res));
        	}

        	$balance_due = $this->transaction_model->get_balance_due($this->session->mem_id, $this->data['site_settings']->site_hold_payment);
        	$available_balances = $this->transaction_model->available_balances($this->session->mem_id, $this->data['site_settings']->site_hold_payment);

        	if($balance_due<= 0 || count($available_balances)<1) {
        		$res['msg'] = showMsg('error', "You don't have enough Balance to withdraw!");
        		exit(json_encode($res));
        	}

            $withdraw_id = $this->transaction_model->save_withdraw(array('mem_id' => $this->session->mem_id, 'amount' => $balance_due, 'payment_method_id' => $id));
            foreach ($available_balances as $key => $avbl_blnc) {
            	$this->transaction_model->save_withdrawal_detail(array('withdraw_id' => $withdraw_id, 'trx_id' => $avbl_blnc->id));
        		$this->transaction_model->save(array('status' => 1), $avbl_blnc->id);
            }

            $res['msg'] = showMsg('success', "Withdraw request saved successfully, Please wait!");
            $res['status'] = 1;
            $res['redirect_url'] = ' ';
        }
        exit(json_encode($res));
    }
}
?>