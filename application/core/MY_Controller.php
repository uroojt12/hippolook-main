<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('twilio');
        $this->data['site_settings'] = $this->getSiteSettings();
        $this->data['mem_data'] = $this->getActiveMem();
        $this->data['page'] = $this->uri->segment(1);



        $this->data['cats'] = get_main_cats();

        $this->load->model('cart_model');
        $this->load->model('product_model');
        $this->data['cart_items'] = $this->cart_model->get_cart_products();
        $this->data['cart_total'] = $this->cart_model->get_cart_total();
        $this->data['total_favorites'] = $this->product_model->count_mem_favorites($this->session->mem_id);
    }

    public function isMemLogged($type, $is_verified = true, $type_arr = array('member'), $phone_verified = false)
    {

        if (intval($this->session->mem_id) < 1 || !$this->session->has_userdata('mem_type') || $this->session->mem_type != $type) {
            $remember_cookie = $this->input->cookie('hippolook_remember');
            if ($remember_cookie && $row = $this->master->getRow('members', array('mem_remember' => $remember_cookie))) {
                $this->session->set_userdata('mem_id', $row->mem_id);
                $this->session->set_userdata('mem_type', $row->mem_type);

                /*
                if(empty($row->mem_verified) || $row->mem_verified==0){
                    redirect('phone-verification', 'refresh');
                    exit;
                }
                */
            } else {
                $this->session->set_userdata('redirect_url', currentURL());
                redirect('signup', 'refresh');
                exit;
            }
        }
        $this->type_logged_checked($type_arr);
        if ($is_verified)
            $this->is_verified();

        if ($phone_verified)
            $this->is_phone_verified();
    }

    public function type_logged_checked($type_arr)
    {
        if ($this->session->mem_type && !in_array($this->session->mem_type, $type_arr)) {
            redirect('signup', 'refresh');
            exit;
        }
    }

    function is_verified()
    {
        if (empty($this->data['mem_data']->mem_verified) || $this->data['mem_data']->mem_verified == 0) {
            redirect('email-verification', 'refresh');
            exit;
        }
    }

    function is_phone_verified()
    {
        if (empty($this->data['mem_data']->mem_phone_verified) || $this->data['mem_data']->mem_phone_verified == 0) {
            redirect('phone-verification', 'refresh');
            exit;
        }
    }

    public function MemLogged()
    {
        $remember_cookie = $this->input->cookie('hippolook_remember');
        if ($remember_cookie && $row = $this->master->getRow('members', array('mem_remember' => $remember_cookie))) {
            $this->session->set_userdata('mem_id', $row->mem_id);
            $this->session->set_userdata('mem_type', $row->mem_type);
            redirect('account', 'refresh');
            exit;
        } elseif (($this->session->mem_id > 0) && $this->session->has_userdata('mem_type')) {
            redirect('account', 'refresh');
            exit;
        }
    }

    function getActiveMem()
    {
        $row = $this->master->getRow('members', array('mem_id' => $this->session->mem_id));
        /*
        if($row && $this->session->mem_type == 'sitter') {
            $row->mem_sub_subjects = $this->master->query("select s.*, ts.mem_id from tbl_subjects s,tbl_sitter_subjects ts where s.id = ts.subject_id and s.status = 1 and ts.type = 'sub' and ts.mem_id = ".$this->session->mem_id);
            $row->mem_main_sub = $this->master->getRow('sitter_subjects', array('mem_id' => $this->session->mem_id,'type' => 'main'));
            // $row->mem_gems = get_mem_gems($this->session->mem_id);
        pr($row);
        }
        */
        return $row;
    }

    function getSiteSettings()
    {
        return $this->master->getRow("siteadmin", array('site_id' => '1'));
    }

    function send_site_email($mem_data, $key)
    {

        // $this->load->model('member_model', 'member');
        $settings = $this->data['site_settings'];
        // $mem_row = $this->member->getMember($mem_id);

        $name = $mem_data['name'];
        // $name=$mem_row->mem_fname . ' ' . $mem_row->mem_lname;

        $msg_body = getSiteText('email', $key);
        eval("\$msg_body = \"$msg_body\";");

        if (!empty($mem_data['link'])) {
            // $verify_link = site_url('verification/' .$mem_row->mem_code);
            $msg_body .= "<p><a href='{$mem_data['link']}' style='color: #37b36f; text-decoration: none;'>" . $mem_data['link'] . "</a></p>";
        }

        // $emailto = $mem_row->mem_email;
        $emailto = $mem_data['email'];
        $subject = $settings->site_name . " - " . getSiteText('email', $key, 'subject');
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;charset=utf-8\r\n";
        $headers .= "From: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";
        $headers .= "Reply-To: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";

        $this->data['email_body'] = $msg_body;
        $this->data['email_subject'] = $subject;
        $ebody = $this->load->view('includes/template-email', $this->data, TRUE);
        if (@mail($emailto, $subject, $ebody, $headers)) {
            return 1;
        } else {
            return 0;
        }
    }

    /*
    function send_signup_email($mem_id)
    {

        $this->load->model('member_model', 'member');
        $settings = $this->data['site_settings'];
        $mem_row = $this->member->getMember($mem_id);
        $verify_link = site_url('verification/' .$mem_row->mem_code);
        $msg_body = "<h4 style='text-align:left;padding:0px 20px;margin-bottom:0px;'>Dear " . $mem_row->mem_fname . ' ' . $mem_row->mem_lname . ",</h4>
        <p style='text-align:left;padding:5px 20px;'>" . getSiteText('email','signup') . "</p>
        <p style='text-align:left;padding:5px 20px;'>Please click on the link below to verify your account.</p>
        <p style='text-align:left;padding:5px 20px;'><a href='$verify_link'>".$verify_link."</a></p>";

        $emailto = $mem_row->mem_email;
        $subject = "Thank you for registering with ".$settings->site_name;
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;charset=utf-8\r\n";
        $headers .= "From: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";
        $headers .= "Reply-To: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";

        $this->data['email_body'] = $msg_body;
        $this->data['email_subject'] = $subject;
        $ebody = $this->load->view('includes/template-email', $this->data, TRUE);

        if (@mail($emailto, $subject, $ebody, $headers)) {
            return 1;
        } else {
            return 0;
        }
    }
    */
}

class Admin_Controller extends CI_Controller
{

    protected $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['adminsite_setting'] = $this->getAdmineSettings();
    }

    public function isLogged()
    {
        if ($this->session->loged_in < 1) {
            $this->session->set_userdata('admin_redirect_url', currentURL());
            redirect(ADMIN . '/login', 'refresh');
            exit;
        }
    }

    public function logged()
    {
        if ($this->session->loged_in > 0) {
            redirect(ADMIN, 'refresh');
            exit;
        }
    }

    function getAdmineSettings()
    {
        return $this->master->getRow("siteadmin", array('site_id' => '1'));
    }
}
