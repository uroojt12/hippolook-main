<?php
class Members extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(1);
        $this->load->model('member_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/members';
        $this->data['rows'] = $this->member_model->get_rows(array('mem_type' => 'member'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['pageView'] = ADMIN . '/members';
        $this->data['row'] = $this->member_model->getMember($this->uri->segment('4'));
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['mem_type'] = 'member';
            
            if($vals['mem_pswd'] != '')
                $vals['mem_pswd'] = doEncode($vals['mem_pswd']);

            if (($_FILES["mem_image"]["name"] != "")) {
                $image = upload_vfile('mem_image');
                if (!empty($image['file_name'])) 
                {
                    if(!empty($this->data['row']->mem_image))
                        remove_vfile($this->data['row']->mem_image);
                    $vals['mem_image'] = $image['file_name'];
                }
            }
            
            
            $this->member_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Member has been saved successfully.');
            redirect(ADMIN . '/members/manage/' . $this->uri->segment(4), 'refresh');
            exit;
        }

        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function active()
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '1';
        $this->member_model->save($vals, $mem_id);
        setMsg('success', 'Member has been activated successfully.');
        redirect(ADMIN . '/members', 'refresh');
    }

    function inactive()
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '0';
        $this->member_model->save($vals, $mem_id);
        setMsg('success', 'Member has been deactivated successfully.');
        redirect(ADMIN . '/members', 'refresh');
    }

    function delete($id)
    {
        $id = intval($id);
        if ($row = $this->member_model->getMember($id)) {
            if ($this->master->getRow('orders', ['mem_id' => $id])) {
                setMsg('error', "This promocode has related order, So it can't be deleted.");
                redirect(ADMIN . '/members', 'refresh');
                exit;
            }
            
            remove_vfile($row->mem_image);
            $this->member_model->delete($id);
            $this->master->delete('ref_signups', 'ref_mem_id', $id);
            setMsg('success', 'Member has been deleted successfully.');
            redirect(ADMIN . '/members', 'refresh');
            exit;
        }
        else
            show_404();
    }

    function csv_export()
    {
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=members-'.date('Y-m-dHis').'-'.toSlugUrl($this->data['adminsite_setting']->site_name).'.csv');

        $output = fopen('php://output', 'w');

        fputcsv($output, array('Sr.', 'Name', 'Email'));

        $rows = $this->member_model->get_rows(array('mem_type' => 'member', 'mem_verified' => 1));

        foreach ($rows as $key => $row) {
            $arr = array($key+1, $row->mem_fname.' '.$row->mem_lname, $row->mem_email);
            fputcsv($output, $arr);
        }
        fclose($output);
        exit;
    }

    function comics($id=0){
        if($this->data['member_row'] = $this->member_model->getMember($id))
        {
            $this->load->model('comic_model');
            $this->data['mem_id'] = $id;
            $this->data['rows']=$this->comic_model->get_rows(array('mem_id'=>$id,'deleted'=>0),'','','desc');
            $this->data['add_url'] = site_url(ADMIN . '/comics/manage/'.$id);
            $this->data['enable_datatable'] = TRUE;
            $this->data['pageView'] = ADMIN . '/comics';
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }else
        show_404();
    }

    function novels($id=0){
        if($this->data['member_row'] = $this->member_model->getMember($id))
        {
            $this->load->model('novel_model');

            $this->data['mem_id'] = $id;
            $this->data['rows']=$this->novel_model->get_rows(array('mem_id'=>$id,'deleted'=>0),'','','desc');
            $this->data['add_url'] = site_url(ADMIN . '/novels/manage/'.$id);
            $this->data['enable_datatable'] = TRUE;
            $this->data['pageView'] = ADMIN . '/novels';
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }else
        show_404();
    }

    function transactions($id=0){
        if($this->data['member_row'] = $this->member_model->getMember($id))
        {
            $this->load->model('transaction_model');
            $this->data['rows'] = $this->transaction_model->get_rows(array('withdraw'=>0,'mem_id'=>$id),'','','desc');
            $this->data['enable_datatable'] = TRUE;
            $this->data['pageView'] = ADMIN . '/transactions';
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }else
        show_404();

    }
    function withdraws($id=0){
        if($this->data['member_row'] = $this->member_model->getMember($id))
        {
            $this->load->model('transaction_model');
            $this->data['rows'] = $this->transaction_model->get_rows(array('withdraw'=>1,'mem_id'=>$id),'','','desc');
            $this->data['enable_datatable'] = TRUE;
            $this->data['pageView'] = ADMIN . '/withdraw-requests';
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }else
        show_404();

    }
    function chats($id=0){
        if($this->data['member_row'] = $this->member_model->getMember($id,array('mem_type'=>'member')))
        {
            $this->load->model('chat_model');
            $this->data['rows'] = $this->chat_model->get_mem_msgs_list($id);
            $this->data['enable_datatable'] = TRUE;
            $this->data['pageView'] = ADMIN . '/chats';
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }else
        show_404();
        
    }

/*function remove_member_data($id) {
$gigs_rows=$this->comic_model->get_gigs(array('mem_id'=>$id));
foreach ($gigs_rows as $key => $gig) {
$this->db->query("delete from `tbl_favorites` where ref_type='gig' and ref_id=".$gig->id);
$thumbpath = UPLOAD_IMAGES . "/gigs/" . $gig->thumbnail;
if (is_file($thumbpath)) {
unlink($thumbpath);
}
foreach ($gig->images as $key => $gimage) {
$filepath = UPLOAD_PATH . "/gigs/" . $gimage->image;
if (is_file($filepath)) {
unlink($filepath);
}
$this->comic_model->delete_image($image->id);
}
$this->comic_model->delete($gig->id);
}
$rows=$this->product_model->get_products(array('mem_id'=>$id));
foreach ($rows as $key => $product) {
$thumbpath = UPLOAD_IMAGES . "/products/" . $product->thumbnail;
if (is_file($thumbpath)) {
unlink($thumbpath);
}
foreach ($product->images as $key => $image) {
$filepath = UPLOAD_PATH . "/products/" . $image->image;
if (is_file($filepath)) {
unlink($filepath);
}
$this->product_model->delete_image($image->id);
}
$this->db->query("delete from `tbl_favorites` where ref_type='product' and ref_id=".$product->id);
$this->product_model->delete($product->id);
}
}*/
}
?>