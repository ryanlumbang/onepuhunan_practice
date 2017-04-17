<?php

/**
 * Created by PhpStorm.
 * User: sapia.cali
 * Date: 4/10/2017
 * Time: 11:16 AM
 */
class HR_model extends CI_Model
{
    public function _construct() {
        parent::__construct();
    }

    public function insertCSV($data)
    {
        $this->db->insert('t_Employee', $data);
        return TRUE;
        $query=$this->db->query('')
    }


    public function view_data(){
        $query=$this->db->query('SELECT * FROM "t_Employee"');
        return $query->result_array();
    }



}