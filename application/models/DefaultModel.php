<?php

class DefaultModel extends CI_Model
{
    function getQuery($query)
    {
        return $this->db->query($query);
    }

    function get($table)
    {
        return $this->db->get($table);
    }

    function getWhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function insertReturnId($table, $data)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    function insertBatch($table, $data)
    {
        $this->db->insert_batch($table, $data);
    }

    function update($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    function updateBatch($table, $data, $where)
    {
        $this->db->update_batch($table, $data, $where);
    }

    function delete($table, $where)
    {
        $this->db->delete($table, $where);
    }
}
