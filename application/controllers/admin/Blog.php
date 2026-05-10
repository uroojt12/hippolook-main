<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Blog extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(6);
        $this->load->model('blog_model');
        $this->load->model('bcategory_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/blog/index';
        $this->data['rows'] = $this->blog_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/blog/index';

        if ($this->input->post()) {
            $vals = $this->input->post();

            if (($_FILES["image"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "blog/", 'image');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4), 'image');
                    $vals['image'] = $image['file_name'];
                    // generate_thumb(UPLOAD_PATH . "blog/", UPLOAD_PATH . "blog/", $image['file_name'], 1500, '');
                    // generate_thumb(UPLOAD_PATH . "blog/", UPLOAD_PATH . "blog/", $image['file_name'], 825, '825p_');
                    // generate_thumb(UPLOAD_PATH . "blog/", UPLOAD_PATH . "blog/", $image['file_name'], 100, 'thumb_');
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/blog/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            $vals['date'] = db_format_date($vals['date']);
            $vals['slug'] = url_title($vals['title'], '-', TRUE);
            $this->blog_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Blog Article has been saved successfully.');
            redirect(ADMIN . '/blog', 'refresh');
            exit;
        }


        $this->data['row'] = $this->blog_model->get_row($this->uri->segment('4'));
        $this->data['categories'] = $this->bcategory_model->get_rows();

        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id)
    {
        $id = intval($id);
        $this->remove_file($id);
        $this->blog_model->delete($id);
        setMsg('success', 'Blog Article has been deleted successfully.');
        redirect(ADMIN . '/blog', 'refresh');
        exit;
    }

    private function remove_file($id, $type = '')
    {
        $arr = $this->blog_model->get_row($id);

        $filepath = UPLOAD_PATH . "/blog/" . $arr->image;
        $filepath_thumb = UPLOAD_PATH . "/blog/thumb_" . $arr->image;
        $filepath_300p = UPLOAD_PATH . "/blog/300p_" . $arr->image;
        if (is_file($filepath)) {
            unlink($filepath);
        }
        if (is_file($filepath_thumb))
            unlink($filepath_thumb);
        if (is_file($filepath_300p))
            unlink($filepath_300p);
        return;
    }

    /*** categories ***/

    function categories()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/blog/categories';

        $this->data['rows'] = $this->bcategory_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_category()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/blog/categories';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $this->bcategory_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Category has been saved successfully.');
            redirect(ADMIN . '/blog/categories', 'refresh');
            exit;
        }

        $this->data['row'] = $this->bcategory_model->get_row($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete_category($id)
    {
        $id = intval($id);
        if ($this->blog_model->get_row_where(array('cat_id' => $id))) {
            setMsg('error', "Category has related blog, It can't be deleted");
            redirect(ADMIN . '/blog/categories', 'refresh');
            exit;
        }
        $this->bcategory_model->delete($id);
        setMsg('success', 'Category has been deleted successfully.');
        redirect(ADMIN . '/blog/categories', 'refresh');
        exit;
    }
}
