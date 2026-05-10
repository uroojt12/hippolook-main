<?php
// set_time_limit(0);
include_once APPPATH.'libraries/simple_html_dom.php';
class Scraping extends Admin_Controller
{
    private $html = NULL;
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(4);
        $this->load->model('product_model');
        $this->load->model('brand_model');
        $this->load->model('material_model');

        // $this->load->library('simple_html_dom');
        $this->html = new simple_html_dom();
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/scraping';
        
        $this->data['rows'] = $this->master->getRows('scraping');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/scraping';
        if ($this->input->post()) {
            $vals = $this->input->post();
            /*$vals['type'] = 'scraping';
            $vals['slug'] = url_title($vals['name'], '-', TRUE);*/

            $this->master->save('scraping', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Material has been saved successfully.');
            redirect(ADMIN . '/scraping', 'refresh');
            exit;
        }

        $this->data['row'] = $this->master->getRow('scraping', ['id' => $this->uri->segment('4')]);
        // $this->data['parent_scraping'] = $this->master->get_rows(array('parent_id' => 0, 'id<>' => $this->uri->segment(4)));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id)
    {
        $id = intval($id);
        if ($this->master->get_row($id)) {
            
            $this->master->delete($id);
            $this->master->delete($id);
            setMsg('success', 'Material has been deleted successfully.');
            redirect(ADMIN . '/products/scraping', 'refresh');
            exit;
        }
        else
            show_404();
    }

    /*** Scraping ***/

    function scrape($id, $start = 0, $end = 0 )
    {
                

        $store_row = $this->master->getRow('scraping',['id' => $id, 'scraped' => 0]);
        // pr($store_row);
        if (count($store_row) == 1) {
            /*$this->save_pagination($store_row->link);
            $this->render_products_url();*/
            // exit;
            $this->html = new simple_html_dom();
        
            $urls = ($start > 0 and $end > 0) ? $urls = $this->master->getRows('scrape_products_url', NULL, $start, $end) : $this->master->getRows('scrape_products_url');
            $purl_counts = count($urls);
            $records = 0;
            // pr($urls);
            $scrape_urls = array();
            foreach ($urls as $key => $url) {
                echo $key.'</br>';
                $str = $this->fetch_request($url->url);
                // $str = $this->fetch_request('https://www.ebay.co.uk/itm/Women-VOGUE-Print-2-Piece-Co-Ord-Lounge-wear-Tracksuit-Ladies-Long-New-Style-UK/303593386696?hash=item46af9372c8:g:z4UAAOSwJ9Ffm9U~');
                $this->html->load($str);
                //Render Images
                $product_heading = $this->html->find('div#LeftSummaryPanel h1', 0)->innertext;
                $str_pos = strpos($product_heading, '</span>');
                $str_pos = $str_pos != false ? $str_pos+7 : 0;
                $product_heading = substr($product_heading, $str_pos);

                $condition = strip_tags($this->html->find('div#LeftSummaryPanel div.nonActPanel div.condText')[0]);
                $price =  $this->html->find('div.actPanel span#prcIsum')[0]->getAttribute('content');
                $product_desc = $this->html->find('div#vi-desc-maincntr div.itemAttr div.section')[0];
                $item_location =  strip_tags($this->html->find('div.sh-loc')[0]);
                $ship_to .= $this->html->find('span#shipsToTab div.sh-sLoc')[0];
                $variant =  array();
                if ($this->html->find('select#msku-sel-1')[0] != "" ) {
                    $variant_1 = $this->html->find('select#msku-sel-1')[0]->getAttribute('name');
                    if ($variant_1!= "") {
                        foreach ($this->html->find('select#msku-sel-1 option') as $key => $colour) {
                            if ($key != 0) {
                                $variant[$variant_1][] =  strip_tags($colour);
                            }
                         }
                    }
                }
                if ($this->html->find('select#msku-sel-2')[0] != "") {
                    $variant_2 = $this->html->find('select#msku-sel-2')[0]->getAttribute('name');
                    foreach ($this->html->find('select#msku-sel-2 option') as $key => $colour) {
                        if ($key != 0) {
                            $variant[$variant_2][] = strip_tags($colour);
                        }
                    } 
                }
                // pr($variant);
                $images = array();
                foreach ($this->html->find('div#vi_main_img_fs ul li') as $key => $element) {
                    $images[]  = str_replace('s-l64','s-l1200', $element->find('table.img td div img')[0]->getAttribute('src'));
                    // echo $element->find('table.img td div img')[0]->getAttribute('src').'<br>';
                }
                

                if (empty($store_row->percentage) && $store_row->percentage > 0) {
                    $increased_amount = round(($price*$store_row->percentage)/100, 2);
                    $price += $increased_amount;
                }
                
                $save_data = array('title' => $product_heading, 'default_price' => $price, 'pcondition' => $condition, 'status' => 0, 'availability' => 1, 'meta_description' => $product_heading, 'meta_keywords' => $product_heading, 'brand' => $url->brand, 'store_link' => $url->url, 'detail' => $product_desc, 'date' => date('Y-m-d H:i:s'));

                $ext = @explode(".", $images[0]);
                $file_name = 'image_'.time() . '_' . rand(1111, 9999).'_'.md5(rand(1, 100)).'.'.end($ext);
                $res = create_file_copy($images[0], UPLOAD_PATH . "scraped/".$file_name);
                if ($res) 
                    $save_data['image'] = $file_name;

                $p_id = $this->master->save('scrape_products', $save_data);

                foreach ($variant['Colour'] as $key => $color) {
                    $this->master->save('scrape_product_colors', ['p_id' => $p_id, 'color' => $color, 'color_name' => $color]);
                }

                foreach ($variant['Size'] as $key => $size) {
                    $this->master->save('scrape_product_sizes', ['p_id' => $p_id, 'size' => $size]);
                }

                foreach ($images as $key => $img) {
                    if ($key !== 0) {
                        $ext = @explode(".", $img);
                        $file_name = 'image_'.time() . '_' . rand(1111, 9999).'_'.md5(rand(1, 100)).'.'.end($ext);
                        $res = create_file_copy($img, UPLOAD_PATH . "scraped/".$file_name);
                        if ($res)
                            $this->master->save('scrape_product_images', ['p_id' => $p_id, 'image' => $file_name]);
                    }
                }
                /*pr($images);
                die;*/

                $this->master->delete('scrape_products_url', 'id', $url->id);
                $records++;
                if ($records == 20 && $purl_counts > $records) {
                    redirect(ADMIN . '/scraping/scrape/'.$id, 'refresh');
                    exit;
                }
                /*if ($purl_counts < 320){
                    setMsg('success', 'Store has been scraped successfully.');
                    redirect(ADMIN . '/scraping', 'refresh');
                    exit;
                }*/
            }
            // $this->master->query("TRUNCATE `tbl_scrape_products_url`");
            $this->master->save('scraping', ['scraped' => 1], 'id', $store_row->id);

            setMsg('success', 'Store has been scraped successfully.');
            redirect(ADMIN . '/scraping', 'refresh');
            exit;

        }
        else
            show_404();
    }

    function render_products_url($id)
    {
        if ($store_row = $this->master->getRow('scraping', ['id' => $id, 'scraped' => 0])) {
            $urls = $this->master->getRows('scrape_store_links');
            $scrape_urls = array();
            foreach ($urls as $key => $url) {
                $str = $this->fetch_request($url->url);
                $this->html->load($str);
                foreach ($this->html->find('ul.b-list__items_nofooter li') as $key => $element) {
                   $brnd_name = NULL;
                   $brand_raw =  strip_tags($element->find('div.s-item__details span.s-item__detail--secondary')[0]);
                   $brnd_name = explode(":", $brand_raw)[1];
                   if (!empty($brnd_name)) {
                        $brand_row =  $this->master->getRow('brands',['title' => $brnd_name]); 
                        if(empty($brand_row))
                            $this->master->save('brands',['title' => $brnd_name]);
                   }
                    $aleady_url = $this->master->getRow('scrape_products_url',['url' => $element->find('div.s-item__info a')[0]->href]);
                    if (empty($aleady_url)) {
                        $this->master->save('scrape_products_url',['url' => $element->find('div.s-item__info a')[0]->href,'brand' => $brnd_name]);    
                    }
                }
                $this->master->delete('scrape_store_links', 'id', $url->id); 
            }
            redirect(ADMIN . '/scraping/scrape/'.$id, 'refresh');
            exit;
        }
        else
            show_404();
        // exit('executed sexfully');
    }

    function save_pagination($id)
    {
        if ($store_row = $this->master->getRow('scraping',['id' => $id, 'scraped' => 0])) {
            $str = $this->fetch_request($store_row->link);
            $this->html->load($str);
            foreach($this->html->find('ol.ebayui-pagination__ol li a') as $element) {
                $url = $element->href == '#'?'https://www.ebay.co.uk/str/zaglays':$element->href;
                $page_row = $this->master->getRow('scrape_store_links',['url' => $url]);
                if ($page_row== "") {
                    if ($element->href == '#')
                        $this->master->save('scrape_store_links',['url' => 'https://www.ebay.co.uk/str/zaglays']);   
                    else
                        $this->master->save('scrape_store_links',['url' => $element->href]); 
                }
            }
            redirect(ADMIN . '/scraping/render-products-url/'.$id, 'refresh');
            exit;
        }
        else
            show_404();

        /*$this->html->clear(); 
        unset($this->html);*/
    }

    function fetch_request($url){
        $base = $url;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, $base);
        curl_setopt($curl, CURLOPT_REFERER, $base);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $str = curl_exec($curl);
        curl_close($curl);
        return $str;
    }

