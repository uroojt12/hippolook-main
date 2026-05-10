<?php
class Sitecontent extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(11);
        $this->table_name = 'sitecontent';
    }

    public function login()
    {
        $this->data['enable_editor'] = FALSE;
        $this->data['pageView'] = ADMIN . '/site_login';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'login'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'login'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'images/', 'image');
                if (!empty($image['file_name'])) {
                    if(isset($content_row['image']))
                        $this->remove_file(UPLOAD_PATH."images/".$content_row['image']);
                    $vals['image'] = $image['file_name'];
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/sitecontent/login', 'refresh');
                    exit;
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data), 'ckey', 'login');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/login");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'login'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function signup()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_signup';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'signup'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'signup'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'images/', 'image');
                if (!empty($image['file_name'])) {
                    if(isset($content_row['image']))
                        $this->remove_file(UPLOAD_PATH."images/".$content_row['image']);
                    $vals['image'] = $image['file_name'];
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/sitecontent/signup', 'refresh');
                    exit;
                }
            }
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data), 'ckey', 'signup');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/signup");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'signup'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function forgot()
    {
        $this->data['enable_editor'] = FALSE;
        $this->data['pageView'] = ADMIN . '/site_forgot';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'forgot'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'forgot'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'images/', 'image');
                if (!empty($image['file_name'])) {
                    if(isset($content_row['image']))
                        $this->remove_file(UPLOAD_PATH."images/".$content_row['image']);
                    $vals['image'] = $image['file_name'];
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/sitecontent/forgot', 'refresh');
                    exit;
                }
            }
            $data = serialize(array_merge($content_row,$vals));
            $this->master->save($this->table_name, array('code' => $data), 'ckey', 'forgot');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/forgot");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'forgot'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function reset()
    {
        $this->data['enable_editor'] = FALSE;
        $this->data['pageView'] = ADMIN . '/site_reset';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'reset'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'reset'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row=array();
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'images/', 'image');
                if (!empty($image['file_name'])) {
                    if(isset($content_row['image']))
                        $this->remove_file(UPLOAD_PATH."images/".$content_row['image']);
                    $vals['image'] = $image['file_name'];
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/sitecontent/reset', 'refresh');
                    exit;
                }
            }
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data), 'ckey', 'reset');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/reset");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'reset'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function email_verify()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_email_verify';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'email_verify'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'email_verify'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row=array();
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data), 'ckey', 'email_verify');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/email_verify");
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'email_verify'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function phone_verify()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_phone_verify';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'phone_verify'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'phone_verify'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row=array();
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data), 'ckey', 'phone_verify');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/phone_verify");
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'phone_verify'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function home()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_home';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'home'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'home'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            for($i = 1; $i <= 3; $i++) {
                if (isset($_FILES["first_image".$i]["name"]) && $_FILES["first_image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'first_image'.$i);
                    if(!empty($image['file_name'])){
                        $vals['first_image'.$i] = $image['file_name'];
                        if (isset($content_row['first_image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['first_image'.$i]);
                    }
                }
            }

            for($i = 1; $i <= 5; $i++) {
                if (isset($_FILES["second_image".$i]["name"]) && $_FILES["second_image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'second_image'.$i);
                    if(!empty($image['file_name'])){
                        $vals['second_image'.$i] = $image['file_name'];
                        if (isset($content_row['second_image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['second_image'.$i]);
                    }
                }
            }

            for($i = 1; $i <= 2; $i++) {
                if (isset($_FILES["fourth_image".$i]["name"]) && $_FILES["fourth_image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'fourth_image'.$i);
                    if(!empty($image['file_name'])){
                        $vals['fourth_image'.$i] = $image['file_name'];
                        if (isset($content_row['fourth_image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['fourth_image'.$i]);
                    }
                }
            }

            for($i = 1; $i <= 2; $i++) {
                if (isset($_FILES["seventh_image".$i]["name"]) && $_FILES["seventh_image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'seventh_image'.$i);
                    if(!empty($image['file_name'])){
                        $vals['seventh_image'.$i] = $image['file_name'];
                        if (isset($content_row['seventh_image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['seventh_image'.$i]);
                    }
                }
            }

            /*if (empty($vals['banner_section']))
                unset($content_row['banner_section']);
            if (empty($vals['second_section']))
                unset($content_row['second_section']);
            if (empty($vals['third_section']))
                unset($content_row['third_section']);
            if (empty($vals['fourth_section']))
                unset($content_row['fourth_section']);
            if (empty($vals['last_section']))
                unset($content_row['last_section']);*/

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data), 'ckey', 'home');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/home");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'home'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function about()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_about';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'about'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'about'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 3; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }


            for($i = 1; $i <= 6; $i++) {
                if (isset($_FILES["third_image".$i]["name"]) && $_FILES["third_image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'third_image'.$i);
                    if(!empty($image['file_name'])){
                        $vals['third_image'.$i] = $image['file_name'];
                        if (isset($content_row['third_image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['third_image'.$i]);
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'about');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/about");
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'about'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function design_guide()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_design_guide';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'design_guide'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'design_guide'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 6; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        $vals['image'.$i] = $image['file_name'];
                        if (isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'design_guide');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/design_guide");
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'design_guide'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function contact()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_contact';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'contact'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'contact'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            $data = serialize(array_merge($content_row,$vals));
            $this->master->save($this->table_name, array('code' => $data), 'ckey', 'contact');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/contact");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'contact'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function choose_us()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_choose_us';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'choose_us'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'choose_us'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 2; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }


            for($i = 1; $i <= 4; $i++) {
                if (isset($_FILES["second_image".$i]["name"]) && $_FILES["second_image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'second_image'.$i);
                    if(!empty($image['file_name'])){
                        $vals['second_image'.$i] = $image['file_name'];
                        if (isset($content_row['second_image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['second_image'.$i]);
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'choose_us');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/choose_us");
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'choose_us'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function faq()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_faq';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'faq'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'faq'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'faq');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/faq");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'faq'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function blog()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_blog';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'blog'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'blog'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'blog');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/blog");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'blog'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function educational_videos()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_educational_videos';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'educational_videos'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'educational_videos'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data), 'ckey', 'educational_videos');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/educational_videos");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'educational_videos'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }



    public function shipping_handling()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_shipping_handling';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'shipping_handling'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'shipping_handling'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'shipping_handling');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/shipping_handling");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'shipping_handling'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function cookies()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cookies';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cookies'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'cookies'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'cookies');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cookies");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'cookies'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function return_policy()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_return_policy';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'return_policy'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'return_policy'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'return_policy');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/return_policy");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'return_policy'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function customer_service()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_customer_service';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'customer_service'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'customer_service'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'customer_service');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/customer_service");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'customer_service'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function disclaimer()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_disclaimer';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'disclaimer'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'disclaimer'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'disclaimer');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/disclaimer");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'disclaimer'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function payment_policy()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_payment_policy';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'payment_policy'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'payment_policy'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'payment_policy');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/payment_policy");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'payment_policy'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    


    function privacy_policy()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_privacy_policy';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'privacy_policy'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'privacy_policy'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'privacy_policy');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/privacy_policy");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'privacy_policy'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function terms_conditions()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_terms_conditions';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'terms_conditions'));
            if (!$content_row)
                $this->master->save($this->table_name, array('ckey' => 'terms_conditions'));
            $content_row = unserialize($content_row->code);
            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            unset($vals['detail']);
            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name, array('code' => $data, 'full_code' => $this->input->post('detail')), 'ckey', 'terms_conditions');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/terms_conditions");
            exit;
        }

        $this->data['content'] = $this->master->getRow($this->table_name, array('ckey' => 'terms_conditions'));
        $this->data['row'] = unserialize($this->data['content']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function delete()
    {
        $arr = $this->input->post('delete');
        foreach ($arr as $key => $values) {
            $this->master->delete($this->table_name, 'id', $values);
        }
        redirect("admin/sitecontent/slider", 'refresh');
    }

    function remove_file($filepath)
    {
        if (is_file($filepath))
            unlink($filepath);
        return;
    }

}
?>