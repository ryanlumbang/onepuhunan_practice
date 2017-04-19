<?php

/**
 * Created by PhpStorm.
 * User: sapia.cali
 * Date: 4/10/2017
 * Time: 11:16 AM
 */
class HR_model extends CI_Model
{
    public function _construct()
    {
        parent::__construct();
    }

    public function insertCSV($data)
    {
        $hrdb = $this->load->database('hr', true);
        $hrdb->insert('"t_Employee_Dummy"', $data);

        //$query = $hrdb->insert('"t_Employee"', $data);
        //return $query;
        //$query = $this->$hrdb->query('');
        //return TRUE;
    }

    public function view_data()
    {
        $hrdb = $this->load->database('hr', true);
        $query = $hrdb->query('SELECT * FROM "t_Employee_Dummy"');
        return $query->result_array();
    }
}