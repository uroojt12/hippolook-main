<?php

$CI = &get_instance();

function format_name($fname, $lname)
{
    return ucwords($fname . ' ' . $lname);
    // return ucwords($fname.' '.substr($lname, 0,1).'.');
}


function get_gallery_images($ref_id, $ref_type = 'product', $main = 0, $admin = 0)
{
    $CI = &get_instance();
    return $CI->master->getRows('gallery', array('ref_id' => $ref_id, 'ref_type' => $ref_type, 'main' => $main, 'admin' => $admin));
}

/*** start notifications ***/
function save_notificaiton($mem_id, $from_id, $txt, $link = '', $cat = 'other', $note_id = 0, $status = 'new')
{
    global $CI;

    $link = empty($link) ? site_url('notifications') : $link;
    $noti_id = $CI->master->save('notifications', array('mem_id' => $mem_id, 'from_id' => $from_id, 'txt' => $txt, 'link' => $link, 'cat' => $cat, 'note_id' => $note_id, 'status' => $status, 'date' => date("Y-m-d H:i:s")));
    $encoded_id = doEncode('nti-' . $noti_id);
    $CI->master->save('notifications', array('encoded_id' => $encoded_id), 'id', $noti_id);
}

function mark_seen_notifications()
{
    global $CI;
    $CI->master->save('notifications', array('status' => 'seen'), 'mem_id', $CI->session->mem_id);
}

function count_new_header_notis()
{
    global $CI;
    $CI->db->select("count(id) as total");
    $CI->db->where('mem_id', $CI->session->mem_id);
    $CI->db->where("status", 'new');
    $query = $CI->db->get('notifications');
    return intval($query->row()->total);
}

function get_header_notis($limit = '', $order_by = 'desc')
{
    global $CI;
    $CI->db->select("n.*, concat(mem_fname, ' ', mem_lname) as mem_name, mem_image, mem_type");
    $CI->db->from('notifications n');
    $CI->db->join('members m', 'n.from_id = m.mem_id', 'left');

    $CI->db->where("n.mem_id", $CI->session->mem_id);

    if (!empty($order_by))
        $CI->db->order_by("n.id", $order_by);
    if (!empty($limit))
        $CI->db->limit($limit);

    return $CI->db->get()->result();
}
/*** end notifications ***/

function count_new_msgs()
{
    global $CI;
    $query = $CI->db->query("SELECT * FROM `tbl_chat_msgs` where status='new' and sender_id<>{$CI->session->mem_id} and chat_id in(select id from `tbl_chat` where mem_one={$CI->session->mem_id} or mem_two={$CI->session->mem_id})");
    return intval($query->num_rows());
}

function get_header_msgs($limit = '', $order_by = 'desc')
{
    global $CI;
    $CI->db->select('c.*, cm.*, m.mem_id, m.mem_image, m.mem_fname, m.mem_lname');
    $CI->db->from('chat c');
    $CI->db->join('members m', 'm.mem_id = c.mem_one or m.mem_id = c.mem_two');
    $CI->db->join('(select MAX(id) as m_id, chat_id from tbl_chat_msgs GROUP BY chat_id) m_max', 'm_max.chat_id=c.id');
    $CI->db->join('chat_msgs cm', 'cm.id = m_max.m_id');
    $CI->db->where('m.mem_id<>', $CI->session->mem_id);
    $CI->db->group_start();
    $CI->db->where('c.mem_one', $CI->session->mem_id);
    $CI->db->or_where('c.mem_two', $CI->session->mem_id);
    $CI->db->group_end();

    if (!empty($order_by))
        $CI->db->order_by("c.time", $order_by);
    if (!empty($limit))
        $CI->db->limit($limit);

    return $CI->db->get()->result();
}

function get_mem_row($mem_id)
{
    global $CI;
    $CI = get_instance();
    return $CI->master->getRow('members', array('mem_id' => $mem_id));
}

