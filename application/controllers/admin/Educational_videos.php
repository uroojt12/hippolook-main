<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Educational_videos extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(7);
        $this->load->model('educational_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/educational_videos';
        
        $this->data['rows'] = $this->educational_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {

        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/educational_videos';
        $this->data['row'] = $this->educational_model->get_row($this->uri->segment('4'));

        if ($this->input->post()) {
            $vals = $this->input->post();
            if (($_FILES["image"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "educational/", 'image');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->data['row']->image, 'image');
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "educational/", UPLOAD_PATH . "educational/", $image['file_name'], 575, 'thumb_');
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/educational_videos/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            if (isset($_FILES["video_file"]["name"]) && $_FILES["video_file"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'educational/', 'video_file', 'video');
                if(!empty($image['file_name'])) {
                    if(isset($content_row['video_file']))
                        $this->remove_file($this->data['row']->video_file, 'video');
                    $vals['video_file'] = $image['file_name'];
                }
            }

            $this->educational_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Educational Video has been saved successfully.');
            redirect(ADMIN . '/educational_videos', 'refresh');
            exit;
        }


        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id)
    {
        $id = intval($id);
        if ($row = $this->educational_model->get_row($id)) {
            $this->remove_file($row->image);
            $this->remove_file($row->video_file);
            $this->educational_model->delete($id);
            setMsg('success', 'Educational Video has been deleted successfully.');
            redirect(ADMIN . '/educational_videos', 'refresh');
            exit;
        }
        else
            show_404();
    }

    function remove_file($file)
    {
        $filepath = UPLOAD_PATH . "/educational/" . $file;
        $filepath_thumb = UPLOAD_PATH . "/educational/thumb_" . $file;
        if (is_file($filepath))
            unlink($filepath);
        if (is_file($filepath_thumb))
            unlink($filepath_thumb);
        return;
    }
}

?>