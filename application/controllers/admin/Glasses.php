<?php

class Glasses extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(3);
        $this->load->model('glass_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/glasses';
        
        $this->data['rows'] = $this->glass_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/glasses';
        $this->data['row'] = $this->glass_model->get_row($this->uri->segment('4'));

        $this->data['content_row'] = @unserialize($this->data['row']->detail);

        if ($this->input->post()) {
            $post = $this->input->post();
            
            $content_row = $this->data['content_row'];
            if(!is_array($content_row))
                $content_row = array();

            $vals = [/*'title' => $post['title'], */'type_first_price' => $post['type_first_price'], 'type_second_price' => $post['type_second_price']/*, 'type_third_price' => $post['type_third_price']*/, 'property_first_price' => $post['property_first_price'], 'property_second_price' => $post['property_second_price'], 'classic_first_price' => $post['classic_first_price'], 'classic_second_price' => $post['classic_second_price'], 'classic_third_price' => $post['classic_third_price']];
            unset($post['title'], $post['type_first_price'], $post['type_second_price']/*, $post['type_third_price']*/, $post['property_first_price'], $post['property_second_price'], $post['classic_first_price'], $post['classic_second_price'], $post['classic_third_price']);

            if (($_FILES["main_icon"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "glasses/", 'main_icon');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $post['main_icon'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid Main Icon image >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/glasses/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            if (($_FILES["type_first_icon"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "glasses/", 'type_first_icon');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $post['type_first_icon'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid Lens Type First Icon image >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/glasses/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            if (($_FILES["type_second_icon"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "glasses/", 'type_second_icon');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $post['type_second_icon'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid Lens Type Second Icon image >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/glasses/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            /*if (($_FILES["type_third_icon"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "glasses/", 'type_third_icon');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $post['type_third_icon'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid Lens Type Third Icon image >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/glasses/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }*/


            if (($_FILES["property_first_icon"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "glasses/", 'property_first_icon');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $post['property_first_icon'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid Lens Property First Icon image >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/glasses/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            if (($_FILES["property_second_icon"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "glasses/", 'property_second_icon');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $post['property_second_icon'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid Lens Property Second Icon image >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/glasses/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            
            if (($_FILES["classic_first_icon"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "glasses/", 'classic_first_icon');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $post['classic_first_icon'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid Classic Lenses First Icon image >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/glasses/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            if (($_FILES["classic_second_icon"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "glasses/", 'classic_second_icon');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $post['classic_second_icon'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid Classic Lenses Second Icon image >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/glasses/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            if (($_FILES["classic_third_icon"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "glasses/", 'classic_third_icon');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $post['classic_third_icon'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid Classic Lenses Third Icon image >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/glasses/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            $vals['detail'] = serialize(array_merge($content_row, $post));

            $this->glass_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Service has been saved successfully.');
            redirect(ADMIN . '/glasses', 'refresh');
        }

        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    /*
    function delete()
    {
        has_access(10);
        $this->remove_file($this->uri->segment(4));
        $this->glass_model->delete($this->uri->segment('4'));
        setMsg('success', 'Service has been deleted successfully.');
        redirect(ADMIN . '/glasses', 'refresh');
    }
    */

    private function remove_file($image)
    {
        $filepath = UPLOAD_PATH . "/glasses/" . $image;
        if (is_file($filepath))
            unlink($filepath);
        return;
    }

}

?>