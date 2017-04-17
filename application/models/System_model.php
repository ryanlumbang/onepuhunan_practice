<?php

    //@Author: Ronald San Pedro, Jr.
    //Date   : December 7, 2016

    class System_model extends CI_Model {
        
        public function _construct() {
            parent::__construct();
        }
        
        public function registration_request() {
            $input = $this->input->post("reg_name");
            $search_str = !empty($input) ? $input : " ";
            
            $query = $this->db->query("SELECT * FROM sp_uc_acct_approval( ? )", $search_str);
            return $query->result_array();
        }
        
        public function approve_request($input) {
            $query = $this->db->query("SELECT sp_uc_upd_acct_approval( ?, ? )", $input);
            $row = $query->row();
            
            if( isset($row) ) {
                return $row->sp_uc_upd_acct_approval;
            }
        }
        
        public function get_employee_name($input) {
            $qry = $this->db->query("SELECT emp_name, emp_email FROM sp_uc_sel_emp_name( ? ) AS (emp_name text, emp_email text)", $input);
            return $qry->row_array();
        }
    }
