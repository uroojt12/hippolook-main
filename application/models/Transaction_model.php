<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]

class Transaction_model extends CRUD_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'transactions';
        $this->field = "id";
    }

    function get_sitter_transactions($mem_id)
    {
        $this->db->select("trx.*, l.encoded_id, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name");
        $this->db->from($this->table_name.' trx');
        $this->db->join('bookings l', 'l.id = trx.booking_id');
        $this->db->join('members m', 'm.mem_id = l.owner_id');

        $this->db->where("l.sitter_id", $mem_id);
        $this->db->order_by("trx.id", 'desc');
        $query = $this->db->get();
        // print_query();
        return $query->result();
    }

    function get_balance_due($mem_id, $days)
    {
        $date = date('Y-m-d');
        $this->db->select("sum(trx.amount) as total");

        $this->db->from($this->table_name.' trx');
        $this->db->join('bookings b', 'b.id = trx.booking_id');

        $this->db->where("trx.mem_id", $mem_id);
        $this->db->where("trx.status", 0);
        $this->db->where("trx.amount>", 0);
        $this->db->where("b.status", 2);
        $this->db->where("b.completed", 2);
        $this->db->where("DATEDIFF('$date', b.checkout_time)>$days");
        $row = $this->db->get()->row();
        return floatval($row->total);
    }

    function available_balances($mem_id, $days)
    {
        $date = date('Y-m-d');
        $this->db->select("trx.*");
        
        $this->db->from($this->table_name.' trx');
        $this->db->join('bookings b', 'b.id = trx.booking_id');
        $this->db->where("trx.mem_id", $mem_id);
        $this->db->where("trx.status", 0);
        $this->db->where("trx.amount>", 0);
        $this->db->where("b.status", 2);
        $this->db->where("b.completed", 2);
        $this->db->where("DATEDIFF('$date', b.checkout_time)>$days");
        return $this->db->get()->result();
    }

    function get_sitter_transaction($id, $mem_id)
    {
        $this->db->select("l.*, trx.id as trx_id, trx.date as trx_date, trx.amount as trx_amount, s.name as subject, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, m.mem_email");
        $this->db->from($this->table_name.' trx');
        $this->db->join('bookings l', 'l.id = trx.booking_id');
        $this->db->join('members m', 'm.mem_id = l.owner_id');
        $this->db->join('subjects s', 's.id = l.subject_id');

        $this->db->where("l.sitter_id", $mem_id);
        $this->db->where("l.id", $id);
        // $this->db->order_by("trx.date", 'desc');
        $query = $this->db->get();
        // print_query();
        return $query->row();
    }

    function get_transaction($id)
    {
        $this->db->select("l.*, trx.id as trx_id, trx.date as trx_date, trx.amount as trx_amount, s.name as subject, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, m.mem_email");
        $this->db->from($this->table_name.' trx');
        $this->db->join('bookings l', 'l.id = trx.booking_id');
        $this->db->join('members m', 'm.mem_id = l.owner_id');
        $this->db->join('subjects s', 's.id = l.subject_id');

        $this->db->where("trx.id", $id);
        $query = $this->db->get();
        // print_query();
        return $query->row();
    }

    function save_trx($mem_id, $amount, $charge_id, $booking_id = null, $note = '', $status = 0)
    {
        $vals = array('mem_id' => $this->session->mem_id, 'amount' => $amount, 'booking_id' => $booking_id, 'charge_id' => $charge_id, 'note' => $note, 'status' => 1, 'date' => date('Y-m-d H:i:s'));
        $this->db->set($vals);
        if ($value != '') {
            $this->db->where($field, $value);
            $this->db->update($this->table_name);
            return $value;
        } else {
            $this->db->insert($this->table_name);
            return $this->db->insert_id();
        }
    }

    function get_total_earnings($mem_id)
    {
        $this->db->select("sum(amount) as total");
        $this->db->where("mem_id", $mem_id);
        $this->db->where("booking_id<>", NULL);
        // $this->db->where("status", 1);
        $row = $this->db->get('transactions')->row();
        return floatval($row->total);
    }

    function get_total_spending($mem_id)
    {
        $this->db->select("sum(amount) as total");
        $this->db->where("mem_id", $mem_id);
        $this->db->where("status", 1);
        $this->db->where("booking_id<>", NULL);
        $row = $this->db->get('transactions')->row();
        return floatval($row->total);
    }

    function get_pending_blnc($mem_id, $days)
    {
        $date = date('Y-m-d');
        $this->db->select("sum(amount) as total");
        $this->db->where("mem_id", $mem_id);
        $this->db->where("status", 0);
        $this->db->where("DATEDIFF('$date', date)<=$days");
        $row = $this->db->get('transactions')->row();
        return floatval($row->total);
    }

    function pending_balances($mem_id, $days)
    {
        $date = date('Y-m-d');
        $this->db->select("*");
        $this->db->where("mem_id", $mem_id);
        $this->db->where("status", 0);
        $this->db->where("DATEDIFF('$date', date)<=$days");
        return $this->db->get('transactions')->result();
    }

    /*** start withdraws ***/

    function save_withdraw($vals, $value = '', $field = 'id')
    {
        $this->db->set($vals);
        if ($value != '') {
            $this->db->where($field, $value);
            $this->db->update('withdraws');
            return $value;
        } else {
            $this->db->insert('withdraws');
            return $this->db->insert_id();
        }
    }

    function save_withdrawal_detail($vals, $value = '', $field = 'id')
    {
        $this->db->set($vals);
        if ($value != '') {
            $this->db->where($field, $value);
            $this->db->update('withdrawal_detail');
            return $value;
        } else {
            $this->db->insert('withdrawal_detail');
            return $this->db->insert_id();
        }
    }

    function get_withdraw($id, $where = '')
    {
        if(!empty($where))
            $this->db->where($where);
        $this->db->where('id', $id);
        $query = $this->db->get('withdraws');
        return $query->row();

    }

    function get_withdrawal_detail($withdraw_id, $where = '')
    {
        $this->db->select("trx.*");
        $this->db->from("withdrawal_detail wd");
        $this->db->join($this->table_name.' trx', "trx.id = wd.trx_id");
        if(!empty($where))
            $this->db->where($where);
        $this->db->where('withdraw_id', $withdraw_id);
        return  $this->db->get()->result();
    }

    function get_withdraws ($start = '', $offset = '', $order_by = 'desc')
    {
        $this->db->where('status', 1);
        if (!empty($order_by))
            $this->db->order_by("id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        return $this->db->get('withdraws')->result();
    }

    function get_sitter_withdraws ($mem_id, $start = '', $offset = '', $order_by = 'desc')
    {
        // $this->db->where('status', 1);
        $this->db->where('mem_id', $mem_id);
        if (!empty($order_by))
            $this->db->order_by("id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        return $this->db->get('withdraws')->result();
    }

    function get_withdraw_request ($start = '', $offset = '', $order_by = 'desc')
    {
        $this->db->where('status', 0);
        if (!empty($order_by))
            $this->db->order_by("id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        return $this->db->get('withdraws')->result();
    }

    function get_cleared_payouts ($mem_id, $start = '', $offset = '', $order_by = 'desc')
    {
        $this->db->where('mem_id', $mem_id);
        $this->db->where('status', 1);
        
        if (!empty($order_by))
            $this->db->order_by("id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        return $this->db->get('withdraws')->result();
    }

    function get_processing_payouts ($mem_id, $start = '', $offset = '', $order_by = 'desc')
    {
        $this->db->where('mem_id', $mem_id);
        $this->db->where('status', 0);
        
        if (!empty($order_by))
            $this->db->order_by("id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        return $this->db->get('withdraws')->result();
    }

    function get_total_payout($mem_id)
    {
        $this->db->select("sum(amount) as total");
        $this->db->where("mem_id", $mem_id);
        $this->db->where("status", 1);
        $row = $this->db->get('withdraws')->row();
        return floatval($row->total);
    }
}
?>