function get_mem_image($mem_id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('members', array('mem_id' => $mem_id));
    return $row->mem_image;
}

function get_mem_name($mem_id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('members', array('mem_id' => $mem_id));
    return ucwords($row->mem_fname . ' ' . $row->mem_lname);
}

function get_mem_type($mem_id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('members', array('mem_id' => $mem_id));
    return $row->mem_type;
}

function is_followed($mem_id)
{
    $CI = get_instance();
    if ($CI->master->getRow('followers', array('follower_id' => $CI->session->mem_id, 'mem_id' => $mem_id)))
        return '<i class="fa fa-check"></i> Following';
    else
        return 'Follow';
}

function is_subscribed($mem_id, $ref_id, $ref_type, $is_main = true)
{
    $CI = get_instance();
    if ($CI->master->getRow('subscribers', array('mem_id' => $mem_id, 'ref_id' => $ref_id, 'ref_type' => $ref_type)))
        return $is_main ? '<i class="fa fa-check"></i> Subscribed' : '<i class="fa fa-check"></i>';
    else
        return $is_main ? 'Subscribe' : '<i class="fas fa-plus"></i>';
}

function total_favorites($ref_id, $ref_type)
{
    $CI = get_instance();
    $CI->db->where('ref_id', $ref_id);
    $CI->db->where('ref_type', $ref_type);
    $query = $CI->db->get('favorites');
    return short_number_format(intval($query->num_rows()));
}

function favorite_btn($ref_id, $ref_type, $total = 0)
{
    $CI = get_instance();
    if ($CI->session->mem_id && $CI->session->mem_type && $CI->session->mem_id > 0) {

        if ($CI->master->getRow('favorites', array('mem_id' => $CI->session->mem_id, 'ref_id' => $ref_id, 'ref_type' => $ref_type)))
            return '<a href="javascript:void(0)" class="likeBtn liked lkBtn" data-id="' . doEncode('favorite' . $ref_type . '-' . $ref_id) . '" data-store="' . doEncode($ref_type . '-' . $ref_id) . '"></a>';
        // return '<a href="javascript:void(0)" class="lkBtn active" data-id="'. doEncode('favorite'.$ref_type.'-'.$ref_id).'" data-store="'.doEncode($ref_type.'-'.$ref_id).'"><i class="fi-heart"></i><span>'.$total.'</span></a>';
        else
            return '<a href="javascript:void(0)" class="likeBtn lkBtn" data-id="' . doEncode('favorite' . $ref_type . '-' . $ref_id) . '" data-store="' . doEncode($ref_type . '-' . $ref_id) . '"></a>';

        // return '<a href="javascript:void(0)" class="lkBtn" data-id="'. doEncode('favorite'.$ref_type.'-'.$ref_id).'" data-store="'.doEncode($ref_type.'-'.$ref_id).'"><i class="fi-heart"></i><span>'.$total.'</span></a>';
    } else {
        return '<a href="javascript:void(0)" class="likeBtn"></a>';
        // return '<a href="javascript:void(0)"><i class="fi-heart"></i><span>'.$total.'</span></a>';
    }
}

/*
function get_categories($parent_id = '', $id = '', $limit = 0)
{
    global $CI;
    $CI = get_instance();
    if ($parent_id!=='')
        $CI->db->where('cat_parent', $parent_id);
    if (!empty($id))
        $CI->db->where('cat_id', $id);
    if ($limit>0)
        $CI->db->limit($limit);

    $query = $CI->db->get('categories');
    return $query->result();
}
*/

function get_categories($type = 'comic', $offset = '')
{
    global $CI;
    $CI = get_instance();
    $CI->db->where('type', $type);
    if (!empty($offset))
        $CI->db->limit($offset);
    $query = $CI->db->get('categories');
    return $query->result();
}

function get_bcat_name($id)
{
    global $CI;
    $row = $CI->master->getRow('blog_categories', array('id' => $id));
    return $row->title;
}

