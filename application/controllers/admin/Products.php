<?php

class Products extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(2);
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('brand_model');
        $this->load->model('material_model');
        $this->load->model('shape_model');
        $this->load->model('size_model');
        $this->load->model('color_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/index';

        $this->data['rows'] = $this->product_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/index';
        $id = $this->uri->segment(4);
        $this->data['row'] = $this->product_model->get_row($id);
        $this->data['page_title'] = $this->data['row'] ? "Update" : "Add New";

        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_top'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_message('integer', 'Please select a valid {field}');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
            $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'required');
            // $this->form_validation->set_rules('collection_id', 'Collection', 'required|integer', array('required' => 'Please select a {field}'));
            // $this->form_validation->set_rules('brand', 'Brand', 'required', array('required' => 'Please select a {field}'));
            $this->form_validation->set_rules('cat_id[]', 'Category', 'required|integer', array('required' => 'Please select a {field}'));
            // $this->form_validation->set_rules('sub_cat_id', 'Sub-Category', 'required|integer', array('required' => 'Please select a {field}'));
            $this->form_validation->set_rules('gender[]', 'Gender', 'required|in_list[Male,Female]', ['required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}']);
            // $this->form_validation->set_rules('color', 'Color', 'required', array('required' => 'Please select a {field}'));
            $this->form_validation->set_rules('shape', 'Shape', 'required', array('required' => 'Please select a {field}'));
            // $this->form_validation->set_rules('material', 'Material', 'required', array('required' => 'Please select a {field}'));
            $this->form_validation->set_rules('size', 'Size', 'required', array('required' => 'Please select a {field}'));
            // $this->form_validation->set_rules('sub_cat_ids[]', 'Sub-Categories', 'required|integer', array('required' => 'Please select a {field}'));
            $this->form_validation->set_rules('price', 'Price', 'required|numeric', array('numeric' => '{field} should be numeric'));
            // $this->form_validation->set_rules('old_price', 'Old Price', 'required|numeric', array('numeric' => '{field} should be numeric'));

            // $this->form_validation->set_rules('pcondition', 'Condition', 'required|in_list[New,Used]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
            $this->form_validation->set_rules('new_in', 'New In', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
            $this->form_validation->set_rules('premium', 'premium', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
            $this->form_validation->set_rules('best_seller', 'Best Seller', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
            $this->form_validation->set_rules('flash_sale', 'Flash Sale', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
            $this->form_validation->set_rules('sunglasses', 'Sunglasses', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
            // $this->form_validation->set_rules('frame_only', 'Frame Only', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
            $this->form_validation->set_rules('status', 'Status', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
            $this->form_validation->set_rules('stock', 'Stock', 'required|integer');
            /*$this->form_validation->set_rules('availability', 'Availability', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
            $this->form_validation->set_rules('colors[]', 'Colors', 'required', array('required' => 'Please select a {field}'));*/
            // $this->form_validation->set_rules('color_names[]', 'Color Names', 'required', array('required' => 'Please select a {field}'));
            /*$this->form_validation->set_rules('size[]', 'Size', 'required', array('required' => 'Please select a {field}'));
            $this->form_validation->set_rules('price[]', 'Price', 'required|numeric', array('numeric' => '{field} should be numeric'));*/
            // $this->form_validation->set_rules('qty[]', 'Quantity', 'required|integer', array('integer' => 'Please enter a {field}'));

            if ($this->form_validation->run() === FALSE)
                $res['msg'] = validation_errors();
            else {
                $post = html_escape($this->input->post());
                $cat_ids = @implode(',', $post['cat_id']);
                $genders = @implode(',', $post['gender']);
                $save_data = array('title' => $post['title'], 'meta_description' => $post['meta_description'], 'meta_keywords' => $post['meta_keywords']/*, 'pcondition' => $post['pcondition'], 'availability' => $post['availability'], 'brand' => $post['brand']*/, 'cat_ids' => $cat_ids, 'gender' => $genders, 'color' => $post['color'], 'shape' => $post['shape'], 'material' => $post['material'], 'size' => $post['size'], 'price' => $post['price'], 'old_price' => $post['old_price'], 'new_in' => $post['new_in'], 'premium' => $post['premium'], 'best_seller' => $post['best_seller'], 'flash_sale' => $post['flash_sale'], 'frame_only' => $post['frame_only'], 'sunglasses' => $post['sunglasses'], 'status' => $post['status'], 'stock' => $post['stock'], 'date' => date('Y-m-d H:i:s'));
                    // $save_data['collection_id'] = intval($post['collection_id']);
                    /*$save_data['cat_id'] = intval($post['cat_id']);
                $save_data['sub_cat_id'] = intval($post['sub_cat_id'])*/;
                // $save_data['sub_cat_ids'] = @implode(',', $post['sub_cat_ids']);
                // $save_data['colors'] = @implode(',', array_unique($post['colors']));

                $save_data['detail'] =  preg_replace("/&#?[a-z0-9]{2,8};/i", "", strip_tags($this->input->post('detail'))) == '' ? '' : $this->input->post('detail');

                if (($_FILES["image"]["name"] != "")) {
                    $image = upload_vfile('image');
                    if (!empty($image['file_name'])) {
                        remove_vfile($this->data['row']->image);
                        $save_data['image'] = $image['file_name'];
                    } else {
                        $res['msg'] = showMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                        exit(json_encode($res));
                    }
                }

                if (($_FILES["desc_image"]["name"] != "")) {
                    $image = upload_file(UPLOAD_PATH . "products/", 'desc_image');
                    if (!empty($image['file_name'])) {
                        $this->remove_file($this->data['row']->desc_image, 'products');
                        $save_data['desc_image'] = $image['file_name'];
                    } else {
                        $res['msg'] = showMsg('error', 'Please upload a valid Description image file >> ' . strip_tags($image['error']));
                        exit(json_encode($res));
                    }
                }



                $product_id = $this->product_model->save($save_data, $id);

                foreach ($_FILES['upload_files']['name'] as $key => $file_name) {
                    $_FILES['image_file']['name'] = $file_name;
                    $_FILES['image_file']['type'] = $_FILES['upload_files']['type'][$key];
                    $_FILES['image_file']['tmp_name'] = $_FILES['upload_files']['tmp_name'][$key];
                    $_FILES['image_file']['error'] = $_FILES['upload_files']['error'][$key];
                    $_FILES['image_file']['size'] = $_FILES['upload_files']['size'][$key];
                    if ($_FILES['image_file']['name'] != '') {
                        $image = upload_vfile('image_file');
                        if (!empty($image['file_name'])) {
                            $this->master->save('gallery', array('ref_id' => $product_id, 'ref_type' => 'product', 'image' => $image['file_name'], 'date' => date('Y-m-d H:i:s')));
                        } else {

                            remove_vfile($save_data['image']);
                            remove_gellary_vfile($product_id, 'product');

                            // $this->product_model->delete($product_id);

                            $res['msg'] = showMsg('error', 'Please upload a valid images file >> ' . strip_tags($image['error']));
                            exit(json_encode($res));
                        }
                    }
                }
                foreach ($post['dlt_images'] as $key => $dlt_img) {
                    remove_vfile($dlt_img);
                    $this->master->delete_where('gallery', array('ref_id' => $product_id, 'ref_type' => 'product', 'image' => $dlt_img));
                }

                /*$this->master->delete('product_colors', 'p_id', $product_id);
                foreach ($post['colors'] as $key => $color) {
                    $this->master->save('product_colors', ['p_id' => $product_id, 'color' => $color]);
                }

                $this->master->delete('product_sizes', 'p_id', $product_id);
                foreach ($post['size'] as $key => $size) {
                    $this->master->save('product_sizes', ['p_id' => $product_id, 'size' => $size, 'price' => $post['price'][$key], 'qty' => $post['qty'][$key]]);
                }*/

                $res['msg'] = showMsg('success', 'Product has been saved successfully.');
                $res['redirect_url'] = site_url(ADMIN . '/products');

                $res['status'] = 1;
                $res['frm_reset'] = 1;
            }
            exit(json_encode($res));
        }
        if ($this->data['row']) {
            $this->data['row']->images = get_gallery_images($id);
            /*$this->data['row']->sizes = $this->master->getRows('product_sizes', ['p_id' => $id]);
            $this->data['row']->colors = $this->master->getRows('product_colors', ['p_id' => $id]);*/
        }

        $this->data['materials'] = $this->material_model->get_rows();
        $this->data['colors'] = $this->color_model->get_rows();
        $this->data['shapes'] = $this->shape_model->get_rows();
        $this->data['sizes'] = $this->size_model->get_rows();
        // $this->data['brands'] = $this->brand_model->get_rows();
        $this->data['cats'] = get_main_cats();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    
    function delete()
    {
        has_access(10);
        // $this->remove_file($this->uri->segment(4));
        $this->product_model->delete($this->uri->segment('4'));
        setMsg('success', 'Product has been deleted successfully.');
        redirect(ADMIN . '/products', 'refresh');
    }
    

    /*** categories ***/

    function categories()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/categories';

        $this->data['rows'] = $this->category_model->get_rows(array('type' => 'product'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_category()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/categories';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['type'] = 'product';
            $vals['slug'] = url_title($vals['name'], '-', TRUE);

            $this->category_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Category has been saved successfully.');
            redirect(ADMIN . '/products/categories', 'refresh');
            exit;
        }

        $this->data['row'] = $this->category_model->get_row_where(array('id' => $this->uri->segment('4'), 'type' => 'product'));
        $this->data['parent_categories'] = $this->category_model->get_rows(array('parent_id' => 0, 'id<>' => $this->uri->segment(4)));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete_category($id)
    {
        $id = intval($id);
        if ($this->category_model->get_row_where(array('id' => $id, 'type' => 'product'))) {
            if ($this->product_model->get_row_where(array('cat_id' => $id))) {
                setMsg('error', "Category has related products, It can't be deleted");
                redirect(ADMIN . '/products/categories', 'refresh');
                exit;
            }
            $this->category_model->delete($id);
            setMsg('success', 'Category has been deleted successfully.');
            redirect(ADMIN . '/products/categories', 'refresh');
            exit;
        } else
            show_404();
    }

    /*** brands ***/

    function brands()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/brands';

        $this->data['rows'] = $this->brand_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_brand()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/brands';
        if ($this->input->post()) {
            $vals = $this->input->post();
            /*$vals['type'] = 'brand';
            $vals['slug'] = url_title($vals['name'], '-', TRUE);*/

            $this->brand_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Brand has been saved successfully.');
            redirect(ADMIN . '/products/brands', 'refresh');
            exit;
        }

        $this->data['row'] = $this->brand_model->get_row($this->uri->segment('4'));
        // $this->data['parent_brands'] = $this->brand_model->get_rows(array('parent_id' => 0, 'id<>' => $this->uri->segment(4)));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete_brand($id)
    {
        $id = intval($id);
        if ($this->brand_model->get_row($id)) {
            if ($this->product_model->get_row_where(array('brand_id' => $id))) {
                setMsg('error', "Brand has related products, It can't be deleted");
                redirect(ADMIN . '/products/brands', 'refresh');
                exit;
            }
            $this->brand_model->delete($id);
            setMsg('success', 'Brand has been deleted successfully.');
            redirect(ADMIN . '/products/brands', 'refresh');
            exit;
        } else
            show_404();
    }

    /*** shapes ***/

    function shapes()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/shapes';

        $this->data['rows'] = $this->shape_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_shape()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/shapes';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->shape_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Shape has been saved successfully.');
            redirect(ADMIN . '/products/shapes', 'refresh');
            exit;
        }

        $this->data['row'] = $this->shape_model->get_row($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete_shape($id)
    {
        $id = intval($id);
        if ($row = $this->shape_model->get_row($id)) {
            if ($this->product_model->get_row_where(array('shape' => $row->title))) {
                setMsg('error', "Shape has related products, It can't be deleted");
                redirect(ADMIN . '/products/shapes', 'refresh');
                exit;
            }
            $this->shape_model->delete($id);
            setMsg('success', 'Shape has been deleted successfully.');
            redirect(ADMIN . '/products/shapes', 'refresh');
            exit;
        } else
            show_404();
    }

    /*** materials ***/

    /*function materials()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/materials';
        
        $this->data['rows'] = $this->material_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_material()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/materials';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->material_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Material has been saved successfully.');
            redirect(ADMIN . '/products/materials', 'refresh');
            exit;
        }

        $this->data['row'] = $this->material_model->get_row($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete_material($id)
    {
        $id = intval($id);
        if ($row = $this->material_model->get_row($id)) {
            if ($this->product_model->get_row_where(array('material' => $row->title))) {
                setMsg('error',"Material has related products, It can't be deleted");
                redirect(ADMIN . '/products/materials', 'refresh');
                exit;
            }
            $this->material_model->delete($id);
            setMsg('success', 'Material has been deleted successfully.');
            redirect(ADMIN . '/products/materials', 'refresh');
            exit;
        }
        else
            show_404();
    }*/

    /*** sizes ***/

    function sizes()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/sizes';

        $this->data['rows'] = $this->size_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_size()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/sizes';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->size_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Size has been saved successfully.');
            redirect(ADMIN . '/products/sizes', 'refresh');
            exit;
        }

        $this->data['row'] = $this->size_model->get_row($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete_size($id)
    {
        $id = intval($id);
        if ($row = $this->size_model->get_row($id)) {
            if ($this->product_model->get_row_where(array('size' => $row->title))) {
                setMsg('error', "Size has related products, It can't be deleted");
                redirect(ADMIN . '/products/sizes', 'refresh');
                exit;
            }
            $this->size_model->delete($id);
            setMsg('success', 'Size has been deleted successfully.');
            redirect(ADMIN . '/products/sizes', 'refresh');
            exit;
        } else
            show_404();
    }

    /*** colors ***/

    function colors()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/colors';

        $this->data['rows'] = $this->color_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_color()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/colors';
        $this->data['row'] = $this->color_model->get_row($this->uri->segment('4'));
        if ($this->input->post()) {
            $vals = $this->input->post();
            if (($_FILES["image"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "colors/", 'image');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->data['row']->image, 'colors');
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "colors/", UPLOAD_PATH . "colors/", $image['file_name'], 100);
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/educational_videos/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            $this->color_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Color has been saved successfully.');
            redirect(ADMIN . '/products/colors', 'refresh');
            exit;
        }

        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete_color($id)
    {
        $id = intval($id);
        if ($row = $this->color_model->get_row($id)) {
            if ($this->product_model->get_row_where(array('color' => $row->title))) {
                setMsg('error', "Color has related products, It can't be deleted");
                redirect(ADMIN . '/products/colors', 'refresh');
                exit;
            }
            $this->color_model->delete($id);
            setMsg('success', 'Color has been deleted successfully.');
            redirect(ADMIN . '/products/colors', 'refresh');
            exit;
        } else
            show_404();
    }

    function remove_file($image, $folder)
    {
        $filepath = UPLOAD_PATH . "/{$folder}/" . $image;
        $filepath_thumb = UPLOAD_PATH . "/{$folder}/thumb_" . $image;
        if (is_file($filepath))
            unlink($filepath);
        if (is_file($filepath_thumb))
            unlink($filepath_thumb);
        return;
    }
}
