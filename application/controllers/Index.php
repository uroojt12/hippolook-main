<?php
class Index extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
    }

    function index()
    {
        $this->data['new_products'] = $this->master->getRows('products', ['new_in' => 1, 'status' => 1], 0, 6);
        $this->data['premium_products'] = $this->master->getRows('products', ['premium' => 1, 'status' => 1], 0, 6);
        $this->data['best_products'] = $this->master->getRows('products', ['best_seller' => 1, 'status' => 1], 0, 6);
        $this->data['flash_products'] = $this->master->getRows('products', ['flash_sale' => 1, 'status' => 1], 0, 6);

        // $this->data['banners'] = $this->master->getRows('banners');
        $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'home'));
        $this->data['site_content'] = unserialize($this->data['site_content']->code);
        $this->load->view("pages/index", $this->data);
    }

    function signin()
    {
        $this->MemLogged();
        if ($this->input->post()) {
            $res = array();
            $res['frm_reset'] = 0;
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['redirect_url'] = 0;
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = $this->input->post();

                $row = $this->member_model->authenticate($post['email'], $post['password']);
                if (count($row) > 0) {
                    if ($row->mem_status == 0) {
                        $res['msg'] = showMsg('error', "This account has been suspended, if you have any questions, contact support at " . $this->post['site_settings']->site_email);
                        exit(json_encode($res));
                    }
                    $remember_token = '';
                    if (isset($post['remeberMe'])) {
                        $remember_token = doEncode('member-' . $row->mem_id);
                        $cookie = array('name'   => 'remember', 'value'  => $remember_token, 'expire' => (86400 * 7));
                        $this->input->set_cookie($cookie);
                    }


                    $this->member_model->update_last_login($row->mem_id, $remember_token);
                    $this->session->set_userdata('mem_id', $row->mem_id);
                    $this->session->set_userdata('mem_type', $row->mem_type);

                    $this->load->model('cart_model');
                    $this->cart_model->shift_cart();

                    if (empty($post['type'])) {
                        if ($row->mem_verified == 0)
                            $url = site_url('email-verification');
                        elseif ($row->mem_phone_verified == 0 && false)
                            $url = site_url('phone-verification');
                        elseif (!empty($this->session->redirect_url)) {
                            $url = $this->session->redirect_url;
                            $this->session->unset_userdata('redirect_url');
                        } else
                            $url = site_url('account');
                    } else
                        $url = ' ';

                    $res['redirect_url'] = $url;

                    $res['msg'] = showMsg('success', 'Login successful! Please wait.');

                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'Invalid email or password');
                }
            }
            exit(json_encode($res));
        } else {
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'login'));
            $this->data['site_content'] = unserialize($this->data['site_content']->code);
            $this->load->view("account/signin", $this->data);
        }
    }

    function signup($ref_code = '')
    {
        $this->MemLogged();
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['frm_reset'] = 0;
            $res['status'] = 0;

            $this->form_validation->set_rules('fname', 'First Name', 'required');
            $this->form_validation->set_rules('lname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            /*$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('confirm', 'Confirm', 'required', array('required' => 'Please accept our terms and conditions'));*/
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $mem_row = $this->member_model->emailExists($post['email']);
                if (count($mem_row) == '0') {

                    $rando = doEncode($post['email'] . '-' . rand(99, 999));
                    $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

                    $mem_referral_code = randCode(6);
                    while (true) {
                        if (!$this->member_model->get_row($mem_referral_code, 'mem_referral_code'))
                            break;
                        $mem_referral_code = randCode(6);
                    }

                    $save_data = array('mem_fname' => ucfirst($post['fname']), 'mem_lname' => ucfirst($post['lname']), 'mem_email' => $post['email'], 'mem_pswd' => doEncode($post['password']), 'mem_type' => 'member', 'mem_status' => 1, 'mem_last_login' => date('Y-m-d h:i:s'), 'mem_referral_code' => $mem_referral_code, 'mem_code' => $rando);

                    $mem_id = $this->member_model->save($save_data);
                    $this->session->set_userdata('mem_id', $mem_id);
                    $this->session->set_userdata('mem_type', 'member');

                    $this->load->model('cart_model');
                    $this->cart_model->shift_cart();

                    if ($ref_row = $this->member_model->get_row($ref_code, 'mem_referral_code')) {

                        $ref_signup_data = array('mem_id' => $ref_row->mem_id, 'ref_mem_id' => $this->session->mem_id, 'reward' => 0);
                        $this->master->save("ref_signups", $ref_signup_data);

                        $txt = "Your friend " . ucfirst($post['fname']) . " " . ucfirst($post['lname']) . " signed up with your referral link. You will be rewarded after he/she completes his/her profile!";
                        save_notificaiton($ref_row->mem_id, $this->session->mem_id, $txt);
                    }

                    if (!empty($post['notified'])) {
                        $row = $this->master->getRow('newsletter', array('email' => $post['email']));
                        if (!$row)
                            $this->master->save('newsletter', array('email' => $post['email'], 'mem_id' => $this->session->mem_id));
                    }

                    $res['msg'] = showMsg('success', getSiteText('alert', 'registration'));

                    $verify_link = site_url('verification/' . $rando);
                    $mem_data = array('name' => ucfirst($post['fname']) . ' ' . ucfirst($post['lname']), "email" => $post['email'], "link" => $verify_link);
                    send_site_email($mem_data, 'signup');

                    $res['redirect_url'] = site_url('email-verification');
                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'E-mail Address Already In Use!');
                }
            }
            exit(json_encode($res));
        } else {
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'signup'));
            $this->data['site_content'] = unserialize($this->data['site_content']->code);
            $this->load->view("account/signup", $this->data);
        }
    }

    function signout()
    {
        $this->session->unset_userdata('mem_id');
        $this->session->unset_userdata('mem_type');
        $this->session->unset_userdata('redirect_url');
        $this->load->helper('cookie');
        delete_cookie('remember');
        redirect('signin', 'refresh');
        exit;
    }

    function forgot()
    {
        $this->MemLogged();
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
                $res['status'] = 0;
            } else {
                $post = $this->input->post();
                if ($mem = $this->member_model->forgotEmailExists($post['email'])) {
                    // $settings = $this->data['site_settings'];
                    $rando = doEncode(randCode(rand(15, 20)));
                    $this->master->save('members', array('mem_code' => $rando), 'mem_id', $mem->mem_id);

                    $reset_link = site_url('reset/' . $rando);
                    $mem_data = array('name' => $mem->mem_fname . ' ' . $mem->mem_lname, "email" => $mem->mem_email, "link" => $reset_link);
                    send_site_email($mem_data, 'forgot_password');

                    $res['msg'] = showMsg('success', 'We’ve sent a reset password link to the email address you entered to reset your password. If you don’t see the email, check your spam folder or email!');


                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'No such email address exists. Please try again!');
                    $res['status'] = 0;
                }
            }
            exit(json_encode($res));
        } else {
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'forgot'));
            $this->data['site_content'] = unserialize($this->data['site_content']->code);
            $this->load->view("account/forgot-password", $this->data);
        }
    }

    function reset_password()
    {
        $reset_id = intval($this->session->userdata('reset_id'));
        if ($row = $this->member_model->getMember($reset_id)) {
            if ($this->input->post()) {
                $res = array();
                $res['hide_msg'] = 0;
                $res['scroll_to_msg'] = 0;
                $res['status'] = 0;
                $res['frm_reset'] = 0;
                $res['redirect_url'] = 0;

                $reset_id = intval($this->session->userdata('reset_id'));
                if ($row = $this->member_model->getMember($reset_id)) {
                    $this->form_validation->set_rules('pswd', 'New Password', 'required');
                    $this->form_validation->set_rules('cpswd', 'Confirm Password', 'required|matches[pswd]');
                    if ($this->form_validation->run() === FALSE) {
                        $res['msg'] = validation_errors();
                    } else {

                        $post = html_escape($this->input->post());

                        $this->member_model->save(array('mem_pswd' => doEncode($post['pswd'])), $reset_id);
                        $this->session->unset_userdata('reset_id');
                        $res['msg'] = showMsg('success', 'You have successfully reset your password!');

                        $res['redirect_url'] = site_url('signup');
                        $res['status'] = 1;
                        $res['frm_reset'] = 1;
                        $res['hide_msg'] = 1;
                    }
                } else {
                    $res['msg'] = showMsg('error', 'Something is wrong, try again later!');
                }
                exit(json_encode($res));
            } else {
                $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'reset'));
                $this->data['site_content'] = unserialize($this->data['site_content']->code);
                $this->load->view("account/reset-password", $this->data);
            }
        } else {
            redirect('', 'refresh');
            exit;
        }
    }

    function reset($vcode)
    {
        if ($row = $this->member_model->getMemCode($vcode)) {
            $this->member_model->save(array('mem_code' => ''), $row->mem_id);
            $this->session->set_userdata('reset_id', $row->mem_id);
            redirect('reset-password', 'refresh');
            exit;
        } else {
            redirect('', 'refresh');
            exit;
        }
    }

    function verification($vcode = '')
    {
        // $this->MemLogged();
        if ($row = $this->member_model->getMemCode($vcode, intval($this->session->mem_id))) {
            if ($this->session->has_userdata('mem_id') && $this->session->mem_id != $row->mem_id) {
                setMsg('info', 'You are already logged in with different email!');
                redirect('account', 'refresh');
                exit;
            }
            $this->member_model->save(array('mem_verified' => 1, 'mem_code' => ''), $row->mem_id);

            $mem_data = array('name' => format_name($row->mem_fname, $row->mem_lname), "to_name" => $row->mem_fname, "email" => $row->mem_email);
            send_site_email($mem_data, 'welcome');

            setMsg('success', 'Your account has been successfully verified!');
            redirect('account', 'refresh');
            exit;
        } else {
            redirect('', 'refresh');
            exit;
        }
    }

    function store($cat = ''/*, $sub_cat = ''*/)
    {
        $this->load->model('product_model');
        $this->load->model('category_model');

        $this->data['query'] = $this->input->post();
        $this->data['query']['q'] = $this->input->get('q') ? trim($this->input->get('q')) : '';
        $this->data['cat'] = $cat;
        if (!empty($cat) && $cat_row = $this->category_model->get_row_where(['type' => 'product', 'slug' => $cat, 'parent_id' => 0, 'status' => 1])) {
            $this->data['cat_name'] = $cat_row->name;
            $this->data['query']['cat_id'] = $cat_row->id;
            // $this->data['sub_cats'] = $this->category_model->get_rows(['type' => 'product', 'parent_id' => $cat_row->id, 'status' => 1]);

            /*$this->data['max_price'] = get_max_price($cat_row->id);
            $this->data['sizes'] = get_group_sizes($cat_row->id);
            $this->data['colors'] = get_group_colors($cat_row->id);*/
        } elseif (!empty($cat)) {
            show_404();
            exit;
        }
        /*if (!empty($sub_cat) && $cat_row = $this->category_model->get_row_where(['type' => 'product', 'slug' => $sub_cat, 'parent_id' => $cat_row->id, 'status' => 1])) {
            $this->data['query']['cats'] = [$cat_row->id];
        } elseif (!empty($sub_cat)) {
            show_404();
            exit;
        }*/


        // pr($this->data['query']);

        $this->data['row_count'] = $this->product_model->count_search_result($this->data['query']);
		// pr($this->db->last_query());

        $page = intval($this->input->post('load'));
        $page = $page > 0 ? $page : 1;
        $per_page = 15;

        $this->data['total_pages'] = ceil($this->data['row_count'] / $per_page);
        $start = ($page - 1) * $per_page;

        $this->data['rows'] = $this->product_model->search($this->data['query'], $start, $per_page);
		// pr($this->db->last_query());


        if ($this->input->post()) {
            header('Content-Type: application/json');
            $res = array();
            $res['reached'] = $this->data['total_pages'] > $page ? false : true;
            $res['items'] = "";
            $res['found'] = 1;
            $res['load'] = 1;

            // exit(json_encode($post));

            /*$output['test'] = $this->db->last_query();
            $output['rows'] = $rows;
            $output['post'] = $post;*/

            if (count($this->data['rows']) > 0) {
                $res['found'] = 1;
                if ($this->input->post('load') > 0)
                    $res['load'] = $page + 1;
                foreach ($this->data['rows'] as $key => $row) {
                    $res['items'] .= '
                    <div class="col hidden">
                        <div class="itmBlk">
                            <div class="image"><a href="'.site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)).'"><img src="' . get_image_src($row->image) . '" alt=""></a></div>
                            <div class="txt">
                                <h6><a href="'.site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)).'">' . $row->title . '</a></h6>
                                <div class="rating">
                                    <div class="rateYo" data-rateyo-rating="'.get_avg_rating($row->id).'" data-rateyo-read-only="true"></div>
                                    <em>'.count_reviews($row->id).'</em>
                                </div>
                                <div class="btmBlk">
                                    <div class="price">'.
                                    format_amount($row->price);
                                    if (!empty($row->old_price)) {
                                        $res['items'] .= '<del>'.format_amount($row->old_price).'</del>';
                                    }
                                    $res['items'] .= '</div>
                                    '.favorite_btn($row->id, 'product').'
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
                $res['msg'] = '<span>'.$this->data['row_count'].' '.($this->data['row_count'] > 1 ? 'Items' : 'Item').'  available</span>';
            }
            else
                $res['msg'] = '<span>No item available</span>';
            exit(json_encode($res));
        } else {

            /*if (!empty($this->data['query']['price'])) {
                $ary = @explode(';', $this->data['query']['price']);
                $this->data['query']['min_price'] = floatval(trim($ary[0]));
                $this->data['query']['max_price'] = floatval(trim($ary[1]));
            }*/
            $this->data['max_price'] = $this->product_model->get_max_rate();
            $this->data['colors'] = $this->master->getRows('colors');
            $this->data['shapes'] = $this->master->getRows('shapes');
            $this->data['materials'] = $this->master->getRows('materials');
            $this->data['sizes'] = $this->master->getRows('sizes');

            $this->load->view('pages/store', $this->data);
        }
    }

    function product_detail($id, $slug)
    {
        $this->load->model('product_model');
        if ($this->data['row'] = $this->product_model->get_product($id, 1)) {
            $this->data['related_products'] = $this->product_model->get_related_products($this->data['row'], 8);

            $this->data['dg_content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'design_guide'));
            $this->data['dg_site_content'] = unserialize($this->data['dg_content_row']->code);

            $this->data['site_content']['page_title'] = $this->data['row']->title;
            $this->data['site_content']['meta_description'] = $this->data['row']->meta_description;
            $this->data['site_content']['meta_keywords'] = $this->data['row']->meta_keywords;
            $this->data['site_content']['meta_image'] = get_image_src($this->data['row']->image);

            $this->data['colors'] = $this->master->getRows('colors');
            $this->data['glasses'] = $this->master->getRows('glasses');
            $this->data['first_content'] = unserialize($this->data['glasses'][0]->detail);
            $this->data['second_content'] = unserialize($this->data['glasses'][1]->detail);
            $this->data['third_content'] = unserialize($this->data['glasses'][2]->detail);
            $this->data['fourth_content'] = unserialize($this->data['glasses'][3]->detail);
            $this->data['fifth_content'] = unserialize($this->data['glasses'][4]->detail);
            $this->data['sixth_content'] = unserialize($this->data['glasses'][5]->detail);
            // pr($this->data['first_content']);
            $this->data['reviews'] = get_reviews($id);


            $this->load->view('pages/product-detail', $this->data);
        }
        else
            show_404();
    }

    public function facebook_login()
    {

        include_once APPPATH . "libraries/Facebook/autoload.php";

        $fb = new Facebook\Facebook(array(
            'app_id' => '1621516391231142', // Replace {app-id} with your app id
            'app_secret' => '700dbe7cbdfe2ab506e58ce1e4afee53',
            'default_graph_version' => 'v2.9'
        ));

        $helper = $fb->getRedirectLoginHelper();
        $permissions = array('email'); // Optional permissions
        $loginUrl = $helper->getLoginUrl(base_url('ajax/fb_callback'), $permissions);
        $fb_login_url = ($loginUrl);
        redirect($fb_login_url, 'refresh');
        exit;
    }

    public function google_login()
    {

        include_once APPPATH . "libraries/Google/autoload.php";

        $client_id = '64946543542-d5qjd9vp2f71qrd62p13l1ftbeon40dg.apps.googleusercontent.com';
        $client_secret = 'h3Fkf00VUVHvSAMf4aLFhefG';
        $redirect_uri = base_url('google-callback');

        $client = new Google_Client();
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");
        $authUrl = $client->createAuthUrl();

        redirect(urldecode($authUrl), 'refresh');
    }

    public function twitter_login()
    {

        /*include_once APPPATH . "libraries/Twitter/OAuth.php";
       include_once APPPATH . "libraries/Twitter/twitteroauth.php";

       $client_id = '  ihs0ekv7iq91XlLbvACwod4jA';
       $client_secret = 'N0JnOSSL8BYH8a5ISPHp0YMSHatZFLa3TZfLcBfySTjetG6a0r';
       $redirect_uri = site_url('ajax/twitter_callback');

       $connection = new TwitterOAuth($client_id, $client_secret);

       $request_token = $connection->getRequestToken($redirect_uri); 
       pr($request_token);

       
       $this->session->set_userdata('oauth_token',$request_token['oauth_token']);
       $this->session->set_userdata('oauth_token_secret',$request_token['oauth_token_secret']);

       $authUrl = $connection->getAuthorizeURL($request_token['oauth_token']);
       redirect(urldecode($authUrl), 'refresh');
       exit;*/

        include_once APPPATH . "libraries/Twitter/autoload.php";
        // use Abraham\TwitterOAuth\TwitterOAuth;
        $client_id = '  ihs0ekv7iq91XlLbvACwod4jA';
        $client_secret = 'N0JnOSSL8BYH8a5ISPHp0YMSHatZFLa3TZfLcBfySTjetG6a0r';
        $redirect_uri = site_url('ajax/twitter_callback');

        $connection = new Abraham\TwitterOAuth\TwitterOAuth($client_id, $client_secret);
        $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => $redirect_uri));
        $this->session->set_userdata('oauth_token', $request_token['oauth_token']);
        $this->session->set_userdata('oauth_token_secret', $request_token['oauth_token_secret']);
        $authUrl = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
        redirect(urldecode($authUrl), 'refresh');
        exit;
    }
}