function get_cat_name($id)
{
    global $CI;
    $row = $CI->master->getRow('categories', array('id' => $id));
    return $row->name;
}

function get_cat_slug_id($slug)
{
    global $CI;
    $row = $CI->master->getRow('categories', array('slug' => $slug));
    return $row->id;
}

function profileComplete($row)
{
    $complete = 0;
    if (!empty($row->mem_email) && !empty($row->mem_fname) && !empty($row->mem_pswd) && !empty($row->mem_address1) && !empty($row->mem_phone) && !empty($row->mem_image) && !empty($row->mem_about)) {
        $complete = 1;
    }
    return $complete;
}

function shorString($url)
{
    if (strlen($url) >= 20) {
        return substr($url, 0, 15) . " ... " . substr($url, -4);
    } else {
        return $url;
    }
}
function url_text($url)
{
    $not_allowed = array(' ', '/', '$', '\'', '"', '.');
    $url = trim(str_replace($not_allowed, '-', strtolower($url)), '-');
    return strlen($url) >= 70 ? substr($url, 0, 70) : $url;
}

function getSiteText($type, $key, $column = 'value')
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('site_texts', array('txt_type' => $type, 'txt_key' => $key));
    $column = 'txt_' . $column;
    return $row->$column;
}

function get_countries_options($type, $selected = '')
{
    global $CI;
    $options = "";
    $rows = $CI->master->getRows("countries", array());
    foreach ($rows as $key => $row) {
        $options .= '<option value="' . $row->{$type} . '"' . ($selected != '' && ($selected == $row->id || $selected == $row->short_code || $selected == $row->name) ? ' selected' : '') . '>' . $row->name . '</option>';
    }
    return $options;
}

function get_country_name($key, $type = 'id', $default_text = "N/A")
{
    global $CI;
    $arr = $CI->master->getRow("countries", array($type => $key));
    if ($arr) {
        return $arr->name;
    } else {
        return $default_text;
    }
}

function get_states_options($type, $selected = '', $status = NULL)
{
    global $CI;
    $options = "";
    $contition = array();
    if (!is_null($status))
        $contition['status'] = $status;
    $rows = $CI->master->getRows("states", $contition);
    foreach ($rows as $key => $row) {
        $options .= '<option value="' . $row->{$type} . '"' . ($selected != '' && ($selected == $row->id || $selected == $row->code || $selected == $row->name) ? ' selected' : '') . '>' . $row->name . ' - ' . $row->code . '</option>';
    }
    return $options;
}
function get_state_name($key, $type = 'id', $default_text = "N/A")
{
    global $CI;
    $arr = $CI->master->getRow("states", array($type => $key));
    if ($arr) {
        return $arr->name;
    } else {
        return $default_text;
    }
}

function applyHTTP($url)
{
    if ((substr($url, 0, 3) == "www")) {
        return $httpUrl = "http://" . $url;
    }
    return $url;
}

function getPref($key, $field)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('preferences', array('pref_key' => $key));
    return $row->{$field};
}


/*** comments ***/
function get_comments($ref_id, $ref_type, $parent_id = 0, $start = '', $offset = '', $order_by = 'desc')
{
    global $CI;
    $CI->db->select("c.*,concat(mem_fname,' ',mem_lname) as mem_name,mem_image,(select count(*) FROM `tbl_favorites` where ref_id=c.id and ref_type='comment') total_likes");
    $CI->db->from('comments c');
    $CI->db->join('members m', 'c.mem_id=m.mem_id');
    $CI->db->where('c.ref_id', $ref_id);
    $CI->db->where('c.ref_type', $ref_type);
    $CI->db->where('c.status', 1);

    // if (!empty($parent_id))
    $CI->db->where('c.parent_id', $parent_id);
    if (!empty($order_by))
        $CI->db->order_by("c.id", $order_by);
    if (!empty($offset)) {
        $CI->db->limit($offset, $start);
    }
    $query = $CI->db->get();
    return $query->result();
}

