<?php

class Blog extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
        $this->load->model('bcategory_model');
	}

	/*
	function index($page = 1)
	{

		$page = intval($page);

		$per_page = 12;
		$total = $this->blog_model->num_rows('site_blogs', array('site_id' => $this->site_id));
		$total_pages = ceil($total/$per_page);
		
		if($page <= $total_pages || $page > 0){
			
			$this->load->library('pagination');
			$this->config->load('pagination');
			
			$config = $this->config->item('pagination');        
			$config['base_url'] = base_url('blog');
			$config['total_rows'] = $total;
			$config['per_page'] = $per_page;
			$this->pagination->initialize($config); 
			$this->data['links'] = $this->pagination->create_links();

			$start = ($page-1)*$per_page;

			$this->data['rows'] = $this->blog_model->get_rows(array('site_id' => $this->site_id), $start, $per_page,  'desc');
			$this->data['recent_blogs'] = $this->blog_model->get_rows(array('site_id' => $this->site_id), '', 8, 'desc');
			$this->data['categories'] = $this->blog_model->get_rows(array('site_id'=>$this->site_id), '', '', 'desc');
			$this->load->view("pages/blog", $this->data);	
		}
		else
			show_404();

	}
	*/
	function index($cat_id = 0)
	{

		$cat_id = intval($cat_id);
		$condition = array();
		if ($cat_id > 0) {
			$cat_row = $this->master->getRow('blog_categories', array('id' => $cat_id), '', '', 'desc');
			$condition['cat_id'] = $cat_id;
			if (!$cat_row){
				show_404();
				exit;
			}
		}
		
		$this->data['rows'] = $this->blog_model->get_rows($condition, '', '', 'asc');
		$this->data['recent_blogs'] = $this->blog_model->get_rows(array(),'',8, 'desc');
		$this->data['categories'] = $this->bcategory_model->get_rows(array(), '', '', 'asc', 'title');

		$this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'blog'));
		$this->data['site_content'] = unserialize($this->data['content_row']->code);
		$this->load->view("pages/blog", $this->data);
	}

	function detail($id)
	{
		$id = intval($id);
		if($this->data['row'] = $this->blog_model->get_row($id)){
			;
			$this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'blog'));
			$this->data['site_content'] = unserialize($this->data['content_row']->code);
			
			$this->data['site_content']['page_title'] = $this->data['row']->title;
            $this->data['site_content']['meta_description'] = $this->data['row']->meta_description;
            $this->data['site_content']['meta_keywords'] = $this->data['row']->meta_keywords;
            $this->data['site_content']['meta_image'] = get_site_image_src("blog", $this->data['row']->image);

			$this->data['recent_blogs'] = $this->blog_model->get_rows(array(), '', 8, 'desc');
			$this->data['categories'] = $this->bcategory_model->get_rows(array(), '', '', 'asc', 'title');
			$this->load->view('pages/blog-detail', $this->data);
		}
		else
			show_404();
	}

}
?>