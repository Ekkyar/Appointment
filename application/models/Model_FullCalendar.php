<?php

class Model_FullCalendar extends CI_Model
{
    function fetch_all_event()
    {
        $this->db->order_by('id');
        return $this->db->get('tb_event');
    }

    function insert_event($data)
    {
        $this->db->insert('tb_event', $data);
    }

    function update_event($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_event', $data);
    }

    function delete_event($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_event');
    }
}
