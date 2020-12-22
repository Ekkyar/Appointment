<?php

class Model_FullCalendar extends CI_Model
{
    function fetch_all_event()
    {
        $this->db->order_by('id');
        return $this->db->get('tb_event');
    }
    
    function fetch_all_event_by_dosen($id)
    {
        return $this->db->get_where('tb_event', ['id_dosen' => $id]);
    }

    function fetch_all_event_by_student($id)
    {
        return $this->db->get_where('tb_event', ['id_user' => $id]);
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
