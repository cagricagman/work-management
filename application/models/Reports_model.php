<?php

class Reports_model extends CI_Model
{

    public $tableName = "reports";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array()
     */
    public function getAll($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    /**
     * @return array(where)
     */
    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /**
     * @return true/false
     */
    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    /**
     * @return true/false
     */
    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    /**
     * @return true/false
     */
    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }


}