/** reviews **/
function get_reviews($ref_id, $ref_type = 'product', $start = '', $offset = '', $order_by = 'desc', $field = 'r.date')
{
    $CI = get_instance();
    $CI->db->select("r.*, mem_image, concat(mem_fname, ' ', mem_lname) as mem_name")
        ->from('reviews r')
        ->join('members mem', 'mem.mem_id=r.from_id')
        ->where('ref_id', $ref_id)
        ->where('r.ref_type', $ref_type)
        ->where('r.parent_id', NULL);

    if (!empty($order_by))
        $CI->db->order_by($field, $order_by);
    if (!empty($offset))
        $CI->db->limit($offset, $start);

    $query = $CI->db->get();
    return $query->result();
}

function count_reviews($ref_id, $ref_type = 'product')
{
    $CI = get_instance();
    $CI->db->select('count(*) as total');
    $CI->db->where('ref_id', $ref_id);
    $CI->db->where('ref_type', $ref_type);
    $CI->db->where('parent_id', NULL);
    $query = $CI->db->get('reviews');
    $total = $query->row()->total;
    return intval($total);
}

function get_avg_rating($ref_id, $ref_type = 'product')
{
    $CI = get_instance();
    $CI->db->select('AVG(rating) as total')
        ->where('ref_id', $ref_id)
        ->where('ref_type', $ref_type)
        ->where('parent_id', NULL);
    $query = $CI->db->get('reviews');
    $total = $query->row()->total;
    return round(floatval($total), 1);
}

function get_mem_reviews($mem_id, $start = '', $offset = '', $order_by = 'desc', $field = 'r.date')
{
    $CI = get_instance();
    $CI->db->select("r.*, mem_image, concat(mem_fname, ' ', mem_lname) as mem_name")
        ->from('reviews r')
        ->join('members mem', 'mem.mem_id=r.from_id')
        ->where('r.mem_id', $mem_id)
        ->where('r.parent_id', NULL);

    if (!empty($order_by))
        $CI->db->order_by($field, $order_by);
    if (!empty($offset))
        $CI->db->limit($offset, $start);

    $query = $CI->db->get();
    return $query->result();
}

function count_mem_reviews($mem_id)
{
    $CI = get_instance();
    $CI->db->select('count(*) as total')
        ->where('mem_id', $mem_id)
        ->where('parent_id', NULL);
    $query = $CI->db->get('reviews');
    $total = $query->row()->total;
    return intval($total);
}

function get_avg_mem_rating($mem_id)
{
    $CI = get_instance();
    $CI->db->select('AVG(rating) as total')
        ->where('mem_id', $mem_id)
        ->where('parent_id', NULL);
    $query = $CI->db->get('reviews');
    $total = $query->row()->total;
    return round(floatval($total), 1);
}

function get_mem_rating($mem_id, $ref_id, $ref_type = 'product')
{
    $CI = get_instance();
    $CI->db->select('*')
        ->where('from_id', $mem_id)
        ->where('ref_id', $ref_id)
        ->where('ref_type', $ref_type);
    return $CI->db->get('reviews')->row();
}

function get_mem_review($mem_id, $ref_id, $ref_type = 'product')
{
    $CI = get_instance();
    $CI->db->select("r.*, mem_image, concat(mem_fname,' ',mem_lname) as mem_name")
        ->from('reviews r')
        ->join('members mem', 'mem.mem_id = r.from_id')
        ->where('r.from_id', $mem_id)
        ->where('r.ref_id', $ref_id)
        ->where('r.ref_type', $ref_type)
        ->where('r.parent_id', NULL);
    return $CI->db->get()->row();
}
function get_reply($parent_id)
{
    $CI = get_instance();
    $CI->db->select("r.*, mem_image, concat(mem_fname, ' ', mem_lname) as mem_name")
        ->from('reviews r')
        ->join('members mem', 'mem.mem_id=r.from_id')
        ->where('r.parent_id', $parent_id);
    return $CI->db->get()->row();
}
