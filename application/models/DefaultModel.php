<?php

class DefaultModel extends CI_Model
{
    function getQuery($query)
    {
        return $this->db->query();
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

    function update($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
}
