<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->model('order_model');
        $this->load->model('product_model');
    }

    function index()
    {
        $this->isMemLogged($this->session->mem_type);
        $this->data['total_purchase'] = $this->order_model->total_mem_orders($this->session->mem_id);
        $this->load->view("account/index", $this->data);
    }

    function information()
    {
        $this->isMemLogged($this->session->mem_type);
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_message('integer', 'Please select a valid {field}');
            $this->form_validation->set_rules('fname', 'First Name', 'required');
            $this->form_validation->set_rules('lname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'required|compare_dates[' . date('m/d/Y') . ']');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('zip', 'Zip Code', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('profile_bio', 'Profile Bio', 'required');

            if ($this->form_validation->run() === FALSE)
                $res['msg'] = validation_errors();
            else {
                $post = html_escape($this->input->post());

                if ($this->member_model->emailExists($post['email'], $this->session->mem_id)) {
                    $res['msg'] = showMsg('error', 'Email already in use, Please try another!');
                    exit(json_encode($res));
                }
                if(!$this->master->getRow('states', array('code' => $post['state']))) {
                    $res['msg'] = showMsg('error', 'Please select a valid State!');
                    exit(json_encode($res));
                }

                $data = array('mem_fname' => ucfirst($post['fname']), 'mem_lname' => ucfirst($post['lname']), 'mem_dob' => db_format_date($post['dob']), 'mem_city' => $post['city'], 'mem_state' => $post['state'], 'mem_zip' => $post['zip'], 'mem_address1' => $post['address'], 'mem_about' => $post['profile_bio']);


                if(!empty($post['email']) && $this->data['mem_data']->mem_email != $post['email']) {
                    $rando = doEncode($this->session->mem_id . '-' . $post['email']);
                    $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

                    $data['mem_email'] = $post['email'];
                    $data['mem_code'] = $rando;
                    $data['mem_verified'] = 0;

                    $verify_link = site_url('verification/' .$rando);

                    $mem_data = array('name' => ucwords($post['fname'].' '.$post['lname']), "email" => $post['email'], "link" => $verify_link);
                    send_site_email($mem_data, 'change_email');
                    $res['redirect_url'] = ' ';
                    setMsg('info', getSiteText('alert', 'verify_email'));
                }

                $this->member_model->save($data, $this->session->mem_id);

                $res['msg'] = showMsg('success', 'Profile has been update successfully.');
                $res['status'] = 1;
                $res['hide_msg'] = 1;
                // $res['redirect_url'] = ' ';
            }
            exit(json_encode($res));
        } else {
            $this->load->view("account/information", $this->data);
        }
    }

    function purchase()
    {
        $this->isMemLogged($this->session->mem_type);
        // $this->data['recent_order'] = $this->order_model->get_mem_recent_order($this->session->mem_id);
        $this->data['orders'] = $this->order_model->get_mem_orders($this->session->mem_id);

        $this->data['right_row'] = $this->master->getRow('sitecontent', array('ckey' => 'right_section'));

        $this->load->view("account/purchase", $this->data);
    }

    function purchase_detail($id)
    {
        $this->isMemLogged($this->session->mem_type);
        if($this->data['row'] = $this->order_model->get_mem_order($this->session->mem_id, $id)){

            $this->load->view("account/purchase-detail", $this->data);
        }
        else
            show_404();
    }

    function wishlist()
    {
        $this->isMemLogged($this->session->mem_type);
        $this->data['rows'] = $this->product_model->get_favorites($this->session->mem_id);
        $this->load->view("account/wishlist", $this->data);
    }

    function shipping_address()
    {
        $this->isMemLogged($this->session->mem_type);
        if($this->input->post()){
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_message('integer', 'Please select a valid {field}');

            $this->form_validation->set_rules('ship_fname', 'First Name', 'required');
            $this->form_validation->set_rules('ship_lname', 'Last Name', 'required');
            $this->form_validation->set_rules('ship_phone', 'Phone Number', 'required');
            $this->form_validation->set_rules('ship_address', 'Address', 'required');
            $this->form_validation->set_rules('ship_house_number', 'House Number', 'required');
            $this->form_validation->set_rules('ship_zip', 'Postal Code', 'required');
            $this->form_validation->set_rules('ship_city', 'City', 'required');
            $this->form_validation->set_rules('ship_country', 'Country/Region', 'required');

            if($this->form_validation->run() === FALSE)
                $res['msg'] = validation_errors();
            else {
                $post = html_escape($this->input->post());

                $ship_data = array('ship_fname' => $post['ship_fname'], 'ship_lname' => $post['ship_lname'], 'ship_company' => $post['ship_company'], 'ship_address' => $post['ship_address'], 'ship_zip' => $post['ship_zip'], 'ship_city' => $post['ship_city'], 'ship_country' => $post['ship_country'], 'ship_phone' => $post['ship_phone']);
                $this->member_model->save($ship_data, $this->session->mem_id);

                $res['msg'] = showMsg('success', 'Shipping Address has been saved successfully.');
                $res['status'] = 1;
                $res['hide_msg'] = 1;
            }
            exit(json_encode($res));
        }
        else
            $this->load->view("account/shipping-address", $this->data);
    }

    function coupons()
    {
        $this->isMemLogged($this->session->mem_type);
        $this->load->view("account/coupons", $this->data);
    }

    function change_pswd()
    {
        $this->isMemLogged($this->session->mem_type);
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('pswd', 'Current Password', 'required');
            $this->form_validation->set_rules('npswd', 'New Password', 'required');
            $this->form_validation->set_rules('cpswd', 'Confirm Password', 'required|matches[npswd]');
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $row = $this->member_model->oldPswdCheck($this->data['mem_data']->mem_id, $post['pswd']);
                if (count($row) > 0) {
                    $ary = array('mem_pswd' => doEncode($post['npswd']));
                    $this->member_model->save($ary, $this->data['mem_data']->mem_id);
                    $res['msg'] = showMsg('success', 'Password successfully updated!');

                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'Old Password Does Not Match!');
                }
            }
            exit(json_encode($res));
        }
    }

    function invite_friend()
    {
        $this->isMemLogged('owner');
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('emails', 'Email', 'required');
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $emails = @explode(', ', $post['emails']);
                // exit(json_encode($emails));
                if (count($emails) > 0) {
                    foreach ($emails as $key => $email) {
                        if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
                            $res['msg'] = showMsg('error', 'Please enter valid comma separated emails');
                            exit(json_encode($res));
                        }
                    }
                    $new_count = 0;
                    foreach ($emails as $key => $email) {

                        $ref_code = $this->data['mem_data']->mem_referral_code;
                        $referral_signup_link = site_url('referral-signup/' . $ref_code);

                        $mem_data = array('name' => ucfirst($this->data['mem_data']->mem_fname) . ' ' . ucfirst($this->data['mem_data']->mem_lname), "email" => $email, "link" => $referral_signup_link);

                        if (send_site_email($mem_data, 'invite_friend'))
                            $new_count++;
                    }
                    $s = $new_count > 1 ? 's' : '';
                    $res['msg'] = showMsg('success', "Email has been sent to your friend$s !");


                    $res['frm_reset'] = 1;
                    $res['status'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'Please enter emails!');
                }
            }
            exit(json_encode($res));
        } else
            $this->load->view('account/invite-friend', $this->data);
    }

    function report_profile()
    {

        list($type, $id) = @explode('-', doDecode($this->input->post('store')));
        $id = intval($id);
        if ($id < 1 || $type != 'profile' || !$row = $this->member_model->getMember($id, array('mem_status' => 1, 'mem_verified' => 1)))
            die('access denied!');

        $res = array();
        $res['hide_msg'] = 1;
        $res['scroll_to_msg'] = 1;
        $res['status'] = 0;
        $res['frm_reset'] = 1;
        $res['redirect_url'] = 0;

        $this->form_validation->set_rules('reason', 'Reason', 'required');
        if ($this->form_validation->run() === FALSE) {
            $res['msg'] = validation_errors();
        } else {
            $post = html_escape($this->input->post());
            $this->master->save('reports', array('mem_id' => $this->session->mem_id, 'profile_id' => $id, 'reason' => $post['reason']));
            $res['msg'] = showMsg('success', 'Profile reported successfully!');
            $res['status'] = 1;
        }
        exit(json_encode($res));
    }

    function change_email()
    {
        $this->isMemLogged($this->session->mem_type);
        if ($this->input->post()) {
            $res = array();
            $res['frm_reset'] = 0;
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['redirect_url'] = 0;
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());

                if ($this->data['mem_data']->mem_email == $post['email']) {
                    $res['msg'] = showMsg('warning', 'You are alread using this Email.');
                    exit(json_encode($res));
                }

                if (!$email_row = $this->member_model->emailExists($post['email'], $this->session->mem_id)) {
                    $rando = doEncode($this->session->mem_id . '-' . $post['email']);
                    $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

                    $this->member_model->save(array('mem_code' => $rando, 'mem_email' => $post['email'], 'mem_verified' => 0), $this->session->mem_id);
                    $verify_link = site_url('verification/' . $rando);

                    $mem_data = array('name' => $this->data['mem_data']->mem_fname . ' ' . $this->data['mem_data']->mem_lname, "email" => $post['email'], "link" => $verify_link);
                    send_site_email($mem_data, 'change_email');

                    $res['redirect_url'] = ' ';

                    $res['msg'] = showMsg('success', 'Email has been changed successful! Please wait.');
                    setMsg('info', getSiteText('alert', 'verify_email'));

                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'Email already exists!');
                }
            }
            exit(json_encode($res));
        } else
            show_404();
    }

    function change_phone()
    {
        $this->isMemLogged($this->session->mem_type, true);
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('phone', 'Phone', 'required');
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                if ($this->member_model->phoneExists($post['phone'], $this->session->mem_id)) {
                    $res['msg'] = showMsg('error', 'Phone Already In Use!');
                    exit(json_encode($res));
                }
                $ary = array('mem_phone' => trim($post['phone']));
                if ($post['phone'] != $this->data['mem_data']->mem_phone) {
                    $ary['mem_phone_verified'] = 0;
                }

                $this->member_model->save($ary, $this->session->mem_id);
                $res['msg'] = showMsg('success', 'Phone number successfully updated!');
                $res['redirect_url'] = ' ';
                $res['status'] = 1;
            }
            exit(json_encode($res));
        }
    }

    function verify_phone()
    {
        $this->isMemLogged($this->session->mem_type, true);
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('code[]', 'code', 'required|integer');
            $this->form_validation->set_rules('phone', 'Phone', 'required', array('required' => 'Something went wrong!'));
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $code = implode('', $post['code']);
                if (!$this->member_model->getMember($this->session->mem_id, array('mem_phone_code' => $code))) {
                    $res['msg'] = showMsg('error', 'Invalid code!');
                    exit(json_encode($res));
                }

                $mem_data = array('mem_phone_code' => '', 'mem_phone_verified' => 1, 'mem_phone' => $post['phone']);
                $this->member_model->save($mem_data, $this->session->mem_id);
                $res['msg'] = showMsg('success', 'Phone Number verified successfully!');
                $res['status'] = 1;
                $res['frm_reset'] = 1;
            }
            exit(json_encode($res));
        }
        die('access denied!');
    }

    function verify_phone_code($is_inner = FALSE)
    {
        $this->isMemLogged($this->session->mem_type, true);

        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $post['phone'] = $this->input->post('phone');
            $mem_row = $this->member_model->get_row($this->session->mem_id);
            if (!empty($mem_row->mem_phone) || !empty($post['phone'])) {
                if (!empty($post['phone']) && $this->member_model->phoneExists($post['phone'], $this->session->mem_id)) {
                    $res['msg'] = 'Phone already in use, Please try another!';
                    exit(json_encode($res));
                }
                $mem_phone = empty($post['phone']) ? $mem_row->mem_phone : $post['phone'];
                $code = rand(111111, 999999);
                $this->load->library('twilio');
                $ok = $this->twilio->send_msg($mem_phone, $code . " is your PFSC code. Don't share this code with others");
                if ($ok !== TRUE) {
                    $res['msg'] = showMsg('error', $ok);
                    $res['status'] = 0;
                    exit(json_encode($res));
                }
                $ary = array('mem_phone_code' => $code);

                $this->member_model->save($ary, $this->session->mem_id);
                if ($is_inner)
                    return true;
                $res['status'] = 1;
            }
            exit(json_encode($res));
        }
        die('access denied!');
    }

    function phone_verification()
    {
        $this->isMemLogged($this->session->mem_type, true);
        if ($this->data['mem_data']->mem_phone_verified == 1) {
            redirect('account');
            exit;
        }
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('code[]', 'code', 'required|integer');

            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $code = @implode('', $post['code']);
                if (!$this->member_model->getMember($this->session->mem_id, array('mem_phone_code' => $code))) {
                    $res['msg'] = showMsg('error', 'Invalid code!');
                    exit(json_encode($res));
                }

                $mem_data = array('mem_phone_code' => NUll, 'mem_phone_verified' => 1);
                $res['redirect_url'] = 'account';
                $this->member_model->save($mem_data, $this->session->mem_id);
                $res['msg'] = showMsg('success', 'Phone Number verified successfully!');
                $res['status'] = 1;
                $res['frm_reset'] = 1;
            }
            exit(json_encode($res));
        } else {
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'phone_verify'));
            $this->data['site_content'] = unserialize($this->data['site_content']->code);
            $this->load->view("account/verify-phone", $this->data);
        }
    }

    function email_verification()
    {
        $verification_check = $this->data['mem_data']->mem_verified == 0 ? false : true;
        $this->isMemLogged($this->session->mem_type, $verification_check);
        if ($this->data['mem_data']->mem_verified == 1) {
            redirect('account');
            exit;
        }
        if ($this->input->post()) {
            $res = array();
            $res['frm_reset'] = 0;
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['redirect_url'] = 0;
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());

                if (!$this->member_model->emailExists($post['email'], $this->session->mem_id)) {
                    $rando = doEncode($this->session->mem_id . '-' . $post['email']);
                    $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

                    $this->member_model->save(array('mem_code' => $rando, 'mem_email' => $post['email'], 'mem_verified' => 0), $this->session->mem_id);
                    $verify_link = site_url('verification/' . $rando);

                    $mem_data = array('name' => $this->data['mem_data']->mem_fname . ' ' . $this->data['mem_data']->mem_lname, "email" => $post['email'], "link" => $verify_link);
                    send_site_email($mem_data, 'change_email');

                    $res['redirect_url'] = ' ';

                    $res['msg'] = showMsg('success', 'Email has been changed successful! Please wait.');
                    setMsg('info', getSiteText('alert', 'verify_email'));

                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'Email already exists!');
                }
            }
            exit(json_encode($res));
        } else {
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'email_verify'));
            $this->data['site_content'] = unserialize($this->data['site_content']->code);
            $this->load->view("account/verify-email", $this->data);
        }
    }

    function resend_email()
    {
        $verification_check = $this->data['mem_data']->mem_verified == 0 ? false : true;
        $this->isMemLogged($this->session->mem_type, $verification_check);

        $res = array();
        $res['hide_msg'] = 0;
        $res['scroll_to_msg'] = 0;
        $res['status'] = 0;
        $res['frm_reset'] = 0;
        $res['redirect_url'] = 0;

        $rando = doEncode($this->session->mem_id . '-' . $this->data['mem_data']->mem_email);
        $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

        $this->member_model->save(array('mem_code' => $rando), $this->session->mem_id);

        $verify_link = site_url('verification/' . $rando);

        $mem_data = array('name' => $this->data['mem_data']->mem_fname . ' ' . $this->data['mem_data']->mem_lname, "email" => $this->data['mem_data']->mem_email, "link" => $verify_link);

        $ok = send_site_email($mem_data, 'verify_email');

        $res['msg'] = $ok ? showMsg('success', 'Email sent successfully!') : showMsg('error', 'There is an error occurred, Please try again later!');
        $res['status'] = 1;
        $res['hide_msg'] = 1;
        exit(json_encode($res));
    }
}
