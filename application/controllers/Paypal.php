<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends MY_Controller
{
    
    function  __construct()
    {
        parent::__construct();
        $this->load->library('paypal_lib');
        // $this->load->model('member_model');
        $this->load->model('order_model');
    }
    
    function success($encoded_id)
    {
        $this->isMemLogged($this->session->mem_type, false);
        $id = intval(doDecode($encoded_id));
        
        // if ($row = $this->order_model->get_row_where(array('id' => $id, 'paid' => 0, 'mem_id' => $this->session->mem_id))) {
        if ($row = $this->order_model->get_row_where(array('id' => $id,  'mem_id' => $this->session->mem_id))) {

            $this->load->model('product_model');
            $details = $this->order_model->get_detail($id);
            foreach ($details as $key => $detail) {
                $this->product_model->update_stock($detail->p_id, 1);
            }

            setMsg('success', 'You Order has been paid successfully!');
            redirect('account', "refresh");
            exit;
        }
        else
            show_404();
    }
    
    function notify()
    {
        
        $raw_post_data = file_get_contents('php://input');
        // pr($raw_post_data );
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2)
             $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        $req = 'cmd=_notify-validate';
        
        if (function_exists('get_magic_quotes_gpc')) {
                $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }
        if(!empty($this->data['site_settings']->site_paypal_sandox)):
            $ppurl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        else:
            $ppurl = 'https://www.paypal.com/cgi-bin/webscr';
        endif;
        $ch = curl_init($ppurl);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        if ( !($res = curl_exec($ch)) ) {
            error_log("Got " . curl_error($ch) . " when processing IPN data");
            curl_close($ch);
            exit;
        }
        curl_close($ch);
        $resArray = $_POST;
        if (strcmp ($res, "VERIFIED") == 0)
        {
            $resArray['Status'] = 'VERIFIED';
            $custom = $resArray['custom'];
            $txn_id = $resArray['txn_id'];
            $filename = 'order'.$txn_id.'-paid-('.date('Y-m-d-His').')';


            if ($order = $this->order_model->get_order($custom)) {

                $o_id = $this->order_model->save(['paid' => 1], $custom);
                $amount = $row->product_total-$row->discount_amount+$row->tax_amount;

                $mem_data = array('name' => $order->mem_name, 'to_name' => $order->mem_fname, "email" => $order->contact_email, 'row' => $order, 'order_status' => 'CONFIRMED');
                send_site_email($mem_data, 'order', 'order');
                send_site_admin_email($mem_data, 'order', 'order-admin');

                $this->load->model('transaction_model');
                $this->transaction_model->save(array('mem_id' => $order->mem_id, 'order_id' => $custom, 'amount' => $amount, 'note' => 'Payment against order#'.num_size($custom), 'charge_id' => $txn_id, 'status' => 1, 'date' => date('Y-m-d H:i:s')));
            }

            // if ($this->donation_email($custom)) {
            //     $row= $this->master->getRow('donations',array('id'=>$custom));
            //     $this->master->save('donations',array('payment_status'=>'1'),'id',$custom);
            //     $project = get_project($row->proj_id);
            //     $donations = project_donations($row->proj_id);
            //     if($project->total_capital == $donations->total_donations){
            //                 $this->finished_donation_email($vals['proj_id']);
            //                 $this->master->save('projects',array('proj_status'=>'0'),'id',$vals['proj_id']);
            //     }
            // }
        } elseif (strcmp ($res, "INVALID") == 0) {
            $filename = 'INVALID ('.date('Y-m-d-His').')';
            $resArray['Status'] = 'INVALID';
        }
        $content = '';
        foreach($resArray as $key => $val):
            $content .= "\r\n";
            $content .= $key." = ".$val;
        endforeach;
        $filecontent = $content;
        $fp = fopen('./assets/paypal/'.$filename.".txt", "w");
        fwrite($fp, $filecontent);
        fclose($fp);
    }
    
    function cancel($id)
    {
        $id = intval(doDecode($encoded_id));
        if ($this->order_model->get_row_where(['id' => $id, 'paid' => 0])) {
            $this->order_model->delete_where(['id' => $id]);
            $this->master->delete_where('order_detail', ['o_id' => $id]);
            setMsg('error', "Your order has been canceled!");
            redirect("account",'refresh');
            exit;
        }
    }

    function pay_now($encoded_id)
    {
        $this->isMemLogged($this->session->mem_type, false);
        $id = intval(doDecode($encoded_id));

        if($row = $this->order_model->get_row_where(['mem_id' => $this->session->mem_id, 'id' => $id, 'paid' => 0])) {
            $amount = $this->order_model->get_order_total($id);
            // exit('total='.$amount);
            $this->data['post'] = array(
                "item_name" => "Paypal Payment",
                "currency" => "USD",
                "amount" => $amount,
                "custom" => $id
            );
            $this->data['setting'] = array(
                "website_name" => $this->data['site_settings']->site_name,
                "url" => site_url(),
                "notify_url" => site_url("notify"),
                "return_url" => site_url("success/".$encoded_id),
                "cancel_url" => site_url("cancel/".$encoded_id),
                "sandbox" => !empty($this->data['site_settings']->site_paypal_sandox),
                "sandbox_paypal" => $this->data['site_settings']->site_sandbox_paypal,
                "live_paypal" => $this->data['site_settings']->site_live_paypal
            );
            $this->load->view("includes/processing", $this->data);
        }
        else
            show_404();
    }
}