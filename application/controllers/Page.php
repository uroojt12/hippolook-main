<?php
class Page extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function about()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'about'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/about', $this->data);
    }

    function contact()
    {
        if ($vals = $this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            // $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('msg', 'Message', 'required');
            // $this->form_validation->set_rules('g-recaptcha-response','Robot','required',array('required'=>'Please verify that you are not robot!'));
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $vals['msg'] = html_escape($this->input->post('msg'));
                /*$secret = RECAPTCHA_SECRET_KEY;
                $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$vals['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
                if($response['success'] == true){*/

                $vals['site_email'] = $this->data['site_settings']->site_email;
                $vals['site_noreply_email'] = $this->data['site_settings']->site_noreply_email;
                // $okmsg = send_email($vals);
                $okmsg = true;

                if ($okmsg) {
                    $res['msg'] = showMsg('success', 'Message send sucessfully!');

                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                    // $res['redirect_url'] = site_url('contact');
                } else {
                    $res['msg'] = showMsg('error', 'Error Occured!');
                }
                /*}else{
                    $res['msg'] = showMsg('error','Please verify that you are not robot!');

                    // $res['redirect_url'] = site_url('contact');
                }*/
            }
            exit(json_encode($res));
        } else {
            $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'contact'));
            $this->data['site_content'] = unserialize($this->data['content_row']->code);
            $this->load->view('pages/contact', $this->data);
        }
    }

    function why_choose()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'choose_us'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/why-choose', $this->data);
    }

    function faq()
    {
        $this->data['faqs'] = $this->master->getRows('faqs', array('status' => 1), '', '', 'acs', 'sort_order');

        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'faq'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/faq', $this->data);
    }

    function educational_videos()
    {
        $this->data['educational_videos'] = $this->master->getRows('educational_videos', array(), '', '', 'acs');

        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'educational_videos'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/educational-videos', $this->data);
    }



    function shipping_handling()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'shipping_handling'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/shipping-handling', $this->data);
    }

    function cookies()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'cookies'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/cookies', $this->data);
    }

    function return_policy()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'return_policy'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/return-policy', $this->data);
    }

    function customer_service()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'customer_service'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/customer-service', $this->data);
    }

    function disclaimer()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'disclaimer'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/disclaimer', $this->data);
    }

    function payment_policy()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'payment_policy'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/payment-policy', $this->data);
    }



    function privacy_policy()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'privacy_policy'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/privacy-policy', $this->data);
    }

    function terms_conditions()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'terms_conditions'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/terms-and-conditions', $this->data);
    }


    function error()
    {
        $this->load->view("pages/404", $this->data);
    }
}
