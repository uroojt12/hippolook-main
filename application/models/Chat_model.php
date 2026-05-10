<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]

class Chat_model extends CRUD_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'chat';
        $this->field = "id";
    }

    /*** start admin chat management ***/
    
    function get_chats()
    {
        $this->db->order_by('time', 'desc');
        $query = $this->db->get($this->table_name);
        $rows = array();
        foreach ($query->result() as $index => $row) {
            $row->msg_row = $this->get_last_msg($row->id);
            $rows[$index] = $row;
        }
        return $rows;
    }


    function get_chat_detail($chat_id)
    {
        $this->db->where('chat_id', $chat_id);
        $query = $this->db->get('chat_msgs');

        $rows = array();
        foreach ($query->result() as $index => $row) {
            $row->attachments = $this->get_attachments($row->id);
            if($row->msg_type == 'lesson')
                $row->lesson = $this->get_admin_chat_lesson($row->id);
            $rows[$index]=$row;
        }
        return $rows;
    }

    function get_admin_chat_lesson($msg_id)
    {
        $this->db->where('msg_id', $msg_id);
        $this->db->limit(1);
        $query = $this->db->get('chat_lessons');
        return $query->row();
    }

    /*** end admin chat management ***/

    function have_chat($mem_id)
    {
        $this->db->group_start()
        ->where('mem_one', $mem_id)
        ->where('mem_two', $this->session->mem_id)
        ->group_end();

        $this->db->or_group_start()
        ->where('mem_one', $this->session->mem_id)
        ->where('mem_two', $mem_id)
        ->group_end();

        $query = $this->db->get($this->table_name);
        // die($this->db->last_query());
        return $query->row();

    }

    function get_last_msg($chat_id)
    {
        $this->db->where('chat_id', $chat_id);
        $this->db->order_by("id", 'desc');
        $this->db->limit(1);
        $query = $this->db->get('chat_msgs');
        /*
            $row = $query->row();
            if($row)
                $row->attachments = $this->get_attachments($row->id);
            return $row;
        */
        return $query->row();
    }

    function get_mem_msgs_list($mem_id)
    {
        $this->db->select('c.*, cm.*, m.mem_id, m.mem_image, m.mem_fname, m.mem_lname');
        $this->db->from($this->table_name.' c');
        $this->db->join('members m', 'm.mem_id = c.mem_one or m.mem_id = c.mem_two');
        $this->db->join('(select MAX(id) as m_id, chat_id from tbl_chat_msgs GROUP BY chat_id) m_max', 'm_max.chat_id = c.id');
        $this->db->join('chat_msgs cm', 'cm.id = m_max.m_id');
        $this->db->where('m.mem_id<>', $mem_id);
        $this->db->group_start();
        $this->db->where('c.mem_one', $mem_id);
        $this->db->where('m.mem_deactivate', 0);
        $this->db->or_where('c.mem_two', $mem_id);
        $this->db->group_end();
        $this->db->order_by("c.time", 'desc');
        $query = $this->db->get();
        // print_query();
        return $query->result();

        $rows = array();
        foreach ($query->result() as $index => $row) {
            $row->msg_row = $this->get_last_msg($row->id);
            $rows[$index] = $row;
        }
        return $rows;
    }