    /*** Products ***/

    public function products()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products/scraped_products';
        
        $this->data['rows'] = $this->master->getRows('scrape_products');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_product($id)
    {
        if ($this->data['row'] = $this->master->getRow("scrape_products", ['id' => $id])) {
        
            $this->data['enable_editor'] = TRUE;
            $this->data['pageView'] = ADMIN . '/products/scraped_products';
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
                $this->form_validation->set_rules('brand', 'Brand', 'required', array('required' => 'Please select a {field}'));
                $this->form_validation->set_rules('cat_id', 'Category', 'required|integer', array('required' => 'Please select a {field}'));
                $this->form_validation->set_rules('sub_cat_id', 'Sub-Category', 'required|integer', array('required' => 'Please select a {field}'));
                $this->form_validation->set_rules('material', 'Material', 'required', array('required' => 'Please select a {field}'));
                // $this->form_validation->set_rules('sub_cat_ids[]', 'Sub-Categories', 'required|integer', array('required' => 'Please select a {field}'));
                $this->form_validation->set_rules('default_price', 'Deault Price', 'required|numeric', array('numeric' => '{field} should be numeric'));

                $this->form_validation->set_rules('pcondition', 'Condition', 'required');
                // $this->form_validation->set_rules('pcondition', 'Condition', 'required|in_list[New,Used]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
                $this->form_validation->set_rules('status', 'Status', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
                $this->form_validation->set_rules('availability', 'Availability', 'required|integer|in_list[0,1]', array('required' => 'Please select a {field}', 'in_list' => 'Please select a valid {field}'));
                $this->form_validation->set_rules('colors[]', 'Colors', 'required', array('required' => 'Please select a {field}'));
                // $this->form_validation->set_rules('color_names[]', 'Color Names', 'required', array('required' => 'Please select a {field}'));
                $this->form_validation->set_rules('size[]', 'Size', 'required', array('required' => 'Please select a {field}'));
                $this->form_validation->set_rules('price[]', 'Price', 'required|numeric', array('numeric' => '{field} should be numeric'));
                // $this->form_validation->set_rules('qty[]', 'Quantity', 'required|integer', array('integer' => 'Please enter a {field}'));

                if($this->form_validation->run() === FALSE)
                    $res['msg'] = validation_errors();
                else {
                    $post = html_escape($this->input->post());
                    $save_data = array('title' => $post['title'], 'default_price' => $post['default_price'], 'pcondition' => $post['pcondition'], 'status' => $post['status'], 'availability' => $post['availability'], 'meta_description' => $post['meta_description'], 'meta_keywords' => $post['meta_keywords'], 'brand' => $post['brand'], 'material' => $post['material'], 'date' => date('Y-m-d H:i:s'));
                    // $save_data['collection_id'] = intval($post['collection_id']);
                    $save_data['cat_id'] = intval($post['cat_id']);
                    $save_data['sub_cat_id'] = intval($post['sub_cat_id']);
                    // $save_data['sub_cat_ids'] = @implode(',', $post['sub_cat_ids']);
                    // $save_data['colors'] = @implode(',', array_unique($post['colors']));

                    $save_data['detail'] =  preg_replace("/&#?[a-z0-9]{2,8};/i", "", strip_tags($this->input->post('detail'))) == '' ? '' : $this->input->post('detail');

                    if (($_FILES["image"]["name"] != "")) {
                        $image = upload_vfile('image');
                        if (!empty($image['file_name'])) {
                            $this->remove_file($this->data['row']->image);
                            $save_data['image'] = $image['file_name'];
                        } else {
                            $res['msg'] = showMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                            exit(json_encode($res));
                        }
                    } elseif(!empty($this->data['row']->image)) {
                        $save_data['image'] = save_external_image(get_site_image_src('scraped', $this->data['row']->image));
                        $this->remove_file($this->data['row']->image);
                    }

                    $product_id = $this->product_model->save($save_data);

                    foreach ($_FILES['upload_files']['name'] as $key => $file_name) {
                        $_FILES['image_file']['name'] = $file_name;
                        $_FILES['image_file']['type'] = $_FILES['upload_files']['type'][$key];
                        $_FILES['image_file']['tmp_name'] = $_FILES['upload_files']['tmp_name'][$key];
                        $_FILES['image_file']['error'] = $_FILES['upload_files']['error'][$key];
                        $_FILES['image_file']['size'] = $_FILES['upload_files']['size'][$key];
                        if($_FILES['image_file']['name'] != '') {
                            $image = upload_vfile('image_file');
                            if (!empty($image['file_name'])) {
                                $this->master->save('gallery', array('ref_id' => $product_id, 'ref_type' => 'product', 'image' => $image['file_name'], 'date' => date('Y-m-d H:i:s')));
                            } else {
                                
                                remove_vfile($save_data['image']);
                                remove_gellary_vfile($product_id, 'product');

                                $this->product_model->delete($product_id);

                                $res['msg'] = showMsg('success', 'Please upload a valid images file >> ' . strip_tags($image['error']));
                                exit(json_encode($res));
                            }
                        }
                    }

                    foreach ($post['dlt_images'] as $key => $dlt_img) {
                        $this->remove_file($dlt_img);
                        $this->master->delete_where('scrape_product_images', array('p_id' => $id, 'image' => $dlt_img));
                    }

                    $scraped_images = $this->master->getRows('scrape_product_images', ['p_id' => $id]);
                    foreach ($scraped_images as $key => $scrp_img) {
                        $save_image = save_external_image(get_site_image_src('scraped', $scrp_img->image));
                        $this->master->save('gallery', array('ref_id' => $product_id, 'ref_type' => 'product', 'image' => $save_image, 'date' => date('Y-m-d H:i:s')));

                        $this->remove_file($scrp_img->image);
                        $this->master->delete_where('scrape_product_images', array('p_id' => $id, 'image' => $scrp_img->image));
                    }

                    $this->master->delete('scrape_product_colors', 'p_id', $id);
                    foreach ($post['colors'] as $key => $color) {
                        $this->master->save('product_colors', ['p_id' => $product_id, 'color' => $color]);
                    }

                    $this->master->delete('scrape_product_sizes', 'p_id', $id);
                    foreach ($post['size'] as $key => $size) {
                        $this->master->save('product_sizes', ['p_id' => $product_id, 'size' => $size, 'price' => $post['price'][$key]/*, 'qty' => $post['qty'][$key]*/]);
                    }

                    $this->master->delete("scrape_products", 'id', $id);

                    $res['msg'] = showMsg('success', 'Product has been published successfully.');
                    $res['redirect_url'] = site_url(ADMIN . '/scraping/products');

                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                }
                exit(json_encode($res));
            }
            if ($this->data['row']) {
                $this->data['row']->images = $this->master->getRows('scrape_product_images', ['p_id' => $this->data['row']->id]);
                $this->data['row']->sizes = $this->master->getRows('scrape_product_sizes', ['p_id' => $id]);
                $this->data['row']->colors = $this->master->getRows('scrape_product_colors', ['p_id' => $id]);
            }

            $this->data['materials'] = $this->material_model->get_rows();
            $this->data['brands'] = $this->brand_model->get_rows();
            $this->data['cats'] = get_main_cats();
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }
        else
            show_404();
    }

    
    function delete_product($id)
    {
        has_access(10);
        if ($row = $this->master->getRow("scrape_products", ['id' => $id])) {
            $row->images = $this->master->getRows('scrape_product_images', ['p_id' => $row->id]);
            $this->remove_file($row->image);
            foreach ($row->images as $key => $img) {
                $this->remove_file($img->image);
                $this->master->delete("scrape_product_images", 'id', $img->id);
            }
            $this->master->delete("scrape_products", 'id', $id);
            setMsg('success', 'Scraped Product has been deleted successfully.');
            redirect(ADMIN . '/scraping/products', 'refresh');
            exit;
        }
        else
            show_404();
    }

    private function remove_file($image, $type = 'scraped')
    {
        $filepath = UPLOAD_PATH . "/{$type}/" . $image;
        if (is_file($filepath))
            unlink($filepath);
        return;
    }
}

?>