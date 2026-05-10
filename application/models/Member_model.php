<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]

class Member_model extends CRUD_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = "members";
        $this->field = "mem_id";
    }

    function getMember($mem_id, $where = '')
    {
        if(!empty($where))
            $this->db->where($where);
        $this->db->where('mem_id', $mem_id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function getMembers($where = '', $start = '', $offset = '', $order_by = '')
    {
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by("mem_id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_members_by_order($where = '', $start = '', $offset = '', $order_field = 'mem_id', $order_by = '')
    {
        $this->db->select("*, (SELECT AVG(rating) FROM `tbl_reviews` `r` WHERE `r`.`mem_id`=`tbl_members`.`mem_id`) as rating");
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by($order_field, $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_active_members()
    {
        $this->db->where(array('mem_status' => 1, 'mem_verified' => 1));
        $this->db->order_by("mem_id", $order_by);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }


    function get_sitter($mem_id)
    {
        $this->db->where(array('mem_status' => 1, 'mem_verified' => 1, 'mem_sitter_verified' => 1, 'mem_type' => 'sitter', 'mem_pkg_status' => '1', 'mem_phone_verified' => '1', 'mem_deactivate' => '0'));
        $this->db->where("mem_id", $mem_id);

        $query = $this->db->get($this->table_name);
        return $query->row();
    }
    
    /*
    function delete($mem_id)
    {
        $this->db->where('mem_id', $mem_id);
        $this->db->delete($this->table_name);
    }
    
    function save($vals, $mem_id = '')
    {
        $this->db->set($vals);
        if ($mem_id != '') {
            $this->db->where('mem_id', $mem_id);
            $this->db->update($this->table_name);
            return $mem_id;
        } else {
            $this->db->insert($this->table_name);
            //return $this->db->last_query(); 
            return $this->db->insert_id();
        }
    }
    */
    
    function oldPswdCheck($mem_id, $mem_pswd)
    {
        $mem_pswd = doEncode($mem_pswd);
        $this->db->where('mem_id', $mem_id);
        $this->db->where('mem_pswd', $mem_pswd);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function isnt_sitter_available($sitter_id, $service_id, $start_date, $end_date)
    {
        
        if ($this->fetch_row("SELECT COUNT(*) as total FROM `tbl_bookings` where sitter_id=$sitter_id AND service_id=$service_id AND start_date>='$start_date' AND start_date<='$end_date' AND status in(1, 2) AND canceled=0 AND completed=0 HAVING total>=2") || $this->fetch_row("SELECT SUM((CHAR_LENGTH(pets) - CHAR_LENGTH(REPLACE(pets, ',', '')) + 1)) as total FROM tbl_bookings where sitter_id=$sitter_id AND service_id=$service_id AND start_date>='$start_date' AND start_date<='$end_date' AND status in(1, 2) AND canceled=0 AND completed=0 GROUP by sitter_id HAVING total>=4"))
            return true;
        else
            return false;
    }

    function search_members($post)
    {

        // $this->db->select('mem.*, ms.price, s.price_label, (SELECT AVG(rating) FROM `tbl_reviews` where `tbl_reviews`.mem_id = mem.mem_id and parent_id is NULL) as mem_avg_rating');
        $this->db->from($this->table_name.' mem');
        $this->db->join('mem_services ms', "ms.mem_id = mem.mem_id");
        $this->db->join('services s', "s.id = ms.service_id");
        $this->db->where('ms.service_id', $post['service']);

        if (!empty($post['price'])) {
            $ary = @explode(';', $post['price']);
            $min_price = floatval(trim($ary[0]));
            $max_price = floatval(trim($ary[1]));
            $this->db->where("( ms.price >= $min_price  AND ms.price <= $max_price ) ", null, false);
        }
        
        /*
        if (isset($keywords['gender']) && count($keywords['gender']) > 0) {
            $genders = $keywords['gender'];

            foreach ($genders as $gen) {
                $where_type[] = " (gender LIKE '%$gen%')";
            }
            if (count($where_type) > 0) {
                $where_type_string = @implode(' OR ', $where_type);
            }
            $this->db->where(" ( " . $where_type_string . " ) ", null, false);
        }

        if (isset($keywords['gender']) && count($keywords['gender']) > 0) {
            $genders = $keywords['gender'];

            foreach ($genders as $gen) {
                $where_type[] = " (p.gender LIKE '%$gen%')";
            }
            if (count($where_type) > 0) {
                $where_type_string = @implode(' OR ', $where_type);
            }
            $this->db->where(" ( " . $where_type_string . " ) ", null, false);
        }

        if (isset($keywords['cat']) && count($keywords['cat']) > 0) {
            $cats = $keywords['cat'];

            foreach ($cats as $ct) {
                $where_type[] = " (p.cat_id = '$ct')";
            }
            if (count($where_type) > 0) {
                $where_type_string = @implode(' OR ', $where_type);
            }
            $this->db->where(" ( " . $where_type_string . " ) ", null, false);
        }

        $todate = date('Y-m-d');
        $this->db->where("`mem_id` NOT IN (SELECT mem_id FROM  `tbl_vacation_mods` WHERE vm_status =  '0' AND vm_startdate <=  '$todate' AND vm_enddate >=  '$todate' GROUP BY mem_id)", NULL, FALSE);
        
        */

        $this->db->where('mem.mem_type', 'sitter');
        $this->db->where('mem.mem_verified', 1);
        $this->db->where('mem.mem_status', 1);
        $this->db->where('mem.mem_phone_verified', 1);
        $this->db->where('mem.mem_sitter_verified', 1);
        $this->db->where('mem.mem_deactivate', 0);
        $this->db->where('mem.mem_pkg_status', 1);
        $this->db->where('mem.mem_vacation_mode', 0);

        if (!empty($post['city']) && false)
            $this->db->like('mem.mem_city', substr($post['city'],0 , strpos($post['city'], ',')));

        if (!empty($post['dog_size']))
            $this->db->where("FIND_IN_SET('".$post['dog_size']."', mem.mem_host_dog_size) >0");
            // $this->db->where("FIND_IN_SET('".$post['dog_size']."', ms.dog_size) >0");
        if (!empty($post['cat']))
            $this->db->where('ms.accept_cat', 1);
        /*
        if (!empty($post['dog_size']))
            $this->db->where('ms.dog_size', $post['dog_size']);
        */
        if (!empty($post['pets'])){
            if ($post['pets']=='3+')
                $this->db->where('ms.available_spaces>=', 3);
            else
                $this->db->where('ms.available_spaces', $post['pets']);
        }
        
        if(!empty($post['children']) && count($post['children']) > 0 && $post['children'][0] != '')
            $this->db->where_in('mem.mem_children', $post['children']);
        if(!empty($post['has_home']))
            $this->db->where('mem.mem_home_type', 'House');
        if(!empty($post['has_fenced_yard']))
            $this->db->where('mem.mem_have_yard', 'Fenced');
        if(!empty($post['allow_furniture']))
            $this->db->where('mem.mem_allow_furniture', 1);
        if(!empty($post['allow_bed']))
            $this->db->where('mem.mem_allow_bed', 1);
        if(!empty($post['non_smoke_house']))
            $this->db->where('mem.mem_non_smoke_house', 1);

        if(!empty($post['not_dog']))
            $this->db->where('mem.mem_own_dog', 0);
        if(!empty($post['not_cat']))
            $this->db->where('mem.mem_own_cat', 0);
        if(!empty($post['one_client']))
            $this->db->where('mem.mem_one_client', 1);
        if(!empty($post['caged_pet']))
            $this->db->where('mem.mem_caged_pet', 1);

        if(!empty($post['first_aid_certified']))
            $this->db->where('mem.mem_dog_first_aid', 1);
        if(!empty($post['pfsc_member']))
            $this->db->where('mem.mem_membership_pref', 1);
        /*
        if(!empty($post['apse_member']))
            $this->db->where('mem.mem_has_apse_member', 1);
        if(!empty($post['petsit_member']))
            $this->db->where('mem.mem_has_petsit_member', 1);
        if(!empty($post['volunteer_member']))
            $this->db->where('mem.mem_has_volunteer_member', 1);
        

        if (!empty($post['zip'])){
            $coordinates = get_location_detail($post['zip']);
            $post['lat'] = $coordinates->Latitude;
            $post['lng'] = $coordinates->Longitude;
        }

        if (!empty($post['subject'])){

            $this->db->join('sitter_subjects tsub', "tsub.mem_id = mem.mem_id");

            $this->db->group_start()
            ->where("subject_id in(select id from tbl_subjects where name like '".$this->db->escape_like_str($post['subject'])."%')")
            ->or_like('mem.mem_major_subject', $post['subject'], 'both')
            ->group_end();
        }
        */

        
        if (!empty($post['lat']) && !empty($post['lng'])) {
            $d = intval($post['distance']);
            $this->db->select("mem.*, ms.price, s.price_label, (69.0 * DEGREES(ACOS(COS(RADIANS({$post['lat']}))
                      * COS(RADIANS(mem.mem_map_lat))
                      * COS(RADIANS({$post['lng']}) - RADIANS(mem.mem_map_lng))
                        + SIN(RADIANS({$post['lat']}))
                      * SIN(RADIANS(mem.mem_map_lat))))) AS distance, (SELECT AVG(rating) FROM `tbl_reviews` where `tbl_reviews`.mem_id=mem.mem_id and parent_id is NULL) as mem_avg_rating
                        ");
            $this->db->having('mem.mem_travel_radius>=distance');
            $this->db->having('distance<=',  20);


        }
        else
            $this->db->select('mem.*, ms.price, s.price_label, (SELECT AVG(rating) FROM `tbl_reviews` where `tbl_reviews`.mem_id=mem.mem_id and parent_id is NULL) as mem_avg_rating');

        if (!empty($post['start_rating']) && floatval($post['start_rating']) > 0)
            $this->db->having('mem_avg_rating>=',  floatval($post['start_rating']));

        if (!empty($post['day']) || count($post['days']) > 0) {
            $this->db->join('sitter_timings tt', "tt.mem_id = mem.mem_id and tt.available=1");
            if(count($post['days']) > 0 && $post['days'][0]!='')
                $this->db->where_in('tt.day', $post['days']);
        }

        if (!empty($post['dropoff_date']) && !empty($post['pickup_date'])) {

            // $this->db->where("ms.mem_id NOT in(SELECT sitter_id FROM tbl_bookings where start_date>='{$post['dropoff_date']}' and start_date<='{$post['pickup_date']}' and status=2 and canceled=0 and completed=0)", null, false);

            $this->db->where("ms.mem_id NOT in(SELECT sitter_id FROM tbl_bookings where start_date>='{$post['dropoff_date']}' and start_date<='{$post['pickup_date']}' and status in(1, 2) and canceled=0 and completed=0 and service_id={$post['service']} GROUP by sitter_id HAVING SUM((CHAR_LENGTH(pets) - CHAR_LENGTH(REPLACE(pets, ',', '')) + 1))>=4 UNION SELECT sitter_id FROM tbl_bookings where start_date>='{$post['dropoff_date']}' and start_date<='{$post['pickup_date']}' and status in(1, 2) and canceled=0 and completed=0 and service_id={$post['service']} GROUP by sitter_id HAVING COUNT(*)>=2)", null, false);
        }


        /*
        if (!empty($post['sort']) && in_array($post['sort'], array('asc','desc'))) 
            $this->db->order_by('mem.mem_hourly_rate', $post['sort']);
        */
        
        $this->db->group_by('mem.mem_id');
        $this->db->order_by('mem.mem_membership_pref, mem_avg_rating', 'desc');

        $query = $this->db->get();
        // print_query();
        $rows = array();
        foreach ($query->result() as $key => $row) {
            $rows[$key]=$row;
            // $rows[$key]->total_favorites=$this->total_favorites($row->id);
        }
        return $rows;
    }


    function changeStatus($mem_id)
    {
        $this->db->where('mem_id', $mem_id);
        $query = $this->db->get($this->table_name);
        $rs = $query->row();

        if ($rs->mem_status == '0')
            $vals['mem_status'] = '1';
        else
            $vals['mem_status'] = '0';
        $this->db->set($vals);
        $this->db->where('mem_id', $mem_id);
        $this->db->update($this->table_name);
        return $vals['mem_status'];
    }


    function emailExists($mem_email, $mem_id = 0)
    {
        $this->db->where('mem_email', $mem_email);
        $this->db->where('mem_id <> ' . $mem_id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function phoneExists($mem_phone, $mem_id = 0)
    {
        $this->db->where('mem_phone', $mem_phone);
        $this->db->where('mem_id <> ' . $mem_id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function forgotEmailExists($mem_email)
    {
        $this->db->where('mem_email', $mem_email);
        $this->db->where('mem_status', '1');
        $this->db->where('mem_verified', '1');
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function memberExists($mem_keyword)
    {
        $this->db->where('mem_email', $mem_keyword);
        $this->db->or_where('mem_username', $mem_keyword);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function usernameExists($mem_username)
    {
        $this->db->where('mem_username', $mem_username);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function ipExists($mem_id, $mem_ip)
    {
        if (!empty($mem_ip)) {
            $this->db->where("mem_id <> " . $mem_id);
            $this->db->where('mem_ip', $mem_ip);
            $query = $this->db->get($this->table_name);
            if ($query->row())
                return true;
        }
        return false;
    }

    function socialIdExists($mem_type, $mem_id)
    {
        $this->db->where('mem_social_type', $mem_type);
        $this->db->where('mem_social_id', $mem_id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function getMemCode($mem_code, $mem_id = 0)
    {
        if($mem_id>0)
            $this->db->where('mem_id', $mem_id);
        $this->db->where('mem_code', $mem_code);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function authenticate($mem_email, $mem_pswd, $mem_type = NULL)
    {
        $mem_pswd = doEncode($mem_pswd);
        if (!empty($mem_type))
            $this->db->where('mem_type', $mem_type);

        $this->db->where('mem_email', $mem_email);
        $this->db->where('mem_pswd', $mem_pswd);
        // $this->db->where('mem_status', '1');
        $query = $this->db->get($this->table_name);
        // return $this->db->last_query();
        return $query->row();
    }

    function update_last_login($id, $token = '')
    {
        /*$this->db->where('mem_id', $id);
        $query = $this->db->get($this->table_name);
        $rs = $query->row();*/

        // $this->session->set_userdata('last_login',array('ip'=>$rs->site_ip,'time_date'=>$rs->site_lastlogindate));

        // $vals['mem_ip'] = $_SERVER["REMOTE_ADDR"];
        if(!empty($token))
            $vals['mem_remember'] = $token;

        $vals['mem_token'] = $this->session->session_id;
        $vals['mem_last_login'] = date('Y-m-d h:i:s');
        $this->save($vals, $id);
    }

    function get_max_rate()
    {
        $this->db->select_max('price');
        $query = $this->db->get('mem_services');
        return floatval($query->row()->mem_services);
    }

    function get_max_distance()
    {
        $this->db->select_max('mem_travel_radius');
        $query = $this->db->get($this->table_name);
        return floatval($query->row()->mem_travel_radius);
    }

    /*** Members ***/

    function get_reported_profiles()
    {
        $this->db->select();
        $this->db->from($this->table_name.' mem');
        $this->db->join('reports r', "r.profile_id = mem.mem_id");
        return $this->db->get()->result();
    }
}
?>

