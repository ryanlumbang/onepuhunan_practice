<?php

/**
 * Created by PhpStorm.
 * User: ryan.lumbang
 * Date: 2/10/2017
 * Time: 4:40 PM
 */


class Audit_model extends CI_Model
{
    public function _construct() {
        parent::__construct();
    }

    public function get_branch_list() {
        $branch = $this->input->post("branch_code");
        $date = $this->input->post("hidden_date");
        $loan = $this->input->post("type_loan");
        //var_dump($branch);
        $input = array(
            "branch" => $branch,
            "date" =>  $date,
            "loan" => $loan
    );

        if( trim($branch) != "") {
            $query = $this->db->query("SELECT * FROM sp_zyz( ?, ?, ?)", $input);
            return $query->result_array();
        }

    }

    public function set_audit_sampling($data)
    {
        $this->db->insert('"t_audit_sampling"', $data);
    }

    public function get_audit_sampling()
    {

        $query = $this->db->query('SELECT * FROM "t_audit_sampling"');
        return $query->result_array();
    }

    public function set_audit_excel() {


    }


}