/*
    function get_mem_msgs_list($mem_id)
    {

        $this->db->where('mem_one', $mem_id);
        $this->db->or_where('mem_two', $mem_id);
        $this->db->order_by("time", 'desc');
        $query = $this->db->get($this->table_name);
        // die($this->db->last_query());
        $rows = array();
        foreach ($query->result() as $index => $row) {
            $row->msg_row = $this->get_last_msg($row->id);
            $rows[$index] = $row;
        }
        return $rows;
    }*/

    /*** start msgs ***/

    function get_chat_msgs($chat_id)
    {
        $this->db->where('chat_id', $chat_id);
        $this->db->where("FIND_IN_SET({$this->session->mem_id},no_deleted)>", 0);
        $query = $this->db->get('chat_msgs');
        // print_query();
        $rows = array();
        foreach ($query->result() as $index => $row) {
            $row->attachments = $this->get_attachments($row->id);
            $rows[$index] = $row;
        }
        return $rows;
    }

    function save_msg($vals, $id = '')
    {
        $this->db->set($vals);
        if ($id != '') {
            $this->db->where('id', $id);
            $this->db->update('chat_msgs');
            return $id;
        } else {
            $this->db->insert('chat_msgs');
            return $this->db->insert_id();
        }
    }

    function delete_msg($id)
    {
        $this->db->where('id', $id);
        $this->db->where("FIND_IN_SET({$this->session->mem_id}, no_deleted)>", 0);
        $query = $this->db->get('chat_msgs');
        $row = $query->row();

        if($row){
            $arr = explode(',', $row->no_deleted);
            $arr = array_diff($arr, array($this->session->mem_id));
            $deleted_string = implode('', $arr);

            $this->db->set('no_deleted', $deleted_string);
            $this->db->where('id', $id);
            $this->db->where("FIND_IN_SET({$this->session->mem_id}, no_deleted)>", 0);
            $this->db->update('chat_msgs');
            return true;
        }
        return false;
    }

    /*** start attachment ***/

    function get_attachments($msg_id)
    {
        $this->db->where('msg_id', $msg_id);
        $query = $this->db->get('chat_attachments');
        return $query->result();
    }

    function save_attachment($vals, $id = '')
    {
        $this->db->set($vals);
        if ($id != '') {
            $this->db->where('id', $id);
            $this->db->update('chat_attachments');
            return $id;
        } else {
            $this->db->insert('chat_attachments');
            return $this->db->insert_id();
        }
    }

    /*** end attachment ***/


    /*** start noti msg ***/

    function get_chat_lesson($msg_id, $mem_id)
    {
        $this->db->where('msg_id', $msg_id);
        $this->db->where('mem_id', $mem_id);
        $query = $this->db->get('chat_lessons');
        return $query->row();
    }

    function save_chat_lesson($vals, $id = '')
    {
        $this->db->set($vals);
        if ($id != '') {
            $this->db->where('id', $id);
            $this->db->update('chat_lessons');
            return $id;
        } else {
            $this->db->insert('chat_lessons');
            return $this->db->insert_id();
        }
    }

    /*** end noti msg ***/

    function is_sitter_first_msg($chat_id)
    {
        $this->db->where('sender_id', $this->session->mem_id);
        $this->db->where('chat_id', $chat_id);
        $query = $this->db->get('chat_msgs');
        return intval($query->num_rows()) > 0 ? false : true;
    }

    function get_first_msg_time($chat_id)
    {
        $this->db->select("MIN(time) as time");
        $this->db->where('sender_id<>', $this->session->mem_id);
        $this->db->where('chat_id', $chat_id);
        return  $this->db->get('chat_msgs')->row()->time;
    }

    function get_new_msgs($chat_id)
    {
        $this->db->where('status', 'new');
        $this->db->where('sender_id<>', $this->session->mem_id);
        $this->db->where('chat_id', $chat_id);

        $query = $this->db->get('chat_msgs');
        /*
        $rows = array();
        foreach ($query->result() as $index => $row) {
            $row->attachments = $this->get_attachments($row->id);
            $rows[$index] = $row;
        }
        return $rows;
        */
        return $query->result();
    }

    function mark_seen_all($chat_id)
    {
        $this->db->set(array('status' => 'seen', 'noti' => 1));
        $this->db->where('sender_id<>', $this->session->mem_id);
        $this->db->where('chat_id', $chat_id);
        $this->db->update('chat_msgs');
    }

    function mark_seen($msg_id)
    {
        $this->db->set(array('status' => 'seen', 'noti' => 1));
        $this->db->where('sender_id<>', $this->session->mem_id);
        $this->db->where('id', $msg_id);
        $this->db->update('chat_msgs');
    }
}
?>

